<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\Curl\CurlRequestClass;
use App\Mail\CreditRemainStatusMail;
use App\Mail\CreditRequestEmail;
use App\Models\PublicGallery;
use Illuminate\Support\Facades\Validator;
use Google\Cloud\Storage\StorageClient;
use App\Mail\sendRundpodFailedRequest;
use App\Models\CustomRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\WidgetUserData;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WidgetController extends Controller
{
    public $curlRequest;
    public function __construct()
    {
        $this->curlRequest = new CurlRequestClass();
    }

    public function runpodWidgetBeautifulRedesign(Request $request)
    {
        $payloadData = $request->all();
        // $request->merge(['id' => Auth::id()]);
        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);

        if ($userAccess == true) {
            $uniqueFileName = $this->generateUniqueFileName();
            if (strpos($payloadData['data'], 'http://') === 0 || strpos($payloadData['data'], 'https://') === 0) {
                $b64image = base64_encode(file_get_contents($payloadData['data']));
                $googleStorageFileUrl = $this->storeImageToGoogleBucket($b64image, $uniqueFileName);
            } else {
                $googleStorageFileUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName);
            }

            if ($googleStorageFileUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileUrl['url'],
                    'design_type' => intval($payloadData['designtype']),
                    'room_type' => strtolower($payloadData['roomtype']),
                    'design_style' => strtolower($payloadData['prompt']),
                    'prompt' => !empty($payloadData['custom_instruction']) ? $payloadData['custom_instruction'] : '',
                    'negative_prompt' => !empty($payloadData['is_custom_negative_instruction']) ? $payloadData['is_custom_negative_instruction'] : '',
                    'ai_intervention' => $payloadData['strengthType'],
                    'no_design' => intval($payloadData['no_of_Design']),
                    'unique_id' => $uniqueFileName,
                ],
            ];

            // $url = \Config::get('app.GPU_SERVERLESS_BEAUTIFUL_REDESIGN');
            $url = \Config::get('app.GPU_SERVERLESS_BEAUTIFUL_REDESIGN_API');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {
                if (!isset($response['output']) || isset($response['output']['errors'])) {
                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);
                    // $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function getDataToSaveForRedesign($response, $payloadData)
    {
        $style = '';
        if (isset($payloadData['prompt'])) {
            $style = $payloadData['prompt'];
        } elseif (isset($payloadData['design_style'])) {
            $style = $payloadData['design_style'];
        }
        $storeData = [
            'original_image' => $response['output']['input_image'],
            'generated_image' => $response['output']['output_images'],
            'style' => !empty($style) ? $style : 'N/A',
            'room_type' => !empty($payloadData['roomtype']) ? $payloadData['roomtype'] : 'N/A',
            'mode' => $payloadData['modeType'],
            'user_uid' => Auth::id(),
            'is_public' => 0,
            'designtype' => intval($payloadData['designtype']),
            'prompt' => !empty($payloadData['is_custom_instruction']) ? $payloadData['is_custom_instruction'] : '',
            'hd_image' => 0,
        ];

        return $storeData;
    }

    public function saveData($storeData)
    {
        $data = $storeData;
        $validator = Validator::make($storeData, [
            'original_image' => 'required',
            'generated_image' => 'required',
            'style' => 'required',
            'room_type' => 'required',
            'user_uid' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'success' => false], 403);
        }
        if ($data['mode'] >= 1 && $data['mode'] <= 11) {
            $inpainting = $data['mode'];
        } else {
            $inpainting = 0;
        }
        $generatedImages = $data['generated_image'];
        $storedIds = [];
        foreach ($generatedImages as $generatedImage) {
            $newRecord = PublicGallery::create([
                'original_image' => $data['original_image'],
                'generated_image' => $generatedImage,
                'style' => $data['style'],
                'room_type' => $data['room_type'],
                'mode' => $data['mode'],
                'user_uid' => $data['user_uid'],
                'is_public' => $data['is_public'] ? $data['is_public'] : 0,
                'is_inpainting' => $inpainting,
                'design_type' => $data['designtype'] ? $data['designtype'] : 0,
                'prompt' => $data['prompt'] ? $data['prompt'] : '-',
                'hd_image' => $data['hd_image'],
            ]);
            $storedIds[] = $newRecord->id;
        }

        return ['success' => true, 'message' => 'Image Added', 'storedIds' => $storedIds];
    }

    public function generateUniqueFileName()
    {
        $time = date('Y-m-d-H-i-s', strtotime('now'));
        $uuid = Str::uuid();

        return $uuid . '-' . $time;
    }

    public function storeImageToGoogleBucket($image, $uniqueFileName, $isMask = null, $isTexture = null, $colorTexture = null, $collegeToRender = null)
    {
        $bucketname = \Config::get('app.googleBucketName');
        $file_name = 'UserGenerations/cristian/input-' . $uniqueFileName . '.png';
        if ($isMask) {
            $file_name = 'UserGenerations/cristian/mask/input-' . $uniqueFileName . '.png';
        }
        if ($isTexture) {
            $file_name = 'UserGenerations/cristian/texture/input-' . $uniqueFileName . '.png';
        }
        if ($colorTexture) {
            $file_name = 'UserGenerations/cristian/color/input-' . $uniqueFileName . '.png';
        }
        if ($collegeToRender) {
            $file_name = 'UserGenerations/cristian/roombland/input-' . $uniqueFileName . '.png';
        }
        $base64String = preg_replace('#^data:image/\w+;base64,#i', '', $image);
        $fileContents = base64_decode($base64String);

        try {
            $storage = new StorageClient([
                'keyFile' => json_decode(file_get_contents(storage_path('app/plated-howl-370821-cf0e409bcbaa.json')), true),
            ]);
            $bucket = $storage->bucket('generativeartbucket');
            $bucket->upload($fileContents, ['name' => $file_name]);
            $uploadedFile = $bucket->object($file_name);
            $fileExists = $uploadedFile->exists();
            if ($fileExists) {
                return [
                    'url' => 'https://storage.googleapis.com/' . $bucketname . '/' . $file_name,
                ];
            } else {
                return false;
            }
        } catch (\UnableToWriteFile | UnableToSetVisibility $e) {
            Log::error('Unable to write a file in google bucket' . $e->getMessage());

            return false;
        }
    }

    public function showWidgetData($id,Request $request)
    {
        $widgetData = WidgetUserData::where('user_id', $id)->firstOrFail();
        $userTheme = User::where('id',$id)->select('light_mode')->first();
        $currentDomain = $request->query('currentDomain'); // Get the currentDomain from the query parameters
        
        if (!$widgetData) {
            abort(404, 'Widgetd not found');
        }
        // if($widgetData && $currentDomain != $widgetData->domain_name){
            //     $widgetHtml = 'Please verify your domain';
            //     return response($widgetHtml, 200)->header('Content-Type', 'text/html');
            // }
        $widgetHtml = view('widget.widget-management', ['widgetData' => $widgetData, 'widgetThemeMode' => $userTheme->light_mode, 'primaryColor' => $widgetData->primary_color])->render();
        return response($widgetHtml, 200)->header('Content-Type', 'text/html')
                ->header('X-User-Theme', $userTheme->light_mode);;
        // Render the Blade view to a string
        // $widgetHtml = view('widget.widget-feature-data', ['widgetData' => $widgetData])->render();

        // return response()->json(['html' => $widgetHtml]);
    }

    public function runpodWidgetFillSpace(Request $request){
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);
        if ($userAccess === true) {
        $prompt = $payloadImage['prompt'];
            if ($request->session()->has('inputImageSession')) {
                $googleStorageFileImageUrl['url'] = $request->session()->get('inputImageSession');
                $uniqueFileName = str_replace(
                    ['https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/input-', '.png'],
                    '',
                    $googleStorageFileImageUrl['url']
                );
                $request->session()->forget('inputImageSession');
            } else {
                $uniqueFileName = $this->generateUniqueFileName();
                $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadImage['init_images'], $uniqueFileName);
            }
            $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadImage['mask'], $uniqueFileName, $isMask = true);
            $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

            if ($googleStorageFileImageUrl === false || $googleStorageFileMaskUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'mask_image' => $googleStorageFileMaskUrl['url'],
                    'design_type' => intval($payloadData['designtype']),
                    'room_type' => strtolower($payloadData['roomtype']),
                    'design_style' => strtolower($payloadData['design_style']),
                    'prompt' => !empty($payloadImage['prompt']) ? $payloadImage['prompt'] : '',
                    'no_design' => intval($payloadData['no_of_Design']),
                    'segment_type' => $segmentType,
                    'strength' => (float)$payloadData['ai_strength'],
                    'unique_id' => $uniqueFileName,
                ],
            ];

            // $url = \Config::get('app.GPU_API_SERVERLESS_FILL_SPACE');
            $url = \Config::get('app.GPU_API_SERVERLESS_FILL_SPACE');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {
                if (!isset($response['output']) || isset($response['output']['errors'])) {

                    return json_encode(['error' => 'Something went wrong. Please try again.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);
                    // $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];
                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function runpodWidgetPrecision(Request $request){
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);

        if ($userAccess === true) {
            $prompt = $payloadImage['prompt'];
            if ($request->session()->has('inputImageSession')) {
                $googleStorageFileImageUrl['url'] = $request->session()->get('inputImageSession');
                $uniqueFileName = str_replace(
                    ['https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/input-', '.png'],
                    '',
                    $googleStorageFileImageUrl['url']
                );
                $request->session()->forget('inputImageSession');
            } else {
                $uniqueFileName = $this->generateUniqueFileName();
                $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadImage['init_images'], $uniqueFileName);
            }
            $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadImage['mask'], $uniqueFileName, $isMask = true);
            $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

            if ($googleStorageFileImageUrl === false || $googleStorageFileMaskUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'mask_image' => $googleStorageFileMaskUrl['url'],
                    'design_type' => intval($payloadData['designtype']),
                    'room_type' => strtolower($payloadData['roomtype']),
                    'design_style' => strtolower($payloadData['design_style']),
                    'prompt' => !empty($payloadImage['prompt']) ? $payloadImage['prompt'] : '',
                    'no_design' => intval($payloadData['no_of_Design']),
                    'segment_type' => $segmentType,
                    'strength' => (float)$payloadData['ai_strength'],
                    'unique_id' => $uniqueFileName,
                ],
            ];

            // $url = \Config::get('app.GPU_SERVERLESS_PRECISION');
            $url = \Config::get('app.GPU_API_SERVERLESS_PRECISION');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {

                // return json_encode(['error' => 'Something went wrong. Please try again.']);
                if (!isset($response['output']) || isset($response['output']['errors'])) {

                    return json_encode(['error' => 'Something went wrong. Please try again.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);

                    // $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function runpodWidgetColorAndTexture(Request $request){
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);

        if ($userAccess === true) {
            $prompt = $payloadImage['prompt'];
            if ($request->session()->has('inputImageSession')) {
                $googleStorageFileImageUrl['url'] = $request->session()->get('inputImageSession');
                $uniqueFileName = str_replace(
                    ['https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/input-', '.png'],
                    '',
                    $googleStorageFileImageUrl['url']
                );

                $request->session()->forget('inputImageSession');
            } else {
                $uniqueFileName = $this->generateUniqueFileName();
                $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadImage['init_images'], $uniqueFileName);
            }
            $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadImage['mask'], $uniqueFileName, $isMask = true);
            $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

            if ($googleStorageFileImageUrl === false || $googleStorageFileMaskUrl == false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'mask_image' => $googleStorageFileMaskUrl['url'],
                    'design_type' => intval($payloadData['designtype']),
                    'prompt' => !empty($payloadImage['prompt']) ? $payloadImage['prompt'] : '',
                    'no_design' => intval($payloadData['no_of_Design']),
                    'segment_type' => $segmentType,
                    'object' => $payloadData['objects'] ?? '',
                    'color' => !empty($payloadData['color']) ? strtolower($payloadData['color']) : '',
                    'material' => !empty($payloadData['material']) ? strtolower($payloadData['material']) : '',
                    'material_type' => !empty($payloadData['material_type']) ? strtolower($payloadData['material_type']) : '',
                    'unique_id' => $uniqueFileName,
                ],
            ];

            // $url = 'https://api.runpod.ai/v2/'.\Config::get('app.GPU_SERVERLESS_COLOR_AND_TEXTURE').'/runsync';
            // $url = \Config::get('app.GPU_SERVERLESS_COLOR_AND_TEXTURE');
            $url = \Config::get('app.GPU_API_SERVERLESS_COLOR_AND_TEXTURE');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {

                // return json_encode(['error' => 'Something went wrong. Please try again.']);
                if (!isset($response['output']) || isset($response['output']['errors'])) {

                    return json_encode(['error' => 'Something went wrong. Please try again.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);

                    // $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {
                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function runpodWidgetPaintVisualizer(Request $request){
        $payloadData = $request->all();
        $prompt = '';
        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);
        if ($userAccess === true) {
            if ($request->session()->has('inputImageSession')) {
                $googleStorageFileImageUrl['url'] = $request->session()->get('inputImageSession');
                $uniqueFileName = str_replace(
                    ['https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/input-', '.png'],
                    '',
                    $googleStorageFileImageUrl['url']
                );
                $request->session()->forget('inputImageSession');
            } else {
                $uniqueFileName = $this->generateUniqueFileName();
                $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadData['init_images'], $uniqueFileName);
            }
            $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadData['mask'], $uniqueFileName, $isMask = true);
            if (!empty($payloadData['texture_image']) && $payloadData['texture_image'] !== 'undefined') {
                $googleStorageFileTextureUrl = $this->storeImageToGoogleBucket($payloadData['texture_image'], $uniqueFileName, $isMask = false, $texture = false, $colorTexture = true);
            } else {
                $googleStorageFileTextureUrl['url'] = '';
            }
            $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

            if ($googleStorageFileImageUrl === false || $googleStorageFileMaskUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

            $no_of_design = intval($payloadData['no_of_Design']);

            $payloads = [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'mask_image' => $googleStorageFileMaskUrl['url'],
                    'color_image' => $googleStorageFileTextureUrl['url'],
                    'segment_type' => $segmentType,
                    'no_design' => $no_of_design,
                    'object' => $payloadData['objects'] ?? '',
                    'rgb_color' => $payloadData['rgb_color'],
                    'unique_id' => $uniqueFileName,
                ],
            ];
            $urls = \Config::get('app.GPU_SERVERLESS_COLOR_SWAP_2');

            $response = $this->curlRequest->serverLessCurlRequests($urls, $payloads);
            if ($response && $response['status'] === 'COMPLETED') {

                // return json_encode(['error' => 'Something went wrong. Please try again.']);
                if (!isset($response['output']) || isset($response['output']['errors'])) {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);

                    // $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function runpodWidgetGetMasking(Request $request)
    {
        $queryparams = $request->except(['data']);
        // $queryparams['id'] = Auth::id();
        $payload = $request->only('data');
        if ($request->session()->has('inputImageSession')) {
            $request->session()->forget('inputImageSession');
        }
        $uniqueFileName = $this->generateUniqueFileName();
        $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($request->data, $uniqueFileName);
        $request->session()->put('inputImageSession', $googleStorageFileImageUrl['url']);

        $payload = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
                'width' => intval($request->width),
                'height' => intval($request->height),
            ],
        ];

        // $url = 'https://api.runpod.ai/v2/'.\Config::get('app.GPU_SERVERLESS_SEGMENTATION').'/runsync';
        $url = \Config::get('app.GPU_SERVERLESS_SEGMENTATION');
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if (!$response) {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
        if ($response['status'] === 'IN_PROGRESS' || $response['status'] === 'IN_QUEUE') {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
        if (isset($response['output']['segmentation'])) {
            return json_encode($response['output']);
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
        }

        // $url = \Config::get('app.GPU_SERVER_HOST_SEG').'/get_masking?'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, $payload, 'POST');
    }

    public function checkAccess($payloadData,$Widgetid, $apiName): array|bool
    {
        $WidgetUser = User::find($Widgetid);
        $user = User::where('email', $WidgetUser->email)
                ->select('id')
                ->with([
                    'activeSubscription' => function ($query) {
                        $query->where('is_api_plan', 1)
                            ->select('id', 'user_id', 'plan_name', 'created_at', 'total_plan_credit', 'used_credit', 'extra_apis')
                            ->latest();
                    }
                ])
                ->first();

        if ($user) {
            if (! empty($user->activeSubscription)) {
                $percentageUsed = ($user->activeSubscription->used_credit / $user->activeSubscription->total_plan_credit) * 100;
                $percentageLeft = intval(100 - $percentageUsed);
                $emailData = [];

                // Check conditions for send email for remaining API credits
                if ($percentageLeft >= 49 && $percentageLeft <= 51) {
                    $emailData['percentage'] = 50;
                    $emailData['message'] = 'You have left 50% of your credit quota. Act now to avoid any service interruptions! For questions or assistance, feel free to reach out. Appreciate your choice in our service! ';
                    Mail::to($WidgetUser->email)->send(new CreditRemainStatusMail($emailData));
                }
                if ($percentageUsed >= 89 && $percentageUsed <= 91) {
                    $emailData['percentage'] = 10;
                    $emailData['message'] = 'You have left only 10% of your credit quota. Act now to avoid any service interruptions! For questions or assistance, feel free to reach out. Appreciate your choice in our service!';
                    Mail::to($WidgetUser->email)->send(new CreditRemainStatusMail($emailData));
                }
                if ($user->activeSubscription->total_plan_credit < ($user->activeSubscription->used_credit + (int) $payloadData['no_of_Design'])) {
                    $emailData['percentage'] = 0;
                    $emailData['message'] = 'Your credit usage has reached its maximum limit of 100%. For questions or assistance, feel free to reach out. Appreciate your choice in our service!';
                    Mail::to($WidgetUser->email)->send(new CreditRemainStatusMail($emailData));
                    $remainingCredit = $user->activeSubscription->total_plan_credit - $user->activeSubscription->used_credit;

                    return ['success' => false, 'error' => 'Credit not found: You currently have only '.$remainingCredit.' credits remaining.'];
                } elseif (! empty($user->activeSubscription->extra_apis) && json_decode($user->activeSubscription->extra_apis) != null && in_array($apiName, json_decode($user->activeSubscription->extra_apis))) {
                    $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + (int) $payloadData['no_of_Design'];
                    $user->activeSubscription->save();

                    return true;
                } elseif (($user->activeSubscription->plan_name == 'api-silver' || $user->activeSubscription->plan_name == 'standard-sme-500-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-1000-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-3000-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-10000-api-calls-mo')) {
                    if ($apiName == 'furniture_finder') {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 5;
                    } else if($apiName=='segmentation'){
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 1;
                    } else {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + (int) $payloadData['no_of_Design'];
                    }
                    $user->activeSubscription->save();

                    return true;
                } elseif (($user->activeSubscription->plan_name == 'standard-sme' || $user->activeSubscription->plan_name == 'standard-sme-new' || $user->activeSubscription->plan_name == 'standard-sme-500-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-1000-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-3000-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-10000-api-calls-mo')) {
                    if ($apiName == 'furniture_finder') {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 2;
                    } else if($apiName=='segmentation'){
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 1;
                    } else {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + $payloadData['no_of_Design'];
                    }
                    $user->activeSubscription->save();

                    return true;
                } elseif ($user->activeSubscription->plan_name == 'api-gold' || $user->activeSubscription->plan_name == 'standard-sme-500-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-1000-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-3000-api-calls-mo' || $user->activeSubscription->plan_name == 'standard-sme-10000-api-calls-mo') {
                    if ($apiName == 'furniture_finder') {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 2;
                    } else if($apiName=='segmentation'){
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 1;
                    } else {
                        // dd("ofc",$user->activeSubscription->used_credit, $user->activeSubscription->used_credit,$payloadData['no_of_Design']);
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + $payloadData['no_of_Design'];
                    }
                    $user->activeSubscription->save();

                    return true;
                } elseif ($user->activeSubscription->plan_name == 'api-bronze') {
                    if ($apiName == 'furniture_finder') {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 1;
                    } else if($apiName=='segmentation'){
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + 1;
                    } else {
                        $user->activeSubscription->used_credit = $user->activeSubscription->used_credit + $payloadData['no_of_Design'];
                    }
                    $user->activeSubscription->save();                    
                    return true;
                }else {
                    return ['success' => false, 'error' => 'Please Upgrade Your Current Plan'];
                }
            } else {
                return ['success' => false, 'error' => 'Subscription Detail not found.'];

            }
        }
        return ['success' => false, 'error' => 'User not found.'];
    }

    public function runpodWidgetFullHD(Request $request){
        $payloadData = $request->all();
        // $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
        // $path = $staticPath . $payloadData['data'];

        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        // $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);
        // if ($userAccess === true) {
            $type = pathinfo($payloadData['data'], PATHINFO_EXTENSION);
            $fileName = pathinfo($payloadData['data'], PATHINFO_BASENAME);
            $data = file_get_contents($payloadData['data']);
            // $base64 = base64_encode($data);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $uniqueFileName = $this->generateUniqueFileName();
            $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($base64, $uniqueFileName);

            if ($googleStorageFileImageUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'unique_id' => $uniqueFileName,
                ],
            ];

            $url = \Config::get('app.GPU_SERVERLESS_HD_GENERATE');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            //$this->($response, $url, $payload, 'bm4');
            if ($response && $response['status'] === 'COMPLETED') {
                if (!isset($response['output']) || isset($response['output']['errors'])) {
                    return json_encode(['error' => 'Something went wrong. Please try again.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);

                    // $storeData = $this->getDataToSaveForFullHDImage($response, $payloadData);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        // }else{
        //     return response()->json($userAccess, 401);
        // }
    }

    public function runpodWidgetCreativeRedesign(Request $request)
    {
        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicServerRunPod($runpodName);
        // $payload = $request->all();
        // $request->merge(['id' => Auth::id()]);
        // $queryparams = $request->except(['data']);
        // $url = $dynamicServerPod.'/creative_redesign?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');

        $payloadData = $request->all();
        $request->merge(['id' => Auth::id()]);

        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);
        if ($userAccess === true) {
            $uniqueFileName = $this->generateUniqueFileName();
            if (strpos($payloadData['data'], 'http://') === 0 || strpos($payloadData['data'], 'https://') === 0) {
                $b64image = base64_encode(file_get_contents($payloadData['data']));
                $googleStorageFileUrl = $this->storeImageToGoogleBucket($b64image, $uniqueFileName);
            } else {
                $googleStorageFileUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName);
            }

            if ($googleStorageFileUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            if ($request->modeType == 'Creative Redesign') {
                $fill_room = false;
            } else {
                $fill_room = true;
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileUrl['url'],
                    'design_type' => intval($payloadData['designtype']),
                    'room_type' => strtolower($payloadData['roomtype']),
                    'design_style' => strtolower($payloadData['prompt']),
                    'prompt' => !empty($payloadData['custom_instruction']) ? $payloadData['custom_instruction'] : '',
                    'negative_prompt' => !empty($payloadData['is_custom_negative_instruction']) ? $payloadData['is_custom_negative_instruction'] : '',
                    'ai_intervention' => $payloadData['strengthType'],
                    'no_design' => intval($payloadData['no_of_Design']),
                    'unique_id' => $uniqueFileName,
                ],
            ];

            $url = \Config::get('app.GPU_API_SERVERLESS_CREATIVE_REDESIGN');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {
                if (!isset($response['output']) || isset($response['output']['errors'])) {
                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];

                    return json_encode($result);


                    // $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function runpodWidgetRenderRealistic(Request $request)
    {
        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicServerRunPod($runpodName);
        // $payload = $request->all();
        // $request->merge(['id' => Auth::id()]);
        // $queryparams = $request->except(['data']);
        // $url = $dynamicServerPod.'/render_realistic?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');

        $payloadData = $request->all();
        $request->merge(['id' => Auth::id()]);

        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);
        if ($userAccess === true) {
            $uniqueFileName = $this->generateUniqueFileName();
            if (strpos($payloadData['data'], 'http://') === 0 || strpos($payloadData['data'], 'https://') === 0) {
                $b64image = base64_encode(file_get_contents($payloadData['data']));
                $googleStorageFileUrl = $this->storeImageToGoogleBucket($b64image, $uniqueFileName);
            } else {
                $googleStorageFileUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName);
            }

            if ($googleStorageFileUrl === false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileUrl['url'],
                    'design_type' => intval($payloadData['designtype']),
                    'room_type' => strtolower($payloadData['roomtype']),
                    'design_style' => strtolower($payloadData['prompt']),
                    'prompt' => !empty($payloadData['custom_instruction']) ? $payloadData['custom_instruction'] : '',
                    'negative_prompt' => !empty($payloadData['is_custom_negative_instruction']) ? $payloadData['is_custom_negative_instruction'] : '',
                    'ai_intervention' => $payloadData['strengthType'],
                    'no_design' => intval($payloadData['no_of_Design']),
                    'unique_id' => $uniqueFileName,
                ],
            ];

            $url = \Config::get('app.GPU_API_SERVERLESS_SKETCH_TO_RENDER');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {

                // return json_encode(['error' => 'Something went wrong. Please try again.']);
                if (!isset($response['output']) || isset($response['output']['errors'])) {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);


                    // $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function runpodWidgetFurnitureRemoval(Request $request)
    {
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);

        $mode = $request->modeType;
        $Widgetid = $request->widgetuserid;
        $userAccess = $this->checkAccess($payloadData,$Widgetid, $mode);
        if ($userAccess === true) {
            $prompt = $payloadImage['prompt'];
            if ($request->session()->has('inputImageSession')) {
                $googleStorageFileImageUrl['url'] = $request->session()->get('inputImageSession');
                $uniqueFileName = str_replace(
                    ['https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/input-', '.png'],
                    '',
                    $googleStorageFileImageUrl['url']
                );

                $request->session()->forget('inputImageSession');
            } else {
                $uniqueFileName = $this->generateUniqueFileName();
                $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadImage['init_images'], $uniqueFileName);
            }
            $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadImage['mask'], $uniqueFileName, $isMask = true);

            if ($googleStorageFileMaskUrl == false) {
                return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
            }

            $payload = [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'mask_image' => $googleStorageFileMaskUrl['url'],
                    'no_design' => intval($payloadData['no_of_Design']),
                    'unique_id' => $uniqueFileName,
                ],
            ];

            $url = \Config::get('app.GPU_API_SERVERLESS_FURNITURE_REMOVAL');
            $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
            if ($response && $response['status'] === 'COMPLETED') {

                // return json_encode(['error' => 'Something went wrong. Please try again.']);
                if (!isset($response['output']) || isset($response['output']['errors'])) {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                } else {
                    $result = [
                        'Sucess' => [
                            'original_image' => $response['output']['input_image'],
                            'generated_image' => $response['output']['output_images'],
                        ],
                    ];
                    return json_encode($result);
                    // $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                    // $dataSaved = $this->saveData($storeData);
                    // if ($dataSaved) {
                    //     $result['storedIds'] = $dataSaved['storedIds'];

                    //     return json_encode($result);
                    // } else {

                    //     return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                    // }
                }
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again.']);
            }
        }else{
            return response()->json($userAccess, 401);
        }
    }

    public function customCredit()
    {
        return view('web.custom-credit-request');
    }
    public function customCreditEmail(Request $request)
    {
        try {
            $emailData['fullname'] = $request->fullName;
            $emailData['email'] = $request->email;
            $emailData['custom_credit'] = $request->customCredit;
            $emailData['description'] = $request->description;

            $result = Mail::to('vlad@homedesigns.ai')->send(new CreditRequestEmail($emailData)); 
            if ($result) {
                CustomRequest::create([
                    'fullname' => $emailData['fullname'],
                    'email' => $emailData['email'],
                    'custom_credit' => $emailData['custom_credit'],
                    'description' => $emailData['description'],
                ]);

                return response()->json(['message' => 'We received your request successfully. our team will be in contact shortly!']);
            } else {
                return response()->json(['message' => 'Email not sent.']);
            }
        } catch (ModelNotFoundException $e) {
            abort(403);
        } catch (DecryptException $e) {
            abort(403);
        } catch (\Throwable $th) {
            Log::error($th);

            return back()->with('status', 'Server Error.');
        }
    }

    public function translateText(Request $request){
        $googleKey = env('GOOGLE_API_KEY');
        
        $initialText = $request->input('text');
        $gUrl = 'https://translation.googleapis.com/language/translate/v2/detect';
        $data = array(
            'q' => $initialText,
            'key' => $googleKey,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $gUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $responseArray = json_decode($server_output, true);
        if (isset($responseArray['data'])) {
            $languageDetect =  $responseArray['data']['detections'][0][0]['language'];
            $targetLanguage = 'en';
            if ($languageDetect === $targetLanguage) {
                return $initialText; // No translation needed
            } else {
                return $this->translate($initialText,$languageDetect);
            }
        } else {
            return false;
        }
    }
    public function translate($text, $from, $to = 'en')
    {
        $googleKey = env('GOOGLE_API_KEY');

        $gUrl = "https://translation.googleapis.com/language/translate/v2";
        $data = array(
            'q' => $text,
            'target' => $to,
            'key' => $googleKey,
            'format' => 'html',
            'source' => $from
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $gUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $responseArray = json_decode($server_output, true);
        if (isset($responseArray['data'])) {
            return $responseArray['data']['translations'][0]['translatedText'];
        } else {
            return false;
        }
    }
}
