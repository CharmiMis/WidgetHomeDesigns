<?php

namespace App\Http\Controllers;

use App\Class\UserClass;
use App\Http\Requests\RunpodCollegeToRenderRequest;
use App\Lib\ConvertKit\ConvertKit;
use App\Lib\Curl\CurlRequestClass;
use App\Lib\FastSpring\APIClass;
use App\Lib\FastSpring\OrderClass;
use App\Lib\FastSpring\SubscriptionClass;
use App\Mail\CreditRemainStatusMail;
use App\Mail\CreditRequestEmail;
use App\Mail\CustomEnterprisePlanConfirmationRequest;
use App\Mail\CustomEnterprisePlanRequest;
use App\Mail\reminderMail;
use App\Mail\sendRundpodFailedRequest;
use App\Mail\sendWeeklyReportToSalesTeam;
use App\Mail\thankYouForPurchaseAPIPlan;
use App\Models\EditHeading;
use App\Models\PublicGallery;
use App\Models\RoomBlendSavedCustomElements;
use App\Models\User;
use App\Models\UserFeedback;
use App\Models\UserProjectImages;
use App\Models\UserServey;
use App\Models\UsersFlag;
use App\Models\WidgetUserData;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public $userClass;

    public $convertKit;

    public $curlRequest;

    protected $fastspringapi;

    public $orderClass;

    public $subscriptionclass;

    public function __construct()
    {
        $this->userClass = new UserClass();
        $this->orderClass = new OrderClass();
        $this->convertKit = new ConvertKit();
        $this->curlRequest = new CurlRequestClass();
        $this->fastspringapi = new APIClass();
        $this->subscriptionclass = new SubscriptionClass();
    }

    public function home()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.home', $details);
    }

    // TODO: fix method name casing issue: storeFileInCache
    public function storeFileInCache(Request $request)
    {
        $imageData = $request->file('file')->get();
        $imageMimeType = $request->file('file')->getMimeType();
        $base64FileContent = base64_encode($imageData);
        $contentarray = [
            'cachedstoredimageType' => $imageMimeType,
            'cachedstoredimage' => $base64FileContent,
        ];

        // Cache::put($request->filekey, $contentarray , now()->addMinutes(5));
        return response()->json([
            'success' => true,
            'message' => 'Received image data',
            'data' => $contentarray,
        ]);
    }

    // TODO: fix method name: getfilefromcache
    // TODO: fix method name casing issue: getFileFromCache
    public function getFileFromCache(Request $request)
    {
        if (Cache::has($request->filekey)) {
            return response()->json([
                'success' => true,
                'message' => 'Image Data found',
                'data' => Cache::get($request->filekey),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No image found for this cache',
        ]);
    }

    // TODO: Declare the usage of this method
    public function testRoot()
    {
        $expire = Carbon::now()->addDay();
        $activeSubcription = Cache::remember('activeSubcription', $expire, function () {
            return $this->userClass->activeSubscriber();
        });
        $totalDesign = Cache::remember('totalDesign', $expire, function () {
            return $this->userClass->activeDesign();
        });

        return view('web.test-root', [
            'activeSubcription' => $activeSubcription,
            'totalDesign' => $totalDesign,
        ]);
    }

    public function getPublicDesigns()
    {
        try {

            $designs = PublicGallery::public()->select('original_image', 'generated_image', 'style')
                ->where('is_active', 1)
                ->orderBy('id', 'desc')
                ->paginate(config('app.PUBLIC_DESIGNS_COUNT'));

            $next_url = $designs->nextPageUrl();

            $designs_json = [];

            foreach ($designs as $design) {
                $designs_json[] = [
                    'original_image' => $design->original_image,
                    'generated_image' => $design->generated_image,
                ];
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'designs' => $designs_json,
                    'next_url' => $next_url,
                ],
            ]);
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    // TODO: Break down the method
    public function getDesigns(Request $request)
    {
        try {
            if ($request->type == 'private' && !auth()->check()) {
                return response()->json([
                    'success' => false,
                ], 500);
            }

            // $designs_query = PublicGallery::select('id','original_image', 'generated_image', 'style', 'mode', 'room_type', 'is_public', 'is_favorite','hd_image','is_inpainting','design_type');

            $designs_query = PublicGallery::select('id', 'original_image', 'generated_image', 'style', 'mode', 'room_type', 'is_public', 'is_favorite', 'hd_image', 'is_inpainting', 'design_type', 'is_active');
            if ($request->type == 'public') {
                $designs_query->public()->where('is_active', 1)->where('is_inpainting', 0);
            } else {
                $user = auth()->user();
                $designs_query->private()->where('user_uid', $user->id)->where('is_inpainting', 0);
            }
            $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
            if ($request->pageType == 'root-redesign') {
                $designs = $designs_query
                    ->where('design_type', $request->designType)
                    ->orderBy('id', 'desc')
                    ->paginate(config('app.PUBLIC_DESIGNS_COUNT'));

                $next_page = $designs->hasMorePages() ? $designs->currentPage() + 1 : null;

                $designs_json = [];

                foreach ($designs as $design) {
                    $designs_json[] = [
                        'id' => $design->id,
                        'original_image' => $staticPath . $design->original_image,
                        'generated_image' => $staticPath . $design->generated_image,
                        'style' => $design->style,
                        'room_type' => $design->room_type,
                        'mode' => $design->mode,
                        'private' => $design->is_public,
                        'favorite' => $design->is_favorite,
                        'hd_image' => $design->hd_image,
                    ];
                }

                return response()->json([
                    'success' => true,
                    'data' => [
                        'designs' => $designs_json,
                        'next_page' => $next_page,
                    ],
                    'pageType' => $request->pageType,
                ]);
            } else {
                if ($request->modeType == 'convenient_redesign') {
                    $designs = $designs_query
                        ->where('design_type', $request->designType)
                        ->where('mode', 'Convenient Redesign')
                        ->orderBy('id', 'desc')
                        ->paginate(config('app.PUBLIC_DESIGNS_COUNT'));
                } else {
                    $designs = $designs_query
                        ->where('design_type', $request->designType)
                        ->where('mode', '!=', 'Convenient Redesign')
                        ->orderBy('id', 'desc')
                        ->paginate(config('app.PUBLIC_DESIGNS_COUNT'));
                }

                foreach ($designs as $design) {
                    $design->original_image = $staticPath . $design->original_image;
                    $design->generated_image = $staticPath . $design->generated_image;
                }

                $data = ['designs' => $designs];
                $imageHtml = view('web2.user.show-redesign-data', $data)->render();

                return response()->json([
                    'success' => true,
                    'data' => $imageHtml,
                    'pageType' => $request->pageType,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function freeTrial()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.free-trial', $details);
    }

    public function exclusiveLifetimeDeal()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.exclusive-lifetime-deal', $details);
    }

    public function foundersOffer()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.founders-offer', $details);
    }

    public function getBase64(Request $request)
    {
        try {

            $path = $request->image_url;

            if ($path == '') {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid parameter.',
                ], 403);
            }

            $type = pathinfo($path, PATHINFO_EXTENSION);
            $fileName = pathinfo($path, PATHINFO_BASENAME);
            $data = file_get_contents($path);
            // $base64 = base64_encode($data);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return response()->json([
                'success' => true,
                'base64' => $base64,
                'fileName' => $fileName,
                'type' => $type,
            ]);
        } catch (\Throwable $th) {
            report($th);

            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    // TODO: Add file validation
    public function downloadFile(Request $request)
    {

        try {

            $path = $request->source;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return response()->json([
                'status' => true,
                'data' => [
                    'base64' => $base64,
                ],
            ]);
        } catch (\Throwable $th) {
            report($th);

            return response()->json([
                'status' => false,
                'data' => [],
            ], 500);
        }
    }
    // public function imageDelete(Request $request)
    // {
    //     $images = $request->input('images');
    //     // Perform validation on $imageIds if needed
    //     // Delete the images from the database
    //     if (is_array($images)) {
    //         // Delete the images from the database
    //         foreach ($images as $image) {
    //             PublicGallery::where('generated_image', $image)->delete();
    //         }
    //         // Return a response indicating success
    //         return response()->json(['message' => 'Images deleted successfully']);
    //     } else {
    //         // Handle the case when $images is not an array
    //         return response()->json(['message' => 'Invalid request'], 400);
    //     }
    // }

    public function imageDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        // Perform validation on $ids if needed
        if (!is_array($ids) || empty($ids)) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        try {
            // Use a single database query to delete multiple ids
            PublicGallery::whereIn('id', $ids)->delete();

            return response()->json(['message' => 'Images deleted successfully']);
        } catch (\Exception $e) {
            // Handle database error
            return response()->json(['message' => 'Error deleting images'], 500);
        }
    }

    // TODO: Fix method name
    public function storeServery(Request $request)
    {
        $user = auth()->user();
        $ckTags = [];
        foreach ($request->question as $id => $value) {
            $otherValue = $value;
            if ($otherValue == null) {
                continue;
            }
            if ($otherValue == 'other') {
                $otherValue = $request->input('other_text.' . $id);
            }
            $serveyDetails = UserServey::create([
                'user_id' => $user->id,
                'question_id' => $id,
                'value' => $otherValue,
            ]);
            $ckTags[] = $this->convertKit->getTagIdByOptionsValue($serveyDetails->value);
        }
        $user->servery_confirmation = 1;
        $user->save();

        foreach ($ckTags as $id => $tagValue) {
            if ($tagValue == '') {
                continue;
            } else {
                $intTagValue = intval($tagValue);
                $ck = new ConvertKit();
                $ck->assignTag($intTagValue, $user->email);
            }
        }

        return response()->json(['status' => true]);
    }

    // TODO: Each method must have try-catch
    public function closeUserServey()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $user->servery_confirmation = 1;
        $user->save();

        return response()->json(['status' => true]);
    }

    public function realStateIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.real-state', $details);
    }

    public function affiliateProgram()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.affiliate-program', $details);
    }

    public function premeiumUpgrade()
    {
        $flagExit = UsersFlag::where('user_id', Auth::id())->first();
        $details = $this->getSubscriptionDetails(['flagExit' => $flagExit]);

        return view('web.premium-precision-upgrade', $details);
    }

    public function specialOfferIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.special-offer', $details);
    }

    public function thankYouCbIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.thank-you-cb', $details);
    }

    public function thankYouPremiumCbIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.thank-you-premium-cb', $details);
    }

    public function premiumPrecisionCbIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.premium-precision-cb', $details);
    }

    // TODO: Move all database queries in Model.
    // TODO: No method should have more than 80 characters in single line.
    public function getInPaintingDesigns(Request $request)
    {
        try {
            $user = auth()->user();
            $designs_query = PublicGallery::where('user_uid', $user->id)
                ->where('design_type', $request->designType)
                ->where('is_inpainting', $request->inpainting)
                ->select('id', 'original_image', 'generated_image', 'style', 'mode', 'room_type', 'is_favorite', 'is_inpainting', 'hd_image', 'design_type');
            $designs = $designs_query->orderBy('id', 'desc')->paginate(config('app.PUBLIC_DESIGNS_COUNT'));

            // if ($designs->isEmpty()) {
            //     $demoImages = $this->getStaticImages($request->inpainting);
            //     $demoDesigns = collect($demoImages); // Convert array to collection to match pagination
            //     $data = ['demoDesigns' => $demoDesigns];
            //     $imageHtml = view('web2.user.show-demo-inpainting-data', $data)->render();
            // }else{
            //     $data = ['designs' => $designs];
            //     $imageHtml = view('web2.user.show-inpainting-data', $data)->render();
            // }

            $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
            foreach ($designs as $design) {
                $design->original_image = $staticPath . $design->original_image;
                $design->generated_image = $staticPath . $design->generated_image;
            }

            $data = ['designs' => $designs];
            $imageHtml = view('web2.user.show-inpainting-data', $data)->render();

            return response()->json([
                'success' => true,
                'data' => $imageHtml,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function landscapersAIIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.landscapers-ai', $details);
    }

    public function interiordesignersAIIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.interior-designers-ai', $details);
    }

    public function decorStaging()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.decor-staging', $details);
    }

    public function architectsAIIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.architects-ai', $details);
    }

    // TODO: Fix method name: getFullHDDate
    public function getFullHDData(Request $request)
    {
        $imageUrl = $request->input('image');
        $imageData = PublicGallery::where('generated_image', $imageUrl)->first();
        if (!$imageData) {
            return response()->json(['status' => false, 'data' => $imageUrl, 'message' => 'Image Not Found:Please Check once', 200]);
        }
        $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
        $path = $staticPath . $imageUrl;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $fileName = pathinfo($path, PATHINFO_BASENAME);
        $data = file_get_contents($path);
        // $base64 = base64_encode($data);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $arrayData = [];
        $arrayData = [
            'privateId' => $imageData->is_public,
            'user_uid' => $imageData->user_uid,
            'image' => $base64,
            'fileName' => $fileName,
            'room_type' => $imageData->room_type,
            'style' => $imageData->style,
            'mode' => $imageData->mode,
            'sec' => $imageData->design_type,
        ];
        return response()->json(['status' => true, 'data' => $arrayData, 200]);
    }

    public function getImageData(Request $request)
    {
        $imageUrl = $request->input('image');
        $imageData = PublicGallery::where('generated_image', $imageUrl)->first();
        $path = $imageUrl;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $fileName = pathinfo($path, PATHINFO_BASENAME);
        $data = file_get_contents($path);
        // $base64 = base64_encode($data);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $arrayData = [];
        $arrayData = [
            'privateId' => $imageData->is_public,
            'isStaging' => 'false', //beacuse we are using live run pod
            'user_uid' => $imageData->user_uid,
            'image' => $base64,
            'fileName' => $fileName,
            'room_type' => $imageData->room_type,
            'style' => $imageData->style,
            'mode' => $imageData->mode,
        ];

        return response()->json(['data' => $arrayData, 200]);
    }

    public function premeiumUpgradeCB()
    {
        $flagExit = UsersFlag::where('user_id', Auth::id())->first();
        $details = $this->getSubscriptionDetails(['flagExit' => $flagExit]);

        return view('web.premium-upgrade-cb', $details);
    }

    public function tikTokSpecial()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.tiktokSpecial', $details);
    }

    public function getuserDetails(Request $request)
    {
        $flagExit = UsersFlag::where('user_id', $request->user_id)->first();
        if ($flagExit) {
            return response()->json(['message' => '0', 'flagExit' => $flagExit->is_precision_ds_modal]);
        } else {
            UsersFlag::create([
                'user_id' => $request->user_id,
                'is_precision_ds_modal' => 1, // Set other_field to 1 (adjust as per your field name)
            ]);

            return response()->json(['message' => '0']);
        }
    }

    public function foundersSpecial()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.founders-special', $details);
    }

    public function decorCount()
    {
        $decorFlagExit = UsersFlag::where('user_id', Auth::id())
            ->where('is_decor_count', 1)
            ->first();
        if ($decorFlagExit) {
            return response()->json(['success' => false, 'message' => 'Decor count already exists.']);
        } else {
            UsersFlag::create([
                'user_id' => Auth::id(),
                'is_decor_count' => 1,
            ]);

            return response()->json(['success' => true, 'message' => 'Decor count created successfully.']);
        }
    }

    public function editAsPrecision(Request $request)
    {
        // $b64image = base64_encode(file_get_contents($request->img));
        // session(['b64image' => $b64image]);
        $image_cache_id = bin2hex($request->img);
        if (!Cache::has($image_cache_id)) {
            Cache::put($image_cache_id, $request->img);
        }

        return response()->json(['success' => true, 'image_cache_id' => $image_cache_id]);
    }

    public function getBase64ImageUrl(Request $request)
    {
        $b64image = base64_encode(file_get_contents($request->imageURL));

        return response()->json(['b64image' => $b64image]);
    }

    public function updateFavorite(Request $request)
    {
        try {
            $image_id = $request->image_id;
            if ($image_id) {
                $gallery = PublicGallery::where('id', $image_id)->first();
                if (!$gallery) {
                    return response()->json(['message' => 'Image not found in gallery'], 404);
                }
                $newIsFavoriteValue = $gallery->is_favorite == 0 ? 1 : 0;
                $gallery->update(['is_favorite' => $newIsFavoriteValue]);

                return response()->json([
                    'message' => 'Favorite updated successfully',
                    'is_favorite' => $newIsFavoriteValue,
                ]);
            } else {
                return response()->json(['message' => 'Invalid request'], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function apiDocumentation()
    {
        // $user = auth()->user();
        $token = '';

        // if ($user) {
        //     $token = ApiAccessToken::where('user_id', $user->id)->first();
        //     if ($token) {
        //         $token = $token->api_access_token;
        //     }
        // }
        return view('web.api-documentation', ['token' => $token]);
    }

    public function aiObjectIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.ai-object-removal', $details);
    }

    public function activeSubcriberDesignDetails()
    {
        $expire = Carbon::now()->addDay();
        try {

            // TODO: Check if we are fetching it from Cache next time
            $activeSubscription = Cache::remember('activeSubscription', $expire, function () {
                return $this->userClass->activeSubscriber();
            });

            // TODO: Check if we are fetching it from Cache next time
            $totalDesign = Cache::remember('totalDesign', $expire, function () {
                return $this->userClass->activeDesign();
            });

            return [
                'activeSubscription' => $activeSubscription,
                'totalDesign' => $totalDesign,
            ];
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, return a default value, etc.)
            return [
                'activeSubscription' => null,
                'totalDesign' => null,
            ];
        }
    }

    public function careersIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.carrier', $details);
    }

    public function aboutUs()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.about-us', $details);
    }

    public function userFeedback(Request $request)
    {
        $userId = auth()->user()->id;
        UserFeedback::create([
            'user_id' => $userId,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);
        $user = User::find($userId);
        $user->feedback_confirmation = 1;
        $user->save();

        return response()->json(['status' => true]);
    }

    public function premeiumUpgradeSoftware()
    {
        $flagExit = UsersFlag::where('user_id', Auth::id())->first();
        $details = $this->getSubscriptionDetails(['flagExit' => $flagExit]);

        return view('web.premium-upgrade-software', $details);
    }

    public function segmentIndex()
    {
        return view('web.user.segment');
    }

    public function thankYouExtraRooms()
    {
        return view('web.thank-you-extra-rooms');
    }

    public function thankYouExtraStyles()
    {
        return view('web.thank-you-extra-styles');
    }

    public function thankYouMonetizationGuide()
    {
        return view('web.thank-you-monetization-guide');
    }

    public function specialExtraRooms()
    {
        $flagExit = UsersFlag::where('user_id', Auth::id())->first();
        $details = $this->getSubscriptionDetails(['flagExit' => $flagExit]);

        return view('web.special-offer-extra-rooms', $details);
    }

    public function specialExtraStyles()
    {
        $flagExit = UsersFlag::where('user_id', Auth::id())->first();
        $details = $this->getSubscriptionDetails(['flagExit' => $flagExit]);

        return view('web.special-offer-extra-styles', $details);
    }

    public function specialMonetizationGuide()
    {
        $flagExit = UsersFlag::where('user_id', Auth::id())->first();
        $details = $this->getSubscriptionDetails(['flagExit' => $flagExit]);

        return view('web.special-offer-monetization-guide', $details);
    }

    public function closeUserfeedback()
    {
        $user = Auth::user();
        if ($user) {
            $user = User::find($user->id);
            $user->feedback_confirmation = 1;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Close button count increased successfully']);
        } else {
            // Return an error response if the user is not authenticated
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }

    public function unbuyedUsers(Request $request)
    {
        $homeplans = [
            'homedesignsai-pro',
            'homedesignsai-individual',
            'homedesignsai-individual-2',
            'pro-yearly',
            'homedesignsai-pro-2',
        ];

        if ($request->has('userpuchasingplan')) {
            $user = Auth::user();
            $emailToCheck = $user->email;

            if (in_array($request->userpuchasingplan, $homeplans) && (!in_array($user->activePlan(), $homeplans))) {

                $unbuyedUserTag = config('app.TAG_UN_BUYED_USER');
                $listSubscribers = $this->convertKit->listSubscribers($unbuyedUserTag);
                $data = json_decode($listSubscribers, true);

                if ($data && isset($data['subscriptions'])) {
                    $subscribers = $data['subscriptions'];
                    $emailAddresses = array_column(array_column($subscribers, 'subscriber'), 'email_address');

                    // Check if the emailToCheck is found in the $emailAddresses array
                    if (in_array($emailToCheck, $emailAddresses)) {
                        return response()->json(['success' => true, 'message' => 'CK tag already assigned for unbuyedUser']);
                    } else {
                        $ck = new ConvertKit();
                        $ck->assignTag($unbuyedUserTag, $user->email);

                        return response()->json(['success' => true, 'message' => 'Assign CK tag successfully for unbuyedUser']);
                    }
                }
            } else {
                return response()->json(['success' => false, 'message' => 'User is already using ' . $user->activePlan() . 'plan.']);
            }
        }
    }

    public function investIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.invest', $details);
    }

    public function pressIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.press', $details);
    }

    public function skyColorIndex()
    {
        $headingData = EditHeading::where('module', 'sky_colors')->first();

        return view('web2.user.sky-color', compact('headingData'));
    }

    public function runpodTest(Request $request)
    {
        // $queryparams = $request->except(['data']);
        // $queryparams['id'] = Auth::id();
        // $payload = $request->only('data');
        $url = \Config::get('app.GPU_SERVER_HOST_SEG');
        $headers = [
            'accept' => 'multipart/form-data',
            'Access-Control-Allow-Origin' => '*',
        ];
        $curlRequest = new CurlRequestClass();

        return $curlRequest->curlRequests($url, $headers, null, 'GET');
    }

    public function runpodGetMasking(Request $request)
    {
        $queryparams = $request->except(['data']);
        $queryparams['id'] = Auth::id();
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

    public function runpodColorAndTexture(Request $request)
    {
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
        $url = \Config::get('app.GPU_SERVERLESS_COLOR_AND_TEXTURE');
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function runpodSkyColorChange(Request $request)
    {
        // $payload = json_decode($request->payload, true);
        // $payload['fireid'] = Auth::id();
        // $queryparams = $request->except(['payload']);
        // $url = \Config::get('app.GPU_SERVER_HOST_SEG').'/sky_color_change?'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, $payload, 'POST');
        $responseFailId = '';
        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
        $prompt = $payloadImage['prompt'];
        $uniqueFileName = $this->generateUniqueFileName();
        $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadImage['init_images'], $uniqueFileName);

        if ($googleStorageFileImageUrl === false) {
            return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
        }

        $payload = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
                'no_design' => intval($payloadData['no_of_Design']),
                'weather' => strtolower($payloadData['weather']),
                'unique_id' => $uniqueFileName,
            ],
        ];

        $url = \Config::get('app.GPU_SERVERLESS_SKY_COLOR');
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function runpodimgToimg(Request $request)
    {
        $runpodName = $request->runpod_name;
        $dynamicServerPod = $this->DynamicInPaintServerRunPod($runpodName);
        $payload = json_decode($request->payload, true);
        $payload['fireid'] = Auth::id();
        $queryparams = $request->except(['payload']);
        $url = $dynamicServerPod . '/img2img?' . http_build_query($queryparams);
        $headers = [
            'accept' => 'multipart/form-data',
            'Access-Control-Allow-Origin' => '*',
        ];
        $curlRequest = new CurlRequestClass();

        return $curlRequest->curlRequests($url, $headers, $payload, 'POST');
    }

    public function runpodFullHD(Request $request)
    {
        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicInPaintServerRunPod($runpodName);
        // $payload = $request->all();
        // $request->merge(['id' => Auth::id()]);
        // $queryparams = $request->except(['data']);
        // $url = $dynamicServerPod.'/fullhd?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');

        $payloadData = $request->all();

        $request->merge(['id' => Auth::id()]);

        $uniqueFileName = $this->generateUniqueFileName();
        $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName);

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

                $storeData = $this->getDataToSaveForFullHDImage($response, $payloadData);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function runpodEnhance(Request $request)
    {
        $runpodName = $request->runpod_name;
        $dynamicServerPod = $this->DynamicServerRunPod($runpodName);
        $payload = $request->all();
        $request->merge(['id' => Auth::id()]);
        $queryparams = $request->except(['data']);
        $url = $dynamicServerPod . '/enhace?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&' . http_build_query($queryparams);
        $headers = [
            'accept' => 'multipart/form-data',
            'Access-Control-Allow-Origin' => '*',
        ];
        $curlRequest = new CurlRequestClass();

        return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');
    }

    public function runpodImageSeperate(Request $request)
    {
        // $payload = $request->all();
        // $request->merge(['id' => Auth::id()]);
        // $queryparams = $request->except(['data']);
        // $url = \Config::get('app.GPU_SERVER_HOST').'/image_seperate?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');

        $payloadData = $request->all();
        $request->merge(['id' => Auth::id()]);

        $uniqueFileName = $this->generateUniqueFileName();
        $googleStorageFileImageUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName);

        if ($googleStorageFileImageUrl === false) {
            return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
        }

        $payload = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
            ],
        ];

        $url = \Config::get('app.GPU_SERVERLESS_FURNITURE_FINDER');
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if (empty($response['output']['furnitures'])) {

            return json_encode(['error' => 'Furniture does not appear in your image. Please try with other images.']);
        } else {
            $result = [
                'Sucess' => [
                    'generated_image' => $response['output']['furnitures'],
                ],
            ];

            return json_encode($result);
        }
    }

    public function runpodHostInit(Request $request)
    {
        $runpodName = $request->runpod_name;
        $dynamicServerPod = $this->DynamicServerRunPod($runpodName);
        $payload = $request->all();
        $request->merge(['id' => Auth::id()]);
        $queryparams = $request->except(['data']);
        $url = $dynamicServerPod . '/init?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&' . http_build_query($queryparams);
        $headers = [
            'accept' => 'multipart/form-data',
            'Access-Control-Allow-Origin' => '*',
        ];
        $curlRequest = new CurlRequestClass();

        return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');
    }


    public function runpodBeautifulRedesign(Request $request)
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

        $url = \Config::get('app.GPU_SERVERLESS_BEAUTIFUL_REDESIGN');
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        $failedResponseCount = session('failedResponseCount', 0);
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

                $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];
                    session(['failedResponseCount' => 0]);
                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            $failedResponseCount++;
            session(['failedResponseCount' => $failedResponseCount]);
            if ($failedResponseCount >= 5) {
                // Send mail
                $moduleName = 'Redesign';
                Mail::to('bhaviks@itpathsolutions.com')->send(new sendRundpodFailedRequest($moduleName, $response));

                session(['failedResponseCount' => 0]);
            }

            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }

        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicServerRunPod($runpodName);
        // $payload = $request->all();
        // $request->merge(['id' => Auth::id()]);
        // $queryparams = $request->except(['data']);
        // $url = $dynamicServerPod.'/beautiful_redesign?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');
    }



    public function runpodDecorStaging(Request $request)
    {
        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicInPaintServerRunPod($runpodName);
        // $payload = json_decode($request->payload, true);
        // $payload['fireid'] = Auth::id();
        // $queryparams = $request->except(['payload']);
        // $url = $dynamicServerPod.'/fill_decor_furniture?'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, $payload, 'POST');

        $payloadData = $request->all();
        $payloadImage = json_decode($request->payload, true);
        $prompt = $payloadImage['prompt'];
        if (strpos($payloadImage['init_images'], 'data:image/') === 0) {
            $request->session()->forget('inputImageSession');
        }
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

        $payload = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
                'design_type' => intval($payloadData['designtype']),
                'room_type' => strtolower($payloadData['roomtype']),
                'design_style' => strtolower($payloadData['design_style']),
                'prompt' => !empty($payloadImage['prompt']) ? $payloadImage['prompt'] : '',
                'no_design' => intval($payloadData['no_of_Design']),
                'unique_id' => $uniqueFileName,
            ],
        ];

        $url = \Config::get('app.GPU_SERVERLESS_DECOR_STAGING');
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function runpodPrecion(Request $request)
    {
        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicInPaintServerRunPod($runpodName);
        // $payload = json_decode($request->payload, true);
        // $payload['fireid'] = Auth::id();
        // $queryparams = $request->except(['payload']);
        // $url = $dynamicServerPod.'/precision?'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, $payload, 'POST');

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

        $url = \Config::get('app.GPU_SERVERLESS_PRECISION');
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function freeTrialFB()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.free-trial-fb', $details);
    }

    public function runpodPrecisionEhance(Request $request)
    {
        // $runpodName = $request->runpod_name;
        // $dynamicServerPod = $this->DynamicServerRunPod($runpodName);
        // $payload = $request->all();
        // $request->merge(['id' => Auth::id()]);
        // $queryparams = $request->except(['data']);
        // $url = $dynamicServerPod.'/improve_quality?init=https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1&'.http_build_query($queryparams);
        // $headers = [
        //     'accept'=> 'multipart/form-data',
        //     'Access-Control-Allow-Origin'=> '*',
        // ];
        // $curlRequest = new CurlRequestClass();
        // return $curlRequest->curlRequests($url, $headers, ['data' => $request->data], 'POST');

        $payloadData = $request->all();

        $request->merge(['id' => Auth::id()]);

        $image = preg_replace('/^data:image\/(png|jpeg|jpg);base64,/', '', $payloadData['data']);

        $payload = [
            'input' => [
                'image' => $image,
                'design_type' => intval($payloadData['designtype']),
                'room_type' => strtolower($payloadData['roomtype']),
                'enhance' => true,
            ],
        ];

        $url = \Config::get('app.GPU_SERVERLESS_BEAUTIFUL_REDESIGN');
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if (!$response) {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
        if ($response['status'] === 'IN_PROGRESS' || $response['status'] === 'IN_QUEUE') {

            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
        if (isset($response['output']) && isset($response['output']['errors'])) {

            return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
        } else {
            $result = [
                'Sucess' => [
                    'original_image' => $response['output']['input_image'],
                    'generated_image' => $response['output']['output_images'],
                ],
            ];

            $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
            $dataSaved = $this->saveData($storeData);
            if ($dataSaved) {
                return json_encode($result);
            } else {

                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            }
        }
    }

    public function DynamicServerRunPod($runpodName)
    {
        $runpodServer = '';
        if ($runpodName != null) {
            if ($runpodName == 'first_runpod') {
                $runpodServer = config('app.GPU_SERVER_HOST_INIT');
            } elseif ($runpodName == 'second_runpod') {
                $runpodServer = config('app.GPU_SECOND_SERVER_HOST_INIT');
            }
        } else {
            $runpodServer = config('app.GPU_SERVER_HOST_INIT');
        }

        return $runpodServer;
    }

    public function DynamicInPaintServerRunPod($runpodName)
    {
        $runpodServer = '';
        if ($runpodName != null) {
            if ($runpodName == 'first_runpod') {
                $runpodServer = config('app.GPU_SERVER_HOST');
            } elseif ($runpodName == 'second_runpod') {
                $runpodServer = config('app.GPU_SECOND_SERVER_HOST');
            }
        } else {
            $runpodServer = config('app.GPU_SERVER_HOST');
        }

        return $runpodServer;
    }

    public function imageCache(Request $request)
    {
        if ($request->has('image') && $request->has('cache_type')) {
            $randomString = \Str::random(20);
            if (\Cache::has($request->cache_type . '_' . $randomString)) {
                return response()->json(['success' => true, 'image_cache_id' => $request->cache_type . '_' . $randomString]);
            } else {
                \Cache::set($request->cache_type . '_' . $randomString, $request->image, now()->addMinutes(5)->diffInMinutes(now()));

                return response()->json(['success' => true, 'image_cache_id' => $request->cache_type . '_' . $randomString]);
            }
        }

        return response()->json(['success' => false, 'message' => 'No image Data found']);
    }

    public function getImageCache(Request $request)
    {
        if ($request->has('id')) {
            if (\Cache::has($request->id)) {
                // Removed cache after get the data
                $data = Cache::get($request->id);
                if ($request->has('removeCache') && ($request->removeCache)) {
                    Cache::forget($request->id);
                }
                $mimeType = $this->getFileMimeTypeFromUrl($data);
                $imagedata = 'data:' . $mimeType . ';base64,' . base64_encode(file_get_contents($data));

                return response()->json(['success' => true, 'data' => $imagedata]);
            } else {
                return response()->json(['success' => false, 'message' => 'No image Data found']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Try again']);
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
            'is_public' => $payloadData['public'],
            'designtype' => intval($payloadData['designtype']),
            'prompt' => !empty($payloadData['is_custom_instruction']) ? $payloadData['is_custom_instruction'] : '',
            'hd_image' => 0,
        ];

        return $storeData;
    }

    public function getDataToSaveForPrecision($response, $payloadData, $prompt)
    {
        $storeData = [
            'original_image' => $response['output']['input_image'],
            'generated_image' => $response['output']['output_images'],
            'style' => !empty($payloadData['design_style']) ? $payloadData['design_style'] : 'N/A',
            'room_type' => !empty($payloadData['roomtype']) ? $payloadData['roomtype'] : 'N/A',
            'mode' => $payloadData['modeType'],
            'user_uid' => Auth::id(),
            'is_public' => 0,
            'designtype' => intval($payloadData['designtype']),
            'prompt' => !empty($prompt) ? $prompt : '',
            'hd_image' => 0,
        ];

        return $storeData;
    }

    public function getDataToSaveForFullHDImage($response, $payloadData)
    {
        $storeData = [
            'original_image' => $response['output']['input_image'],
            'generated_image' => $response['output']['output_images'],
            'style' => !empty($payloadData['design_style']) ? $payloadData['design_style'] : 'N/A',
            'room_type' => !empty($payloadData['roomtype']) ? $payloadData['roomtype'] : 'N/A',
            'mode' => $payloadData['modeType'],
            'user_uid' => Auth::id(),
            'is_public' => !empty($payloadData['privateId']) ? $payloadData['privateId'] : 0,
            'designtype' => intval($payloadData['designtype']),
            'prompt' => !empty($payloadData['prompt']) ? $payloadData['prompt'] : '',
            'hd_image' => 1,
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
        if ($data['mode'] >= 1 && $data['mode'] <= 13) {
            $inpainting = $data['mode'];
        } else {
            $inpainting = 0;
        }

        $staticPart = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';

        // Remove the static part from the original image path
        $originalImagePath = str_replace($staticPart, '', $data['original_image']);

        $generatedImages = $data['generated_image'];
        $storedIds = [];
        foreach ($generatedImages as $generatedImage) {
            $generatedImagePath = str_replace($staticPart, '', $generatedImage);
            $newRecord = PublicGallery::create([
                'original_image' => $originalImagePath,
                'generated_image' => $generatedImagePath,
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

    public function failedResponseData(Request $request)
    {
        $response = $request->response;
        $payload = $request->payload;
        $payloadData = $request->payloadData;
        $prompt = $request->prompt;
        if ($response && $response['status'] === 'COMPLETED') {

            // return json_encode(['error' => 'Something went wrong. Please try again.']);
            if (!isset($response['output']) || isset($response['output']['errors'])) {

                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            } else {
                $result = $response['output']['output_images'];

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    return json_encode(['Sucess' => $result]);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function downloadFileFromUrl(Request $request)
    {
        if ($request->has('url') == false) {
            return response()->json(['success' => false, 'message' => 'url Field is required.']);
        }
        if ($request->url == '' || $request->url == null) {
            return response()->json(['success' => false, 'message' => 'url Field has must be a valid file url.']);
        }
        if (filter_var($request->url, FILTER_VALIDATE_URL) == false) {
            return response()->json(['success' => false, 'message' => 'Invalid URL.']);
        }
        $headers = get_headers($request->url, true);
        if (isset($headers['Content-Type']) && is_string($headers['Content-Type']) && strpos($headers['Content-Type'], 'image/') !== false) {
            $fileContent = file_get_contents($request->url);
            header('Content-Type: ' . $headers['Content-Type']);
            header('Content-Disposition: attachment; filename=' . basename($request->url));
            echo $fileContent;
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid file URL.']);
        }
    }

    public function getFileMimeTypeFromUrl($url)
    {
        // Get the file contents from the URL
        $fileContents = file_get_contents($url);

        // Get the temporary file path
        $tempFilePath = tempnam(sys_get_temp_dir(), 'remote_file_');

        // Save the file contents to the temporary file
        file_put_contents($tempFilePath, $fileContents);

        // Get the MIME type of the file
        $mimeType = mime_content_type($tempFilePath);

        // Clean up: delete the temporary file
        unlink($tempFilePath);

        return $mimeType;
    }

    public function getAPIUsersByDate(Request $request)
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();
        $data = $this->userClass->getAPIUsersByDate($startDate, $endDate);
        if ($data) {
            if (is_array(\Config::get('app.SALES_TEAM')) && count(\Config::get('app.SALES_TEAM')) > 0) {
                foreach (\Config::get('app.SALES_TEAM') as $salesmember_email => $salesmember_name) {
                    Mail::to($salesmember_email)->send(new sendWeeklyReportToSalesTeam($startDate, $endDate, $data, $salesmember_email, $salesmember_name));
                }

                return response()->json(['success' => true, 'message' => 'Last Weekly API Users Report has been sent to Sales team']);
            } else {
                return response()->json(['success' => false, 'message' => 'No Sales Email found.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'No Users Found']);
        }
    }

    public function getAPIUsersByDateFromFastSpringAPI(Request $request)
    {
        $startDate = Carbon::now()->subWeek()->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');
        $products = ['standard-sme-10000-api-calls-mo', 'standard-sme-500-api-calls-mo', 'standard-sme-3000-api-calls-mo', 'api-bronze', 'standard-sme-new', 'standard-sme', 'standard-sme-1000-api-calls-mo', 'api-silver', 'api-gold'];
        $scope = 'live';
        $created_users = $this->userClass->getAPIUsersByDateFromFastSpring($startDate, $endDate, 'created', $scope, $products);
        $canceled_users = $this->userClass->getAPIUsersByDateFromFastSpring($startDate, $endDate, 'canceled', $scope, $products);
        if (is_array(\Config::get('app.SALES_TEAM')) && count(\Config::get('app.SALES_TEAM')) > 0) {
            foreach (\Config::get('app.SALES_TEAM') as $salesmember_email => $salesmember_name) {
                Mail::to($salesmember_email)->send(new sendWeeklyReportToSalesTeam($startDate, $endDate, $created_users, $canceled_users, $salesmember_email, $salesmember_name));
            }

            return response()->json(['success' => true, 'message' => 'Last Weekly API Users Report has been sent to Sales team']);
        } else {
            return response()->json(['success' => false, 'message' => 'No Sales Email found.']);
        }
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

    public function generateUniqueFileName()
    {
        $time = date('Y-m-d-H-i-s', strtotime('now'));
        $uuid = Str::uuid();

        return $uuid . '-' . $time;
    }

    public function runpodFurnitureRemoval(Request $request)
    {
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

        $url = \Config::get('app.GPU_SERVERLESS_FURNITURE_REMOVAL');
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function runpodFillSpace(Request $request)
    {
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function getProductDetails($productpath)
    {
        if (empty($productpath)) {
            return response()->json(['success' => false, 'message' => 'Please Enter a product to get details.']);
        }

        return $this->fastspringapi->getProductByPath($productpath);
    }

    public function getToken(Request $request)
    {
        $payload = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        $secret_key = \Config::get('app.JWT_SECRET_KEY');
        try {
            $jwt = JWT::encode($payload, $secret_key, 'HS256');

            return response()->json(['access_token' => $jwt]);
        } catch (\Exception $e) {
            Log::error('JWT TOKEN ERROR' . $e->getMessage());

            return response()->json(['success' => false]);
        }
    }

    public function top15percentusers()
    {
        // Run the SQL query to fetch data
        $count = \DB::select('SELECT CEIL(COUNT(*) * 0.15) as total_count FROM users WHERE total_designs != 0');
        $data = \DB::select('SELECT name, email, total_designs
        FROM (
            SELECT name, email, total_designs,
                   @row_number := @row_number + 1 AS row_number
            FROM users, (SELECT @row_number := 0) AS r
            ORDER BY total_designs DESC
        ) AS ranked_users
        WHERE total_designs != 0 AND row_number <= ' . $count[0]->total_count . ';');

        // Define CSV header
        $csvHeader = ['name', 'email', 'total_designs']; // Adjust with your actual column names

        // Open a file handle for writing
        $fileHandle = fopen('php://temp', 'w');

        // Write the CSV header
        fputcsv($fileHandle, $csvHeader);

        // Write data rows
        foreach ($data as $row) {
            fputcsv($fileHandle, (array) $row);
        }

        // Move the pointer to the beginning of the file
        rewind($fileHandle);

        // Get CSV content
        $csvContent = stream_get_contents($fileHandle);

        // Close the file handle
        fclose($fileHandle);

        // Store CSV content to a file
        Storage::disk('public')->put('exported_data.csv', $csvContent);

        return 'Data exported to CSV successfully!';
    }

    public function startPage()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.start-page', $details);
    }

    public function getRootDesigns(Request $request)
    {
        try {

            if ($request->type == 'private' && !auth()->check()) {
                return response()->json([
                    'success' => false,
                ], 500);
            }

            $designs_query = PublicGallery::select('id', 'original_image', 'generated_image', 'style', 'mode', 'room_type', 'is_public', 'is_favorite', 'hd_image', 'design_type');

            if ($request->type == 'public') {
                $designs_query->public()->where('is_active', 1)->where('is_inpainting', 0);
            } else {
                $user = auth()->user();
                $designs_query->private()->where('user_uid', $user->id)->where('is_inpainting', 0);
            }

            $designs = $designs_query
                ->where('design_type', $request->designType)
                ->orderBy('id', 'desc')
                ->paginate(config('app.PUBLIC_DESIGNS_COUNT'));

            $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
            foreach ($designs as $design) {
                $design->original_image = $staticPath . $design->original_image;
                $design->generated_image = $staticPath . $design->generated_image;
            }

            $data = ['designs' => $designs];
            $imageHtml = view('web.user.show-your-root-design-data', $data)->render();

            return response()->json([
                'success' => true,
                'data' => $imageHtml,
                'pageType' => $request->pageType,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function colorSwapIndex()
    {
        $headingData = EditHeading::where('module', 'paint_visualizer')->first();

        return view('web2.user.color-swap', compact('headingData'));
    }

    public function runpodColorSwapTransfer(Request $request)
    {
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
            if (!isset($response['output']) || isset($response['output']['errors'])) {
                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            } else {
                $result = [
                    'Sucess' => [
                        'original_image' => $response['output']['input_image'],
                        'generated_image' => $response['output']['output_images'],
                    ],
                ];

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function textureColorIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.texture-colors', $details);
    }

    public function furnitureFinderAgeIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.furniture-finder-age', $details);
    }

    public function enterpriseIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.enterprise', $details);
    }

    public function whitelabelIndex()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.white-label', $details);
    }

    public function fetchAllImages(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $designs_query = PublicGallery::select('id', 'original_image', 'generated_image')
                ->whereNotNull('generated_image')
                ->where('generated_image', '!=', '')
                ->where('user_uid', $user->id)
                ->where('is_public', 0);
            if ($request->modevalue == 'favourite') {
                if ($request->designType == 0) {
                    $designs_query = $designs_query->where('is_favorite', 1)
                        ->where('is_inpainting', $request->designType)
                        ->where('mode', '!=', 'Convenient Redesign')
                        ->orderBy('id', 'desc')->get();
                } elseif ($request->designType == 99) {
                    $designs_query = $designs_query->where('is_favorite', 1)
                        ->where('is_inpainting', 0)
                        ->where('mode', 'Convenient Redesign')
                        ->orderBy('id', 'desc')->get();
                } else {
                    $designs_query = $designs_query->where('is_favorite', 1)
                        ->where('is_inpainting', $request->designType)
                        ->orderBy('id', 'desc')->get();
                }
            } elseif ($request->modevalue == 'subproject') {
                $designs_query = UserProjectImages::where('user_id', $user->id)
                                ->where('project_id', $request->designType)
                                ->whereNull('subproject_id')
                                ->whereHas('publicGallery')
                                ->with(['publicGallery:id,original_image,generated_image']) // Directly select the required columns
                                ->orderByDesc('id') // Use the more concise orderByDesc method
                                ->get()
                                ->pluck('publicGallery')
                                ->filter();
                // $designs_query = UserProjectImages::where('user_id', $user->id)
                //     ->where('project_id', $request->designType)
                //     ->whereNull('subproject_id')
                //     ->orderBy('id', 'desc')
                //     ->get()
                //     ->filter();
            } elseif ($request->modevalue == 'subproject_images') {
                $designs_query = UserProjectImages::where('user_id', $user->id)
                                ->where('project_id', $request->designType)
                                ->where('subproject_id', $request->subProjectId)
                                ->whereHas('publicGallery')
                                ->with(['publicGallery:id,original_image,generated_image'])
                                ->orderByDesc('id')
                                ->get()
                                ->pluck('publicGallery') // Extract only the publicGallery relationships
                                ->filter();
                // $designs_query = UserProjectImages::where('user_id', $user->id)
                //     ->where('project_id', $request->designType)
                //     ->where('subproject_id', $request->subProjectId)
                //     ->orderBy('id', 'desc')
                //     ->get()
                //     ->filter();
            } else {
                if ($request->subProjectId == 'convenient-redesign') {
                    $designs_query = $designs_query->where('design_type', $request->designType)
                        ->where('is_inpainting', $request->modevalue)
                        ->where('mode', 'Convenient Redesign')
                        ->orderBy('id', 'desc')->get();
                } else {
                    $designs_query = $designs_query->where('design_type', $request->designType)
                        ->where('is_inpainting', $request->modevalue)
                        ->where('mode', '!=', 'Convenient Redesign')
                        ->orderBy('id', 'desc')->get();
                }
            }

            $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
            foreach ($designs_query as $design) {
                $design->original_image = $staticPath . $design->original_image;
                $design->generated_image = $staticPath . $design->generated_image;
            }

            if ($designs_query->isEmpty()) {
                $demoImages = $this->getStaticImages($request->modevalue);
                $images = collect($demoImages)->map(function ($demoImage) {
                    return [
                        'before' => $demoImage['original_image'],
                        'after' => $demoImage['generated_image'],
                    ];
                });
            } else {
                // Format the response
                $images = $designs_query->map(function ($design) {
                    return [
                        'before' => $design->original_image,
                        'after' => $design->generated_image,
                    ];
                });
            }

            return response()->json(['success' => true, 'images' => $images]);
        }
    }

    public function styleTransferIndex()
    {
        $headingData = EditHeading::where('module', 'material_swap')->first();

        return view('web2.user.style-transfer', compact('headingData'));
    }

    public function runpodStyleTransfer(Request $request)
    {
        $payloadData = $request->all();
        $prompt = '';
        // $inputImage = preg_replace('/^data:image\/(png|jpeg|jpg);base64,/', '', $payloadData['init_images']);
        // $maskImage = preg_replace('/^data:image\/(png|jpeg|jpg);base64,/', '', $payloadData['mask']);
        // $textureImage = preg_replace('/^data:image\/(png|jpeg|jpg);base64,/', '', $payloadData['texture_image']);
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
        $googleStorageFileTextureUrl = $this->storeImageToGoogleBucket($payloadData['texture_image'], $uniqueFileName, $isMask = false, $texture = true);
        $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

        if ($googleStorageFileImageUrl === false || $googleStorageFileMaskUrl === false) {
            return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
        }

        $segmentType = filter_var($payloadData['segmentType'], FILTER_VALIDATE_BOOLEAN);

        $selectedValue = $payloadData['no_of_texture'];
        $splitValues = explode(' X ', $selectedValue);
        $no_of_rows = intval($splitValues[0]);
        $no_of_cols = intval($splitValues[1]);

        $no_of_design = intval($payloadData['no_of_Design']);

        $payloads = [
            [
                'input' => [
                    'image' => $googleStorageFileImageUrl['url'],
                    'mask_image' => $googleStorageFileMaskUrl['url'],
                    'image_style' => $googleStorageFileTextureUrl['url'],
                    'segment_type' => $segmentType,
                    'no_design' => $no_of_design,
                    'no_of_rows' => $no_of_rows,
                    'no_of_cols' => $no_of_cols,
                ],
            ],
        ];

        $urls = [
            \Config::get('app.GPU_SERVERLESS_STYLE_TRANSFER'),
        ];

        $payloads[] = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
                'mask_image' => $googleStorageFileMaskUrl['url'],
                'image_style' => $googleStorageFileTextureUrl['url'],
                'segment_type' => $segmentType,
                'no_of_rows' => $no_of_rows,
                'no_of_cols' => $no_of_cols,
            ],
        ];
        $urls[] = \Config::get('app.GPU_SERVERLESS_STYLE_TRANSFER2');

        // switch ($no_of_design) {
        //     case 4:
        //         // Split into 4 parts
        //         for ($i = 0; $i < 4; $i++) {
        //             $payloads[] = [
        //                 'input' => [
        //                     'image' => $googleStorageFileImageUrl['url'],
        //                     'mask_image' => $googleStorageFileMaskUrl['url'],
        //                     'image_style' => $googleStorageFileTextureUrl['url'],
        //                     'segment_type' => $segmentType,
        //                     'no_of_rows' => $no_of_rows,
        //                     'no_of_cols' => $no_of_cols,
        //                 ],
        //             ];
        //             $urls[] = \Config::get('app.GPU_SERVERLESS_STYLE_TRANSFER2');
        //         }
        //         break;
        //     case 3:
        //         // Split into 3 parts
        //         for ($i = 0; $i < 3; $i++) {
        //             $payloads[] = [
        //                 'input' => [
        //                     'image' => $googleStorageFileImageUrl['url'],
        //                     'mask_image' => $googleStorageFileMaskUrl['url'],
        //                     'image_style' => $googleStorageFileTextureUrl['url'],
        //                     'segment_type' => $segmentType,
        //                     'no_of_rows' => $no_of_rows,
        //                     'no_of_cols' => $no_of_cols,
        //                 ],
        //             ];
        //             $urls[] = \Config::get('app.GPU_SERVERLESS_STYLE_TRANSFER2');
        //         }
        //         break;
        //     case 2:
        //         // Split into 2 parts
        //         for ($i = 0; $i < 2; $i++) {
        //             $payloads[] = [
        //                 'input' => [
        //                     'image' => $googleStorageFileImageUrl['url'],
        //                     'mask_image' => $googleStorageFileMaskUrl['url'],
        //                     'image_style' => $googleStorageFileTextureUrl['url'],
        //                     'segment_type' => $segmentType,
        //                     'no_of_rows' => $no_of_rows,
        //                     'no_of_cols' => $no_of_cols,
        //                 ],
        //             ];
        //             $urls[] = \Config::get('app.GPU_SERVERLESS_STYLE_TRANSFER2');
        //         }
        //         break;
        //     case 1:
        //     default:
        //         // Single part
        //         $payloads[] = [
        //             'input' => [
        //                 'image' => $googleStorageFileImageUrl['url'],
        //                 'mask_image' => $googleStorageFileMaskUrl['url'],
        //                 'image_style' => $googleStorageFileTextureUrl['url'],
        //                 'segment_type' => $segmentType,
        //                 'no_of_rows' => $no_of_rows,
        //                 'no_of_cols' => $no_of_cols,
        //             ],
        //         ];
        //         $urls[] = \Config::get('app.GPU_SERVERLESS_STYLE_TRANSFER2');
        //         break;
        // }

        $responses = $this->curlRequest->serverLessMultiCurlRequests($urls, $payloads);
        if (isset($response['output']['errors'])) {
            return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
        } else {
            $results = [];
            foreach ($responses as $response) {
                $results = array_merge($results, $response['output']['output_images']);
            }

            $generatedImageUrls = $this->storeGeneratedImageToGoogleBucket($results, $uniqueFileName);

            $result = [
                'Sucess' => [
                    'original_image' => $response['output']['input_image'],
                    'generated_image' => $generatedImageUrls,
                ],
            ];

            // $result = $response['output']['output_images'];
            $storeData = $this->getDataToSaveForMaterialSwap($generatedImageUrls, $googleStorageFileImageUrl['url'], $payloadData, $prompt);
            $dataSaved = $this->saveData($storeData);
            if ($dataSaved) {
                $result['storedIds'] = $dataSaved['storedIds'];

                return json_encode($result);
            } else {
                Log::error($dataSaved);

                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            }
        }
    }

    public function storeGeneratedImageToGoogleBucket($result, $uniqueFileName)
    {
        $uploadedUrls = [];
        foreach ($result as $index => $image) {
            $bucketname = \Config::get('app.googleBucketName');
            $file_name = 'UserGenerations/cristian/output-' . $uniqueFileName . '-' . ($index + 1) . '.png';

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
                    $uploadedUrls[] = 'https://storage.googleapis.com/' . $bucketname . '/' . $file_name;
                }
            } catch (\UnableToWriteFile | UnableToSetVisibility $e) {
                \Log::error('Unable to write a file in google bucket' . $e->getMessage());
            }
        }

        return $uploadedUrls;
    }

    public function getDataToSaveForMaterialSwap($generatedImageUrls, $inputImageUrl, $payloadData, $prompt)
    {
        // $outputImages = $responses[0]['output']['output_images'];
        // $outputImages = array_merge($outputImages, $responses[1]['output']['output_images']);

        // $responses[0]['output']['output_images'] = $outputImages;

        $storeData = [
            'original_image' => $inputImageUrl,
            'generated_image' => $generatedImageUrls,
            'style' => !empty($payloadData['design_style']) ? $payloadData['design_style'] : 'N/A',
            'room_type' => !empty($payloadData['roomtype']) ? $payloadData['roomtype'] : 'N/A',
            'mode' => $payloadData['modeType'],
            'user_uid' => Auth::id(),
            'is_public' => 0,
            'designtype' => intval($payloadData['designtype']),
            'prompt' => !empty($prompt) ? $prompt : '',
            'hd_image' => 0,
        ];

        return $storeData;
    }

    public function collageRenderIndex()
    {
        $headingData = EditHeading::where('module', 'room_composer')->first();

        return view('web2.user.collage-render', compact('headingData'));
    }

    public function runpodCollegeToRender(Request $request)
    {
        // $payloadData = $request->validated();
        $payloadData = $request->all();
        $request->merge(['id' => Auth::id()]);

        $uniqueFileName = $this->generateUniqueFileName();
        if (strpos($payloadData['data'], 'http://') === 0 || strpos($payloadData['data'], 'https://') === 0) {
            $b64image = base64_encode(file_get_contents($payloadData['data']));
            $googleStorageFileUrl = $this->storeImageToGoogleBucket($b64image, $uniqueFileName);
        } else {
            $googleStorageFileUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName);
        }

        if (strpos($payloadData['masked_image'], 'http://') === 0 || strpos($payloadData['masked_image'], 'https://') === 0) {
            $b64image = base64_encode(file_get_contents($payloadData['masked_image']));
            $googleStorageMaskFileUrl = $this->storeImageToGoogleBucket($b64image, $uniqueFileName, true);
        } else {
            $googleStorageMaskFileUrl = $this->storeImageToGoogleBucket($payloadData['masked_image'], $uniqueFileName, true);
        }

        if ($googleStorageFileUrl === false) {
            return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
        }

        $payload = [
            'input' => [
                'image' => $googleStorageFileUrl['url'],
                'design_type' => intval($payloadData['designtype']),
                'room_type' => strtolower($payloadData['roomtype']),
                'design_style' => strtolower($payloadData['design_style']),
                'prompt' => !empty($payloadData['is_custom_instruction']) ? $payloadData['is_custom_instruction'] : '',
                // "negative_prompt" => !empty($payloadData['is_custom_negative_instruction']) ? $payloadData['is_custom_negative_instruction'] : "",
                'ai_intervention' => $payloadData['strengthType'],
                'no_design' => intval($payloadData['no_of_Design']),
                'unique_id' => $uniqueFileName,
            ],
        ];

        $url = \Config::get('app.GPU_SERVERLESS_ROOM_COMPOSER_STATIC_FURNITURE');
        if ($request->has('redesign_model') && ($request->redesign_model == 'beautiful')) {
            // $payload['input']['dataImages'] = $request->dataImages;
            $payload['input']['mask_image'] = $googleStorageMaskFileUrl['url'];
            $payload['input']['segment_type'] = true;
            $url = \Config::get('app.GPU_SERVERLESS_ROOM_COMPOSER_STATIC_FURNITURE');
        } elseif ($request->has('redesign_model') && ($request->redesign_model == 'creative')) {
            $payload['input']['ai_intervention'] = $request->strengthType;
            $url = \Config::get('app.GPU_SERVERLESS_ROOM_COMPOSER_DYNAMIC_ROOM');
        }
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if (isset($response['output']['errors'])) {
            return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
        } else {
            $result = [
                'Sucess' => [
                    'original_image' => $response['output']['input_image'],
                    'generated_image' => $response['output']['output_images'],
                ],
            ];

            $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
            $dataSaved = $this->saveData($storeData);
            if ($dataSaved) {
                return json_encode($result);
            } else {
                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            }
        }
    }

    public function uploadImageToGoogleCloudCollegeToRender(Request $request)
    {
        $googleStorageFileUrl = null;
        $uniqueFileName = $this->generateUniqueFileName();
        $payloadData = $request->all();
        if (strpos($payloadData['data'], 'http://') === 0 || strpos($payloadData['data'], 'https://') === 0) {
            $b64image = base64_encode(file_get_contents($payloadData['data']));
            $googleStorageFileUrl = $this->storeImageToGoogleBucket($b64image, $uniqueFileName, null, $isTexture = null, $colorTexture = null, $collegeToRender = true);
        } else {
            $googleStorageFileUrl = $this->storeImageToGoogleBucket($payloadData['data'], $uniqueFileName, null, $isTexture = null, $colorTexture = null, $collegeToRender = true);
        }
        if ($googleStorageFileUrl != null) {
            $data = RoomBlendSavedCustomElements::create(['user_id' => Auth::id(), 'url' => $googleStorageFileUrl['url']]);

            return response()->json(['success' => true, 'url' => $googleStorageFileUrl, 'id' => $data->id]);
        }

        return response()->json(['success' => false, 'message' => 'image not uploaded']);
    }

    public function loadRoomTrendImages()
    {
        $elements = RoomBlendSavedCustomElements::select('user_id', 'url', 'id')
            ->where('user_id', Auth::id())
            ->get()
            ->filter(function ($item) {
                return !empty($item->url) && $this->urlExists($item->url);
            })
            ->map(function ($item) {
                $imageData = file_get_contents($item->url);
                $item->url = 'data:image/png;base64,' . base64_encode($imageData);

                return $item;
            });

        if ($elements->isNotEmpty()) {
            return response()->json(['success' => true, 'data' => $elements]);
        }

        return response()->json(['success' => false, 'message' => 'image not uploaded']);
    }

    private function urlExists($url)
    {
        $headers = @get_headers($url);

        return $headers && strpos($headers[0], '200') !== false;
    }

    public function deleteroomtrendimages(Request $request)
    {
        $element = RoomBlendSavedCustomElements::find($request->id);

        if (!$element) {
            return response()->json(['success' => false, 'message' => 'Image not found'], 404);
        }

        // Delete from Google Cloud Storage
        $url = $element->url; // Assuming 'url' is the field where the Google Cloud Storage URL is stored

        $deletedFromBucket = $this->deleteImageFromGoogleBucket($url);
        // Delete from database
        $element->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    }

    public function deleteImageFromGoogleBucket($url): bool
    {
        try {
            // Extract the bucket name and file name from the URL
            $parsedUrl = parse_url($url);
            $path = ltrim($parsedUrl['path'], '/');
            $parts = explode('/', $path, 2);
            $bucketName = $parts[0];
            $fileName = $parts[1];
            // Initialize StorageClient
            $storage = new StorageClient([
                'keyFile' => json_decode(file_get_contents(storage_path('app/plated-howl-370821-cf0e409bcbaa.json')), true),
            ]);

            $bucket = $storage->bucket($bucketName);
            $object = $bucket->object($fileName);

            // dd($object, $bucket);
            if ($object->exists()) {
                // Delete the object from Google Cloud Storage
                $object->delete();

                return true;
            } else {
                // Handle case where object doesn't exist
                return false;
            }
        } catch (\Exception $e) {
            // Log and handle any errors
            \Log::error('Failed to delete file from Google Cloud Storage: ' . $e->getMessage());

            return false;
        }
    }

    public function RemoveBackgroundImageRoomBlend(Request $request)
    {
        $url = \Config::get('app.GPU_SERVERLESS_BACKGROUND_REMOVAL');
        $payload = [
            'input' => [
                'image' => preg_replace('/^data:image\/(png|jpeg);base64,/', '', $request->data),
            ],
        ];
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if ($response && $response['status'] === 'COMPLETED') {
            if (!isset($response['output']) || isset($response['output']['errors'])) {
                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            } else {
                return response()->json(['success' => true, 'data' => 'data:image/png;base64,'.$response['output']]);
            }
        }else{
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function updateColorMode(Request $request)
    {
        $user = Auth::user();
        $user->light_mode = $request->input('light_mode');
        $user->save();

        return response()->json(['status' => 'success']);
    }

    public function designTransfer()
    {
        $headingData = EditHeading::where('module', 'design_transfer')->first();

        return view('web2.user.design-transfer', compact('headingData'));
    }

    public function runpodDesignTransfer(Request $request)
    {
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
        // $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadData['mask'],$uniqueFileName,$isMask = true);
        if (!empty($payloadData['texture_image']) && $payloadData['texture_image'] !== 'undefined') {
            $googleStorageFileTextureUrl = $this->storeImageToGoogleBucket($payloadData['texture_image'], $uniqueFileName, $isMask = false, $texture = false, $colorTexture = true);
        } else {
            $googleStorageFileTextureUrl['url'] = '';
        }

        if ($googleStorageFileImageUrl === false) {
            return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
        }

        $no_of_design = intval($payloadData['no_of_Design']);

        $payloads = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
                'style_image' => $googleStorageFileTextureUrl['url'],
                'no_design' => $no_of_design,
                'unique_id' => $uniqueFileName,
            ],
        ];

        $urls = \Config::get('app.GPU_SERVERLESS_DESIGN_TRANSFER');

        $response = $this->curlRequest->serverLessCurlRequests($urls, $payloads);
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    Log::error($dataSaved);

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        }
    }

    public function updateModalFlag(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->is_show_guideline_modal = $request->input('is_show_guideline_modal');
            $user->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    public function getStaticImages($type)
    {
        // Initialize arrays
        $imageData = [];

        // Define prefixes for each numeric type
        $prefixes = [
            0 => 'redesign_00/',
            1 => 'precision_01/',
            2 => 'fillspaces_02/',
        ];

        // Ensure $type is valid and is one of the expected numeric values
        if (array_key_exists($type, $prefixes)) {
            $prefix = $prefixes[$type];
            for ($i = 0; $i <= 3; $i++) { // Assuming 3 images for each array
                $imageData[] = [
                    'id' => $i,
                    'original_image' => asset('demo_generated_images/' . $prefix . 'original_image_' . ($i + 1) . '.png'),
                    'generated_image' => asset('demo_generated_images/' . $prefix . 'generated_image_' . ($i + 1) . '.png'),
                    'style' => 'Contemporary',
                    'mode' => 'Creative Redesign',
                    'room_type' => 'Living Room',
                    'is_public' => 0,
                    'is_favorite' => 0,
                    'hd_image' => 1,
                    'is_inpainting' => 0,
                    'design_type' => $type,
                ];
            }

            return $imageData;
        } else {
            // Handle invalid $type here
            return [];
        }
    }
    // public function SetAnEndDateAndNumberOfRemainingPeriodsForSubscription(){
    //     $emails = [
    //         'info@groupp.ca',
    //         'rwomackaggie@gmail.com',
    //         'britainranee@gmail.com',
    //         'kadams8619@yahoo.com',
    //         'estrada_jessica85@yahoo.com',
    //         'tpacci@verizon.net',
    //         'ashleybriane87@gmail.com',
    //         'ilmars.lasis@inbox.lv',
    //         'drtikiesq@gmail.com',
    //         'jen.considine@gmail.com',
    //         'bgre.lp@gmail.com',
    //         'jhcorrea@gmail.com',
    //         'pcrespolopez33@gmail.com',
    //         'nicoo.aos@gmail.com',
    //         'ashleycapps424@gmail.com',
    //         'zsuzsabalabas@gmail.com',
    //         'tseast@gmail.com',
    //         'Helena.zaratesimolin@sbcusd.k12.ca.us',
    //         'kenlarsen@sasktel.net',
    //         'john_vandijk@yahoo.com',
    //         'frances_2k4@yahoo.com',
    //         'cptess@yahoo.com',
    //         'jetaime84@gmail.com',
    //         'chaimezramarkovitz@gmail.com'
    //     ];

    //     $usersubscriptiondetails = [];
    //     foreach($emails as $key => $email){
    //         $user = User::where("email", $email)->with('subscription')->first();
    //         if(isset($user->subscription) && ($user->subscription->order_id != null)){
    //             $order_id = $user->subscription->order_id;
    //             if($order_id == "" || $order_id == null){
    //                 return false;
    //             }
    //             $usersubscriptiondetails[$email]["expiry_date"] = $user->subscription->exp_date;
    //             $usersubscriptiondetails[$email]["Plan_name"] = $user->subscription->plan_name;

    //             $url = "https://api.fastspring.com/orders/{$order_id}";
    //             $response = $this->callFSApi($url, 'GET');

    //             $orderDetail = json_decode($response, true);
    //             if ($orderDetail['orders'][0]['result'] == 'error') {
    //                 return false;
    //             } else {
    //                 if($orderDetail['items'][0]['isSubscription']){
    //                     $usersubscriptiondetails[$email]["subscription_id"] = $orderDetail['items'][0]['subscription'];

    //                     $url = "https://api.fastspring.com/orders/{$order_id}";
    //                     $getsbscriptionresponse = $this->callFSApi("https://api.fastspring.com/subscriptions/".$orderDetail['items'][0]['subscription'], 'GET');
    //                     $getreponse = json_decode($getsbscriptionresponse, true);
    //                     if(isset($getreponse['nextChargeDateDisplayISO8601'])){
    //                         $usersubscriptiondetails[$email]["end_date_by_fastspring"] = $getreponse['endDisplayISO8601'];
    //                         $usersubscriptiondetails[$email]["next_charge_date_by_fastspring"] = $getreponse['nextChargeDateDisplayISO8601'];

    //                         $date = Carbon::create($getreponse['nextChargeDateDisplayISO8601']);
    //                         $newDate = $date->addDays(21);
    //                         // dd($getreponse['nextChargeDateDisplayISO8601'], $newDate->toDateString());
    //                         // $finalResponse = $this->subscriptionclass->SetAnEndDateAndNumberOfRemainingPeriodsForSubscription($orderDetail['items'][0]['subscription'], $newDate->toDateString(), 1);
    //                         // $usersubscriptiondetails[$email]["updated"] = $finalResponse;
    //                         // dd($finalResponse);
    //                         // if($finalResponse['orders'][0]['result'] == 'error'){
    //                         //     $user->subscription->exp_date
    //                         // }
    //                     }
    //                 }
    //             }

    //         }
    //     }
    //     // $this->subscriptionclass->SetAnEndDateAndNumberOfRemainingPeriodsForSubscription($productpath);
    // }

    public function runpodConvinentRedesign(Request $request)
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

        $url = \Config::get('app.GPU_SERVERLESS_CONVINENT_REDESIGN');
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

                $storeData = $this->getDataToSaveForRedesign($response, $payloadData);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    Log::error($dataSaved);

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function floorEditor()
    {
        $headingData = EditHeading::where('module', 'floor_editor')->first();

        return view('web2.user.floor-editor', compact('headingData'));
    }

    public function runpodFloorEditor(Request $request)
    {
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
        // $googleStorageFileMaskUrl = $this->storeImageToGoogleBucket($payloadData['mask'],$uniqueFileName,$isMask = true);
        if (!empty($payloadData['texture_image']) && $payloadData['texture_image'] !== 'undefined') {
            $googleStorageFileTextureUrl = $this->storeImageToGoogleBucket($payloadData['texture_image'], $uniqueFileName, $isMask = false, $texture = false, $colorTexture = true);
        } else {
            $googleStorageFileTextureUrl['url'] = '';
        }

        if ($googleStorageFileImageUrl === false) {
            return response()->json(['error' => 'Fail to upload File on Cloud Storage']);
        }

        $selectedValue = $payloadData['no_of_texture'];
        $splitValues = explode(' X ', $selectedValue);
        $no_of_rows = intval($splitValues[0]);
        $no_of_cols = intval($splitValues[1]);

        $payloads = [
            'input' => [
                'image' => $googleStorageFileImageUrl['url'],
                'image_style' => $googleStorageFileTextureUrl['url'],
                'no_of_rows' => $no_of_rows,
                'no_of_cols' => $no_of_cols,
                'unique_id' => $uniqueFileName,
            ],
        ];

        $urls = \Config::get('app.GPU_SERVERLESS_FLOOR_EDITOR');

        $response = $this->curlRequest->serverLessCurlRequests($urls, $payloads);
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

                $storeData = $this->getDataToSaveForPrecision($response, $payloadData, $prompt);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    Log::error($dataSaved);

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    private function getSubscriptionDetails($additionalData = [])
    {
        $activeDetails = $this->activeSubcriberDesignDetails();
        $details = [
            'activeSubcription' => $activeDetails['activeSubscription'],
            'totalDesign' => $activeDetails['totalDesign'],
        ];

        return array_merge($details, $additionalData);
    }

    public function trustpilotInvitationIndex()
    {
        return view('web.trustpilot-invitation-page');
    }

    public function colorsTextures()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.colors-textures', $details);
    }

    public function furnitureFinder()
    {
        $details = $this->getSubscriptionDetails();

        return view('web.furniture-finder', $details);
    }

    public function getTextToDesign(Request $request){
        try {
            $user = auth()->user();
            $designs_query = PublicGallery::where('user_uid', $user->id)
            ->where('design_type', $request->designType)
            ->where('is_inpainting', $request->modeValue)
            ->select('id', 'original_image', 'generated_image', 'style', 'mode', 'room_type', 'is_favorite', 'is_inpainting', 'hd_image', 'design_type');
            $designs = $designs_query->orderBy('id', 'desc')->paginate(config('app.PUBLIC_DESIGNS_COUNT'));

            $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
            foreach ($designs as $design) {
                if($design->original_image != 'N/A'){
                    $design->original_image = $staticPath . $design->original_image;
                }
                $design->generated_image = $staticPath . $design->generated_image;
            }

            $data = ['designs' => $designs];
            $imageHtml = view('web2.user.show-text-to-design-data', $data)->render();

            return response()->json([
                'success' => true,
                'data' => $imageHtml,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function runpodTextToDesign(Request $request){
        $payloadData = $request->all();
        $request->merge(['id' => Auth::id()]);

        // $selectedValue = $payloadData['image_resolution'];
        // $splitValues = explode(' X ', $selectedValue);
        // $height = intval($splitValues[0]);
        // $width = intval($splitValues[1]);

        $payload = [
            'input' => [
                'prompt' => !empty($payloadData['custom_instruction']) ? $payloadData['custom_instruction'] : '',
                'height' => 1024,
                'width' => 1024,
                // 'no_design' => 1,
            ],
        ];

        if($payloadData['apiMode'] == 'faster'){
            $url = \Config::get('app.GPU_SERVERLESS_TEXT_TO_DESIGN_FASTER');
        }else{
            $url = \Config::get('app.GPU_SERVERLESS_TEXT_TO_DESIGN_SLOWER');
        }
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if ($response && $response['status'] === 'COMPLETED') {
            if (!isset($response['output']) || isset($response['output']['errors'])) {

                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            } else {
                $result = [
                    'Sucess' => [
                        // 'original_image' => $response['output']['input_image'],
                        'generated_image' => $response['output']['output_images'],
                    ],
                ];

                $storeData = $this->getDataToTextToDesign($response, $payloadData);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    Log::error($dataSaved);

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function getDataToTextToDesign($response, $payloadData)
    {
        $storeData = [
            'original_image' => 'N/A',
            'generated_image' => $response['output']['output_images'],
            'style' => 'N/A',
            'room_type' => 'N/A',
            'mode' => $payloadData['modeType'],
            'user_uid' => Auth::id(),
            'is_public' => 0,
            'designtype' => 0,
            'prompt' => !empty($payloadData['custom_instruction']) ? $payloadData['custom_instruction'] : '',
            'hd_image' => 0,
        ];

        return $storeData;
    }

    public function getFavoriteDesigns(Request $request){
        $user = auth()->user();
        $designsQuery = PublicGallery::where('is_favorite', 1)
            ->where('user_uid', $user->id)
            ->select('id', 'original_image', 'generated_image', 'style', 'mode', 'room_type', 'is_public', 'is_favorite', 'is_inpainting', 'hd_image')
            ->orderBy('id', 'desc');

        if ($request->designType == 0 || $request->designType == 99) {
            if ($request->modeType == 'convenient_redesign') {
                $designsQuery->where('is_inpainting', 0)
                    ->where('mode', 'Convenient Redesign');
            } else {
                $designsQuery->where('is_inpainting', $request->designType)
                    ->where('mode', '!=', 'Convenient Redesign');
            }
        } else {
            $designsQuery->where('is_inpainting', $request->designType);
        }

        $designs = $designsQuery->paginate(config('app.PUBLIC_DESIGNS_COUNT'));

        $staticPath = 'https://storage.googleapis.com/generativeartbucket/UserGenerations/cristian/';
        foreach ($designs as $design) {
            $design->original_image = $staticPath . $design->original_image;
            $design->generated_image = $staticPath . $design->generated_image;
        }

        $data = ['designs' => $designs];
        $imageHtml = view('web2.user.show-favourite-data', $data)->render();

        return response()->json([
            'success' => true,
            'data' => $imageHtml,
            'pageType' => $request->pageType,
        ]);
    }

    public function runpodFurnitureCreator(Request $request){
        $payloadData = $request->all();
        $request->merge(['id' => Auth::id()]);

        // $selectedValue = $payloadData['image_resolution'];
        // $splitValues = explode(' X ', $selectedValue);
        // $height = intval($splitValues[0]);
        // $width = intval($splitValues[1]);

        $payload = [
            'input' => [
                'prompt' => !empty($payloadData['custom_instruction']) ? $payloadData['custom_instruction'] : '',
                'height' => 1024,
                'width' => 1024,
                'furniture_creator' => true,
            ],
        ];

        if($payloadData['apiMode'] == 'faster'){
            $url = \Config::get('app.GPU_SERVERLESS_TEXT_TO_DESIGN_FASTER');
        }else{
            $url = \Config::get('app.GPU_SERVERLESS_TEXT_TO_DESIGN_SLOWER');
        }
        $response = $this->curlRequest->serverLessCurlRequests($url, $payload);
        if ($response && $response['status'] === 'COMPLETED') {
            if (!isset($response['output']) || isset($response['output']['errors'])) {

                return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
            } else {
                $result = [
                    'Sucess' => [
                        // 'original_image' => $response['output']['input_image'],
                        'generated_image' => $response['output']['output_images'],
                    ],
                ];

                $storeData = $this->getDataToTextToDesign($response, $payloadData);
                $dataSaved = $this->saveData($storeData);
                if ($dataSaved) {
                    $result['storedIds'] = $dataSaved['storedIds'];

                    return json_encode($result);
                } else {
                    Log::error($dataSaved);

                    return json_encode(['error' => 'Something went wrong. Please try again in some time.']);
                }
            }
        } else {
            return json_encode(['error' => 'Something went wrong. Please try again.']);
        }
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

    public function showFeature($feature)
    {

        // Validate that the feature exists
        $validFeatures = ['redesign', 'precision', 'fill_spaces','colors_and_textures','paint_visualizer']; // List all valid features

        if (!in_array($feature, $validFeatures)) {
            abort(404); // Feature not found
        }

        // Pass the feature to the view
        return view('widget.widget-' . $feature, ['feature' => $feature]);
    }
}
