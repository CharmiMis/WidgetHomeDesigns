<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\Curl\CurlRequestClass;
use App\Models\PublicGallery;
use Illuminate\Support\Facades\Validator;
use Google\Cloud\Storage\StorageClient;
use App\Mail\sendRundpodFailedRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\WidgetUserData;

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
        $request->merge(['id' => Auth::id()]);

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
        $url = \Config::get('app.GPU_API_SERVERLESS_BEAUTIFUL_REDESIGN');

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
        $currentDomain = $request->query('currentDomain'); // Get the currentDomain from the query parameters

        if (!$widgetData) {
            abort(404, 'Widgetd not found');
        }
        // if($widgetData && $currentDomain != $widgetData->domain_name){
        //     $widgetHtml = 'Please verify your domain';
        //     return response($widgetHtml, 200)->header('Content-Type', 'text/html');
        // }
        $widgetHtml = view('widget.widget-management', ['widgetData' => $widgetData])->render();

        return response($widgetHtml, 200)->header('Content-Type', 'text/html');
        // Render the Blade view to a string
        // $widgetHtml = view('widget.widget-feature-data', ['widgetData' => $widgetData])->render();

        // return response()->json(['html' => $widgetHtml]);
    }

    public function runpodWidgetFillSpace(Request $request){
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
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
                'unique_id' => $uniqueFileName,
            ],
        ];

        // $url = \Config::get('app.GPU_API_SERVERLESS_FILL_SPACE');
        $url = \Config::get('app.GPU_SERVERLESS_FILL_SPACE');
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
    }

    public function runpodWidgetPrecision(Request $request){
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
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
    }

    public function runpodWidgetColorAndTexture(Request $request){
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
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
    }

    public function runpodWidgetPaintVisualizer(Request $request){
        $payloadData = $request->all();
        $prompt = '';
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
    }
}
