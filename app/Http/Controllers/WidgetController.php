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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showWidget(Request $request) {

        $userId = $request->query('id');

        if ($userId) {
            // Find the widget data using the 'user_id'
            $widgetData = WidgetUserData::where('user_id', $userId)->firstOrFail();
            // Return the view with the widget data
            return view('widget.widget-management', ['widgetData' => $widgetData]);
        } else {
            // Id not provided
            return abort(400, 'Bad Request: id parameter is required');
        }
    }

    public function showWidgetData($id,Request $request)
    {
        $widgetData = WidgetUserData::where('user_id', $id)->firstOrFail();
        
        if (!$widgetData) {
            abort(404, 'Widgetddd not found');
        }
        $widgetHtml = view('widget.widget-management', ['widgetData' => $widgetData])->render();
        return response($widgetHtml, 200)->header('Content-Type', 'text/html');
        // Render the Blade view to a string
        // $widgetHtml = view('widget.widget-feature-data', ['widgetData' => $widgetData])->render();

        // return response()->json(['html' => $widgetHtml]);
    }

    public function showFeature($feature)
    {
        // Validate that the feature exists
        $validFeatures = ['redesign', 'fill_spaces']; // List all valid features

        if (!in_array($feature, $validFeatures)) {
            abort(404); // Feature not found
        }

        // Pass the feature to the view
        return view('widget.widget-' . $feature, ['feature' => $feature]);
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
        $url = \Config::get('app.GPU_SERVERLESS_BEAUTIFUL_REDESIGN_API');

        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        $failedResponseCount = 0 ;
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
}
