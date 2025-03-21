<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', 'HomeDesignsAI')</title>

    {{-- New css starts --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('webWidget/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('webWidget/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('webWidget/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('webWidget/css/jquery-ui.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
    <link href="{{ asset('webWidget/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('webWidget/css/style.css') }}?v={{ config('app.widgetstyle_css_version') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://homedesigns-ai.b-cdn.net/webWidget/css/style.css?v={{ config('app.style_css_version') }}"> --}}
    <link href="{{ asset('webWidget/css/responsive.css') }}" rel="stylesheet" type="text/css">
    {{-- new css ends --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('webWidget/css/user-dash.css') }}?v={{ config('app.user_dash_css_version') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('web/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kalam&family=Karla&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('web/images/favicon.ico') }}" type="image/x-icon" />
    {{-- <script type="text/javascript">
        (function(w,d,u){
            w.$productFruits = w.$productFruits || [];
            w.productFruits=w.productFruits||{ };w.productFruits.scrV='2';
            let a=d.getElementsByTagName('head')[0];let r=d.createElement('script');r.async=1;r.src=u;a.appendChild(r);
        })(window,document,'https://app.productfruits.com/static/script.js');
    </script> --}}

    <!-- Meta for the page start -->
    @include('web.meta_head')

    {{-- <!-- begin Convert Experiences code-->
    <script type="text/javascript" src="//cdn-4.convertexperiments.com/js/10042884-10043877.js"></script>
    <!-- end Convert Experiences code --> --}}

    <!-- Meta for the page end -->

    @yield('styles')
    <script type="text/javascript">
        (function(a, b, c, d, e, f, g) {
            e['ire_o'] = c;
            e[c] = e[c] || function() {
                (e[c].a = e[c].a || []).push(arguments)
            };
            f = d.createElement(b);
            g = d.getElementsByTagName(b)[0];
            f.async = 1;
            f.src = a;
            g.parentNode.insertBefore(f, g);
        })
        ('https://utt.impactcdn.com/A4039998-ea36-4626-8493-8e37f5c94eb61.js', 'script', 'ire', document, window);
    </script>

    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->
    <?php
    $active_plan = '';
    if (auth()->check()) {
        $active_plan = auth()->user()->activePlan();
    }
    ?>
{{-- new js --}}
    {{-- <script src="{{ asset('webWidget/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('webWidget/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('webWidget/js/jquery-ui.js') }}"></script> --}}
    {{-- <script src="{{ asset('webWidget/js/slick.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('webWidget/js/after-before.js') }}"></script> --}}
    <script src="{{ asset('webWidget/js/custom.js') }}" id="custom-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    {{-- new js ends --}}

    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"
        integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.js"
        integrity="sha512-3FKAKNDHbfUwAgW45wNAvfgJDDdNoTi5PZWU7ak3Xm0X8u0LbDBWZEyPklRebTZ8r+p0M2KIJWDYZQjDPyYQEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script src=" {{ asset('web/js/jquery.mCustomScrollbar.js') }} "></script>
    <script>
        const SITE_BASE_URL = "{{ config('app.url') }}";
        const user = JSON.parse('@json(auth()->user())');
        const activeplan = '{{ $active_plan }}';
        const APP_LOCAL = "{{ config('app.env') }}";
        const GPU_SERVER_HOST = "{{ config('app.GPU_SERVER_HOST') }}";
        const API_GPU_SERVER_HOST = "{{ config('app.API_GPU_SERVER_HOST') }}";
        const API_BRONZE_CREDIT = "{{ config('app.API_BRONZE_CREDIT') }}";
        const API_SILVER_CREDIT = "{{ config('app.API_SILVER_CREDIT') }}";
        const API_GOLD_CREDIT = "{{ config('app.API_GOLD_CREDIT') }}";
        const API_SME_CREDIT = "{{ config('app.API_SME_CREDIT') }}";
        const GPU_SERVER_HOST_INIT = "{{ config('app.GPU_SERVER_HOST_INIT') }}";
        const GPU_SERVER_HOST_SEG = "{{ config('app.GPU_SERVER_HOST_SEG') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('webWidget/js/cropper.min.js') }}"></script>
    <script  src="{{ asset('webWidget/js/newScript.js') }}"></script>
    <script src="{{ asset('web/js/script.js') }}?v={{ config('app.script_js_version') }}"></script>
    <script  src="{{ asset('webWidget/js/custom-script.js') }}?v={{ config('app.custom_scriptWidget_version') }}" id="custom-script-js" ></script>
    <script src="{{ asset('webWidget/js/konva.min.js') }}"></script>
    <script src="{{ asset('webWidget/js/jquery-cropper.js') }}"></script>
    <script src="{{ asset('webWidget/js/ntc.js') }}"></script>
    <script  src="{{ asset('webWidget/js/in-painting-v2.js') }}?v={{ config('app.in_paintWidget_v2_version') }}" id="in-painting-js"></script>
    <script src="{{ asset('web/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <style>
        .custom-select-wrapper .input-wrapper {
            padding: 0 0px;
            display: flex;
            align-items: start;
            flex-wrap: wrap;
            width: 100%;
        }

        .custom-select-wrapper .input-wrapper p {
            border: 0;
            padding: 10px 30px 10px 15px;
            cursor: pointer;
            outline: none;
            font-family: 'Eudoxus Sans';
            font-style: normal;
            margin-bottom: 0;
            line-height: 25px;
            width: calc(100% - 0px);

            color: rgba(255, 255, 255, 0.45);

            border-radius: 12px;
            font-size: 14px;
        }

        .custom-select-wrapper ul {
            list-style: none;
            border-radius: 8px;
            padding: 0;
            text-align: center;
            overflow: hidden;
            margin: 10px 0 !important;
            transition: 0.1s ease-out;
            position: relative;
            width: 100%;
            left: 0;
            right: 0;
            display: none;
        }

        .custom-select-wrapper ul li {
            line-height: 28px;
            padding-bottom: 3px;
            font-size: 14px;
            color: #fff;
            text-align: left;
            padding-left: 25px;
        }

        .custom-select-wrapper ul li:last-child {
            padding-bottom: 0;
        }


        .custom-select-wrapper {
            position: relative;
            margin: 15px 0 0 0;
            cursor: pointer;
        }

        .custom-select-wrapper.open-dropdown i {
            transform: rotate(0deg);
            transition: 0.9s;
            line-height: normal;
        }


        .custom-select-wrapper i {
            transition: 0.9s;
            margin: 0 0px 0 10px;
            line-height: normal;
            background-color: transparent;
            padding: 0;
            right: 15px;
            position: absolute;
            top: 15px;
            transform: rotate(-90deg);
            color: rgba(255, 255, 255, 0.45);
        }

        .custom-select-wrapper .input-wrapper p img {
            width: 25px;
            margin-right: 10px;
        }

        /* Add your CSS for the notification banner here */
        .notification-banner {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #9f48f2;
            color: #2e2424;
            text-align: center;
            z-index: 1000;
        }

        #moving-text {
            display: inline-block;
            animation: moveText 28s linear infinite;
        }
        #widgetCustomContainerDiv .upload-loader {
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center;
            height: 300px;
            width: 300px;
        }

        #widgetCustomContainerDiv .upload-small {
            width: 80px;
            height: 80px;
            border-color: #22adff;
            animation-delay: 0s;
        }
        #widgetCustomContainerDiv .upload-circle {
            border-radius: 50%;
            animation: pulse 1s infinite ease-in-out;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            border: 1px solid #000000;
        }

        #widgetCustomContainerDiv .upload-medium {
            width: 100px;
            height: 100px;
            border-color: #22adff;
            animation-delay: 0.2s;
        }

        #widgetCustomContainerDiv .upload-large {
            width: 120px;
            height: 120px;
            border-color: #d92cff;
            animation-delay: 0.4s;
        }
        #widgetCustomContainerDiv .upload-x-large {
            width: 120px;
            height: 120px;
            border-color: #ccecff;
            animation-delay: 0.6s;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.5);
            }
        }

        @keyframes moveText {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
        /* .ai-tool-right-top {
            justify-content: center !important;
        } */

        .square-loader {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 65%;
            right: 0;
            transform: translate(-60%, -60%);
            top: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        .square-loader span {
            display: inline-block;
            position: relative;
            border: 1px solid black;
            animation: spin 3s infinite linear;
            margin: 0 auto 0;
            animation: moveInSquare 3s linear infinite;
            margin: 0 auto 0;
            width: 80px;
            height: 80px;
        }

        @media only screen and (max-width: 600px) {
        .square-loader span {

            width: 40px;
            height: 40px;
        }
        }

        @keyframes moveInSquare {
            0% {
                top: 0;
                left: 0;
            }

            25% {
                top: 0;
                left: 80px;
            }

            50% {
                top: 80px;
                left: 80px;
            }

            75% {
                top: 80px;
                left: 0;
            }

            100% {
                top: 0;
                left: 0;
            }
        }
    </style>
</head>
@php
    $precisionUser = false;
    $colorTextureUsers = false;
    $apiUser = false;
    $customer = auth()->user();
    $api_user = $customer ? $customer->is_api_user : 0 ;
    $userActivePlan = $customer ? $customer->activePlan() : '' ;
    $curr_bank = 0;
    $userFreeTrialPlan = $customer ? $customer->freeTrialPlan() : '' ;
    $premiumPlan = $customer ? $customer->is_premium_plan : 0 ;
    $planDetails = $customer ? $customer->activePlanDetails() : '' ;
    $formattedExpDate = '';
    $customerName = '';
    // Check if $planDetails is not null and has exp_date property
    if ($planDetails && $planDetails != 'free') {
        $expDate = new DateTime($planDetails->exp_date);
        $formattedExpDate = $expDate->format('F d, Y');
    }
    if ($customer) {
        $customerId = $customer->id;
        $customerName = $customer->name;
        $customerEmail = sha1($customer->email);
        $createdAtDate = new DateTime(auth()->user()->created_at);
        $comparisonDate = new DateTime('2023-08-04');
        if ($createdAtDate > $comparisonDate) {
            if (
                $userActivePlan == 'homedesignsai-pro' ||
                $userActivePlan == 'homedesignsai-pro-2' ||
                $userActivePlan == 'pro-yearly'
            ) {
                $colorTextureUsers = true;
            } else {
                $colorTextureUsers = false;
            }
            if ($premiumPlan == 1 || $userActivePlan == 'premium-precision-upgrade-plus-ds') {
                $precisionUser = false;
            } else {
                $precisionUser = true;
            }
        } else {
            $colorTextureUsers = true;
            $precisionUser = false;
        }
        $curr_bank = $customer->curr_bank;
        if ($customer->is_api_user == 1) {
            $apiUser = false;
        } else {
            $apiUser = true;
        }
    } else {
        $customerId = '';
        $customerEmail = '';
        $curr_bank = 0;
    }
    $redirectUrl = '/';
    if (
        $userActivePlan == 'free' ||
        $userActivePlan == 'homedesignsai-individual' ||
        $userActivePlan == 'homedesignsai-individual-2' ||
        $userActivePlan == 'homedesignsai-pro' ||
        $userActivePlan == 'homedesignsai-pro-2' ||
        $userActivePlan == 'homedesignsai-teams' ||
        $userActivePlan == 'individual-yearly' ||
        $userActivePlan == 'pro-yearly' ||
        $userActivePlan == 'teams-yearly'
    ) {
        $redirectUrl = '/';
    }
    if (
        $userActivePlan == 'homedesignsai-pro-7-days-trial' ||
        $userActivePlan == 'homedesignsai-teams-seven-days-trial'
    ) {
        $redirectUrl = '/free-trial';
    }
    if (
        $userActivePlan == 'individual-lifetime' ||
        $userActivePlan == 'pro-lifetime' ||
        $userActivePlan == 'teams-lifetime'
    ) {
        $redirectUrl = '/exclusive-lifetime-deal';
    }
    if (
        $userActivePlan == 'premium-precision-upgrade' ||
        $userActivePlan == 'premium-precision-upgrade-plus' ||
        $userActivePlan == 'premium-precision-upgrade-plus-ds'
    ) {
        $redirectUrl = '/premium-upgrade-software';
    }

    $currentPlan = '';
    if (
        $userActivePlan == 'homedesignsai-pro-7-days-trial-facebook' ||
        $userActivePlan == 'homedesignsai-pro-7-days-trial-yearly-facebook' ||
        $userActivePlan == 'homedesignsai-pro-7-days-trial' ||
        $userActivePlan == 'homedesignsai-pro-7-days-trial-yearly-new'
    ) {
        $currentPlan = 'Pro Trial';
    } elseif (
        $userActivePlan == 'homedesignsai-individual' ||
        $userActivePlan == 'homedesignsai-individual-2'
    ) {
        $currentPlan = 'Individual';
    } elseif ($userActivePlan == 'homedesignsai-pro' || $userActivePlan == 'homedesignsai-pro-2') {
        $currentPlan = 'Pro';
    } elseif ($userActivePlan == 'homedesignsai-teams') {
        $currentPlan = 'Teams';
    } elseif (
        $userActivePlan == 'pro-yearly' ||
        $userActivePlan == 'pro-yearly-modal' ||
        $userActivePlan == 'homedesignsai-pro-yearly-toggle'
    ) {
        $currentPlan = 'Pro';
    } else {
        $currentPlan = $userActivePlan;
    }

    $routes = [
        'user.redesign',
        'user.in-painting',
        'user.fill-spaces',
        'user.decor-staging',
        'user.ai-object-removal',
        'user.color-texture',
        'furniture.finding',
        'skyColor.Index',
        'expertChat.index',
        'styleTransfer.Index',
        'colorSwap.Index',
        'collage_render.Index',
        'user.roast-my-home',
        'designTransfer.Index',
        'user.convenient-redesign',
        'floorEditor.Index',
        'user.smart-home-ai',
    ];

    $currentRoute = request()->route()->getName();
    $subscription_plans = [
        //'api-bronze' => 'API Bronze Tier',
        'homedesignsai-individual' => 'HomeDesigns.ai INDIVIDUAL ($27, billed monthly)',
        'homedesignsai-pro' => 'HomeDesigns.ai PRO ($29, billed monthly)',
        'pro-yearly' => 'HomeDesigns.ai PRO ($197, billed yearly)',
        //'homedesignsai-pro-7-days-trial' => 'HomedesignsAI PRO - 7 Days Free Trial',
        //'homedesignsai-teams' => 'HomeDesignsAI Teams',
        //'homedesignsai-teams-seven-days-trial' => 'HomeDesignsAI Teams - 7 Days Free Trial',
    ];

    $fullName = $customer ? ucwords(strtolower($customer->name)) : '' ; // Ensure first letter of each word is capitalized
    $formattedName = '';
    $names = explode(' ', $fullName);
    if (count($names) > 1) {
        $formattedName = $names[0] . ' ' . substr($names[1], 0, 1) . '.';
    } else {
        $formattedName = $names[0];
    }
@endphp

<body>
    <div class="ips-limit-crossed" id="limitCrossedMessage">
        <strong>You do not have</strong> enough credits! Wait 24 hours for 3 new credits or <strong> <a class="up-btn"
                href="{{ url($redirectUrl) . '#buy' }}">UPGRADE NOW</a> - Our Early Bird discount will expire soon.
            You'll never
            see these low prices again!</strong>
    </div>
    <section>
        <input id="precisionUserdetails" type="hidden" value="{{ $precisionUser ? 'true' : 'false' }}" />
        <input type="hidden" id="precisionUser" value="{{ $precisionUser ? 'true' : 'false' }}">
        <div class="gs-dashboard-wrpper">
            <div class="gs-dashboard-mobile-header">
                <div class="gs-dashboard-left-logo">
                    {{-- <a>
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/home-logo.svg" />
                        <img class="light-mode"
                            src=" https://homedesigns-ai.b-cdn.net/web2/images/light-mode/NewHomeDesignsAILogo 1.png" />
                    </a> --}}
                    {{-- <img class="menu-icon" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-menu-icon.png" /> --}}
                </div>
            </div>
            <div class="gs-dashboard-rigtbar">
                @yield('content')
            </div>
        </div>

        <div id="suggestionPrecisionModal" class="modal suggestion-precion-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-4 suggest-md-content">
                    <span class="precision-md-mess mb-3">{{ trans('suggestionPrecisionModal.title')}}<a >{{ trans('suggestionPrecisionModal.title_bold')}}</a> {{ trans('suggestionPrecisionModal.suggestionPrecisionModal')}} <a
                            >{{ trans('suggestionPrecisionModal.link')}}</a></span>
                    <a >
                        <video loop="" muted="" autoplay="" playsinline="" width="100%">
                            <source src="https://homedesigns.ai/web/images/fill-spaces-furniture.mp4"
                                type="video/mp4">
                        </video>
                    </a>

                    <div class="mdp-cl-btn mdl-close-btn">
                        <span class="precision_suggestion_closebt" data-bs-dismiss="modal"
                            id="closeSuggestionPrecisionModal">
                            <i class="fa fa-times fa-unset" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id="customAiModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-4 suggest-md-content">
                    <span class="precision-md-mess"> If you want a partial redesign and
                        your instructions to be more precise, you can try our new <a
                            >Precision+</a> mode by clicking <a
                            >here.</a></span>
                    <div class="mdp-cl-btn mdl-close-btn">
                        <span class="precision_suggestion_closebt" data-bs-dismiss="modal">
                            <i class="fa fa-times fa-unset" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id="multipleGenaerationModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-4 suggest-md-content">
                    <span class="precision-md-mess mb-3">Are you looking for more precise designs? Check our <a
                            >Precision+</a> where you can redesign exactly what
                        you want, not just a full redesign.</span>
                    <a >
                        <video loop="" muted="" autoplay="" playsinline="" width="100%">
                            <source src="https://homedesigns.ai/web/images/precision-upgrade.mp4" type="video/mp4">
                        </video>
                    </a>
                    <div class="mdp-cl-btn mdl-close-btn">
                        <span class="precision_suggestion_closebt" data-bs-dismiss="modal">
                            <i class="fa fa-times fa-unset" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade gs-modal-background" id="modalUpgradePlan" role="dialog">
            <div class="modal-dialog gs-modal-container">
                <div class="modal-content gs-modal-content">
                    <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                            src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                    <div class="gs-premium-tools-outer">
                        <h3>Available for Premium Members only.</h3>
                        <p>If you want to use the premium features you must first upgrade your license.</p>
                        <div class="gs-premium-tools">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon1.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon2.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon3.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon4.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon5.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon6.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon7.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon8.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon9.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon10.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon11.svg">
                            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-member-icon12.svg">
                        </div>
                        <a class="gs-blue-btn">Limited Lifetime Deal - Upgrade Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade gs-modal-background" id="confirm_feedback_modal" role="dialog">
            <div class="modal-dialog gs-modal-container">
                <div class="modal-content gs-modal-content">
                    <button type="button" class="gs-modal-close" data-dismiss="modal">
                        <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                    </button>
                    <div class="confirm-content">
                        <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/success_icon.png">
                        <h2 class="modal-title" id="modalTitle">Received!</h2>
                        <p>Thank you for your feedback. Our focus is on significantly improving results soon!</p>
                        <div class="gs-login-brn-outer confirm-modal-button">
                            <button class="gs-login-btn generate_again_feedback_image" type="button">Generate
                                Again</button>
                            <button class="gs-login-btn close_feedback_modal" type="button">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalStyleUpgradePlan" class="modal fade gs-modal-background" tabindex="-1" role="dialog">
            <div class="modal-dialog gs-modal-container" role="document">
                <div class="modal-content hdc-modal gs-modal-content">
                    <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                            src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                    <div class="head">
                        <h5 class="modal-title">Not available in your account.</h5>
                    </div>

                    <div class="body">
                        <p class="style_body_header"><strong>This style is part of the <span class="add-ons-heading"
                                    data-toggle="tooltip"
                                    title="Pop Art, Vintage Glam, Candy Land, Barbie, Doodle, Sketch, Maximalist, Professional, Airbnb, Halloween, Retro, Romantic, Glam Rock, Safari, Tuscan, Nautical, Craftsman, Farmhouse Chic, Prairie, and Cubism.">Extra
                                    Styles Add-on</span>.</strong> Upgrade your account to use this style.</p>
                    </div>
                    <div class="modal_footer_content">
                        <button class="card-submit modal_footer_button"
                            data-fsc-item-path='homedesignsai-extra-styles'
                            data-fsc-item-path-value='homedesignsai-extra-styles' data-fsc-action="Add, Checkout"
                            onclick="hideCred()">Upgrade Your Account</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalRoomTypeUpgradePlan" class="modal fade gs-modal-background" tabindex="-1" role="dialog">
            <div class="modal-dialog gs-modal-container" role="document">
                <div class="modal-content hdc-modal gs-modal-content">
                    <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                            src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                    <div class="head">
                        <h5 class="modal-title">Not available in your account.</h5>
                    </div>

                    <div class="body">
                        <p class="room_body_header"><strong>This room type is part of the <span
                                    class="add-ons-heading" data-toggle="tooltip"
                                    title="Wedding Room, Porch, Playground, Laundry Room, Outdoor Kitchen, Utility Room, Pet Room, Home Gym, Lounge, Walk-in Closet, Playroom, Reading Nook, Sauna, Man Cave, Foyer, Greenhouse, She Shed, Conservatory, Nursery, and Prayer Room">Extra
                                    Room Types Add-on</span>.</strong> Upgrade your account to use this room type.</p>
                    </div>
                    <div class="modal_footer_content">
                        <button class="card-submit modal_footer_button"
                            data-fsc-item-path='homedesignsai-extra-room-types'
                            data-fsc-item-path-value='homedesignsai-extra-room-types' data-fsc-action="Add, Checkout"
                            onclick="hideCred()">Upgrade Your Account</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="apiUpgradeModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content hdc-modal">

                    <div class="head">
                        <h5 class="modal-title">Not available on your plan!</h5>
                    </div>

                    <div class="body">
                        <p>Buy API Plan to use this feature.</p>
                    </div>
                    @if ($curr_bank == 2)
                        <div class="modal_footer_content">
                            <a><button class="modal_footer_button">Upgrade to
                                    Premium CB</button></a>
                        </div>
                    @else
                        <div class="modal_footer_content">
                            <a><button class="modal_footer_button">Upgrade to
                                    API</button></a>
                        </div>
                </div>
            </div>
        </div>
        <div id="multipleDecorClick" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-4 suggest-md-content"
                    style="display: flex;justify-content: center;align-items: center;">
                    <div class="head">
                        <h5 class="modal-title">HOW TO USE DECOR STAGING</h5>
                    </div>
                    <p class="modal_content">You can use Decor Staging in two different ways: </br>
                        1. Upload your piece of furniture (or decorative object) with a transparent background and we
                        will stage the room (or exterior space) around it. </br>
                        Note: If you upload the object with transparent background, there's no need to use the brush
                        tool. </br>
                        2. Upload an image that contains the piece of furniture (or decorative object) and use our brush
                        tool to fill the remaining image -only leave the object visible) </br>
                        Note: For the best results, don't select any space containing shadows of the object that you
                        want to stage.</p>
                    <div class="decor_gif">
                        <img src="{{ asset('web/gif/decor_staging_gif.gif') }}" alt="Your GIF" width="100%">
                        {{-- <button type="button" class="ci-btn uploadbtngif" data-bs-dismiss="modal" id="inUploadBtnOnModal">Upload Image</button> --}}
                    </div>
                    <div class="mdp-cl-btn mdl-close-btn">
                        <span class="precision_suggestion_closebt" data-bs-dismiss="modal">
                            <i class="fa fa-times fa-unset" aria-hidden="true"></i>
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="udFreeLimitCrossModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="udm-upgrade-plan text-center">
                            <h4 class="mb-5">
                                You do not have enough credits!
                            </h4>
                            <h5 class="mb-5">
                                Wait 24 hours for 3 new credits or UPGRADE NOW. Our Early Bird discount will expire
                                soon.
                            </h5>

                            <a class="gt-stbtn">
                                Upgrade
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalDailyFairUsage" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content hdc-modal">

                    <div class="head">
                        <h5 class="modal-title">Fair usage policy limit reached!</h5>
                    </div>

                    <div class="body">
                        <p>
                            You've hit the fair usage policy limit for your subscription! New generations are disabled
                            for 24 hours. To continue using our service without restriction, please contact our support
                            team for additional verifications: help@homedesigns.ai
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Add image to Project pop up model --}}
    <div id="addToprojectmodal" class="modal fade gs-modal-background" tabindex="-1" role="dialog"
    data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog gs-modal-container" role="document">
            <div class="modal-content gs-modal-content hdc-modal choose_project_modal">
                <button type="button" class="gs-modal-close add_to_project_cancel_btn" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <div class="head">
                    <p class="modal-title">Choose Project Folder to Organize your Designs</p>
                </div>
                <div class="body">
                    <form id="addProjectForm">
                        @csrf
                        <div class="form-group">
                            <a id="openCreateProjectModal"
                                class="redirect_to_project_btn" style="float: right" title="Create new project">+</a>
                            <label for="selectProject">Select Project</label>
                            <select class="nwfiles-optns" id="selectProject" name="selectedProject">
                                <option value="" disabled selected>-- Select Project --</option>
                            </select>
                        </div>
                        <div class="form-group" id="subprojectGroup" style="display: none;">
                            <label for="selectSubProject">Select Subproject</label>
                            <select class="nwfiles-optns" id="selectSubProject" name="selectedSubProject">
                                <option value="" disabled selected>-- Select Sub Project --</option>
                            </select>
                        </div>
                        <div class="modal_button_right_pos">
                            <button type="button"
                                class="btn btn-secondary add_to_project_cancel_btn mt-2">Cancel</button>
                            <button type="button" class="btn btn-primary btn-add mt-2"
                                onclick="addToProject()">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade gs-modal-background" id="uploading_instruction" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <div class="gs-modal-best-results">
                    <div class="gs-modal-best-left">
                        <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/for-best-results1.svg">
                    </div>
                    <div class="gs-modal-best-right">
                        <h4>{{ trans('uploading_instruction.heading') }}</h4>
                        <p>{{ trans('uploading_instruction.content') }}</p>
                    </div>
                </div>
                <div class="gs-modal-best-results">
                    <div class="gs-modal-best-left">
                        <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/for-best-results2.svg">
                    </div>
                    <div class="gs-modal-best-right">
                        <h4>{{ trans('uploading_instruction.heading2') }}</h4>
                        <ul>
                            <li><img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-avoid-img1.png"><span>{{ trans('uploading_instruction.avoid_blurry_image') }}</span></li>
                            <li><img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-avoid-img2.png"><span>{{ trans('uploading_instruction.avoid_dark_image') }}</span>
                            </li>
                            <li><img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-avoid-img3.png"><span>{{ trans('uploading_instruction.avoid_screenshots') }}</span>
                            </li>
                            <li><img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-avoid-img4.png"><span>{{ trans('uploading_instruction.avoid_fisheye_effect') }}</span></li>
                            <li><img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-avoid-img5.png"><span>{{ trans('uploading_instruction.avoid_ultra_wide') }}</span>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="gs-modal-best-btns">
                    <a href="javascript:void(0)" class="gs-modal-best-inderstand">{{ trans('uploading_instruction.button') }}</a>
                    <a href="javascript:void(0)" class="gs-modal-dont-show-modal">{{ trans('uploading_instruction.button2') }}</a>
                    {{-- <a href="#" class="gs-modal-best-inderstand"  data-dismiss="modal" data-toggle="modal" data-target="#loading_brilliance">I Understand</a> --}}
                    {{-- <a href="#"  data-dismiss="modal" data-toggle="modal" data-target="#loading_brilliance">Don’t show this again</a> --}}
                    {{-- <div class="redirection-link" style="display: none;">redesign-customise-generate.html</div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="loading_brilliance" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                {{-- <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg"></button> --}}
                <div class="gs-modal-uploading_instruction">
                    {{-- <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                    <dotlottie-player src="https://lottie.host/f153e458-6b70-4270-84a7-bb5665de0dbf/GLxYOI5N17.json"
                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                        autoplay></dotlottie-player> --}}
                    <div class="upload-loader">
                        <div class="upload-circle upload-small"></div>
                        <div class="upload-circle upload-medium"></div>
                        <div class="upload-circle upload-large"></div>
                        <div class="upload-circle upload-x-large"></div>
                    </div>
                    <h3>{{ trans('loading_brilliance.heading') }}....</h3>
                    <p>{{ trans('loading_brilliance.content') }}</p>
                    {{-- <div class="gs-modal-uploading_instruction_slider">
                        <div class="gs-modal-uploading_instruction_slide"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @include('widget.designs_options.interior_room_type')

    @include('widget.designs_options.interior_design_style')

    @include('widget.designs_options.exterior_style')

    @include('widget.designs_options.garden_types')

    @include('widget.designs_options.garden_styles')

    <div class="modal fade gs-modal-background" id="logoutModal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <h3 class="logout_heading">Are you sure you want to logout?</h3>
                <div class="gs-project-add-new-form">
                    <form method="POST">
                        @csrf
                        <div class="gs-login-brn-outer">
                            <button class="gs-login-btn" type="submit">Yes</button>
                            <button class="gs-login-btn" data-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade gs-modal-background" id="errorModal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg">
                </button>
                <div class="error-wrapper">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/close_icon.png" alt="">
                    <h4></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade gs-modal-background" id="pdfModal" tabindex="-1" role="dialog"
        aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg gs-modal-container" role="document">
            <div class="modal-content gs-modal-content">
                <div class="modal-header">
                    <button class="pdf-icon fullscreen-icon" id="toggleFullscreen">Toggle Fullscreen</button>
                    {{-- <button type="button" class="pdf-icon btn" id="customCloseButton">Close</button> --}}
                    <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                            src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                </div>
                <div class="pdf_body">
                    <div id="pdfContainer" class="pdf-container">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade gs-image-editing-background" id="gs_ai_tools" role="dialog">
        <button type="button" class="gs-modal-close" data-dismiss="modal">
            <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
        </button>
        <div class="modal-dialog  gs-image-editing-container">
            <div class="modal-content gs-image-editing-content">
                <div class="edit-image-tools-wrapper-inner">
                    <div class="gs-image-editing-tool-shape">Need to Edit image with other tool?
                    </div>
                    <div class="gs-image-editing-tools-row">
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="0">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon1.svg">
                            </div>
                            <span>Redesign</span>
                            <div class="gs-image-editing-tooltip">
                                Click to instantly transform your space with fresh layouts and innovative styles.
                            </div>
                        </div>
                        {{-- @if ($precisionUser == false || $api_user)
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="99">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon1.svg">
                                </div>
                                <span>Intuitive Redesign</span>
                                <div class="gs-image-editing-tooltip">
                                    Type your instructions to quickly redesign any space with ease.
                                </div>
                            </div>
                        @else
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="99">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon1.svg">
                                </div>
                                <span>Intuitive Redesign<img
                                    src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="gs-image-editing-tooltip">
                                    Type your instructions to quickly redesign any space with ease.
                                </div>
                            </div>
                        @endif --}}
                        @if ($precisionUser == false || $api_user)
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="1">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon1.svg">
                                </div>
                                <span>Precision +</span>
                                <div class="gs-image-editing-tooltip">
                                    Make targeted changes to specific areas while keeping the rest intact.
                                </div>
                            </div>
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="2">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon2.svg">
                                </div>
                                <span>Fill Spaces </span>
                                <div class="gs-image-editing-tooltip">
                                    Furnish and decorate empty rooms with AI tailored to your chosen style.
                                </div>
                            </div>
                        @else
                            <div class="gs-image-editing-tool ips-bf-parent">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon1.svg">
                                </div>
                                <span>Intuitive Redesign<img
                                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Type your instructions to quickly redesign any space with ease.
                                </div>
                            </div>
                            <div class="gs-image-editing-tool ips-bf-parent">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon1.svg">
                                </div>
                                <span>Precision + <img
                                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Make targeted changes to specific areas while keeping the rest intact.
                                </div>
                            </div>
                            <div class="gs-image-editing-tool ips-bf-parent">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon2.svg">
                                </div>
                                <span>Fill Spaces <img
                                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Furnish and decorate empty rooms with AI tailored to your chosen style.
                                </div>
                            </div>
                        @endif
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="3">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon3.svg">
                            </div>
                            <span>Decor Staging</span>
                            <div class="gs-image-editing-tooltip">
                                Virtually stage furniture and decor in realistic settings.
                            </div>
                        </div>
                        @if ($colorTextureUsers || $precisionUser == false || $api_user)
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="5">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon4.svg">
                                </div>
                                <span>Colors and Textures</span>
                                <div class="gs-image-editing-tooltip">
                                    Customize colors and textures on design elements using presets or your own.
                                </div>
                            </div>
                        @else
                            <div class="gs-image-editing-tool ips-bf-parent">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon4.svg">
                                </div>
                                <span>Colors and Textures <img
                                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Customize colors and textures on design elements using presets or your own.
                                </div>
                            </div>
                        @endif
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="4">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-edit-ai-tool-icon5.svg">
                            </div>
                            <span>Furniture Removal</span>
                            <div class="gs-image-editing-tooltip">
                                Easily declutter and empty rooms with AI-powered furniture removal.
                            </div>
                        </div>
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="12">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon7.svg">
                            </div>
                            <span>Furniture Finder</span>
                            <div class="gs-image-editing-tooltip">
                                Find and buy the furniture from this image.
                            </div>
                        </div>
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="6">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon8.svg">
                            </div>
                            <span>Sky Colors</span>
                            <div class="gs-image-editing-tooltip">
                                Adjust the sky's color and weather to set the perfect scene.
                            </div>
                        </div>
                        @if ($precisionUser == false || $api_user)
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="7">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon11.png">
                                </div>
                                <span>Material Swap</span>
                                <div class="gs-image-editing-tooltip">
                                    Replace materials on surfaces to explore different textures and finishes.
                                </div>
                            </div>
                        @else
                            <div class="gs-image-editing-tool ips-bf-parent" data-img="" data-url="7">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon11.png">
                                </div>
                                <span>Material Swap
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg">
                                </span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Replace materials on surfaces to explore different textures and finishes.
                                </div>
                            </div>
                        @endif
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="8">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-ai-tools-icon9.png">
                            </div>
                            <span>Paint Visualizer</span>
                            <div class="gs-image-editing-tooltip">
                                Change wall colors with presets or custom colors for interiors and exteriors.
                            </div>
                        </div>
                        @if ($precisionUser == false || $api_user)
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="9">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/room-composer-icon.png">
                                </div>
                                <span>Room Composer</span>
                                <div class="gs-image-editing-tooltip">
                                    Upload your room and elements to create a stylish, cohesive space.
                                </div>
                            </div>
                        @else
                            <div class="gs-image-editing-tool ips-bf-parent" data-img="" data-url="9">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/room-composer-icon.png">
                                </div>
                                <span>Room Composer
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Upload your room and elements to create a stylish, cohesive space.
                                </div>
                            </div>
                        @endif
                        <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="10">
                            <div class="gs-image-editing-tool-icon">
                                <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/design_transfer_icon.png">
                            </div>
                            <span>Design Transfer</span>
                            <div class="gs-image-editing-tooltip">
                                Apply design elements from one space to another for a unified look.
                            </div>
                        </div>
                        @if ($precisionUser == false || $api_user)
                            <div class="gs-image-editing-tool edit_with_precision" data-img="" data-url="11">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/floor_editor_icon.png">
                                </div>
                                <span>Floor Editor</span>
                                <div class="gs-image-editing-tooltip">
                                    Redesign and customize floor layouts with various materials and patterns.
                                </div>
                            </div>
                        @else
                            <div class="gs-image-editing-tool ips-bf-parent">
                                <div class="gs-image-editing-tool-icon">
                                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/floor_editor_icon.png">
                                </div>
                                <span>Floor Editor<img
                                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-prompt-lock-icon.svg"></span>
                                <div class="ips-bf-child paid_feature_modal"></div>
                                <div class="gs-image-editing-tooltip">
                                    Redesign and customize floor layouts with various materials and patterns.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="gs-image-editing-slide-outer">
                    <div class="gs-image-editing-slide">

                        <div class="gs-image-editing-slide-row">
                            <div class="ba-slide-outer">
                                <div class="ba-Slider" unselectable='on' onselectstart='return false;'
                                    onmousedown='return false;'>
                                    <div id="before" class="gs-image-editing-before">
                                        <img src="" />
                                    </div>
                                    <div class="slider"></div>
                                    <div id="after" class="gs-image-editing-after">
                                        <img src="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        {{-- <button class="edit_generated_image" data-output-img="/webWidget/images/exterior-house-angle2.png" data-input-img="/webWidget/images/before1.png" data-index="0">Edit Image 1</button>
                    <button class="edit_generated_image" data-output-img="/webWidget/images/exterior-mode3.png" data-input-img="/webWidget/images/exterior-style2.png" data-index="1">Edit Image 2</button> --}}
                        <!-- Add more buttons as needed -->
                        <button class="prev-btn"><span><img
                                    src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-slide-arrow.svg"></span>Prev</button>
                        <button class="next-btn"><span><img
                                    src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-slide-arrow.svg"></span>Next</button>
                    </div>
                </div>
                {{-- <div class="gs-image-editing-project-add">
                    <a href="#" class="gs-blue-btn">Add to Project</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_01" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <h3>Manage Plan</h3>
                <ul>
                    <li><span>Plan</span>
                        <strong>
                            @if (
                                $userActivePlan == 'homedesignsai-pro-7-days-trial-facebook' ||
                                    $userActivePlan == 'homedesignsai-pro-7-days-trial-yearly-facebook' ||
                                    $userActivePlan == 'homedesignsai-pro-7-days-trial' ||
                                    $userActivePlan == 'homedesignsai-pro-7-days-trial-yearly-new')
                                Pro Trial
                            @elseif($userActivePlan == 'homedesignsai-individual' || $userActivePlan == 'homedesignsai-individual-2')
                                Individual
                            @elseif($userActivePlan == 'homedesignsai-pro' || $userActivePlan == 'homedesignsai-pro-2')
                                Pro
                            @elseif($userActivePlan == 'homedesignsai-teams')
                                Teams
                            @elseif(
                                $userActivePlan == 'pro-yearly' ||
                                    $userActivePlan == 'pro-yearly-modal' ||
                                    $userActivePlan == 'homedesignsai-pro-yearly-toggle')
                                Pro
                            @else
                                {{ $userActivePlan }}
                            @endif
                        </strong>
                    </li>
                    {{-- <li><span>Quantity</span> <strong> 1 User</strong></li> --}}
                    <li><span>Billing Cycle</span> <strong> Monthly</strong></li>
                    <li><span>Renewal Amount</span> <strong>--</strong></li>
                </ul>
                <div class="gs-modal-btns">
                    <a href="#" class="gs-modal-continue-btn" data-dismiss="modal" data-toggle="modal"
                        data-target="#cancel_subscription_002">Edit Plan</a>

                    <a href="#" class="gs-modal-cancel-btn" data-dismiss="modal" data-toggle="modal"
                        data-target="#cancel_subscription_02">Cancel Plan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_002" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <div class="d-flex align-items-center mb-2">
                    <h4>Select Upgrade/Downgrade to Subscription</h4>
                    <div class="gs-tutorials-toolnip">
                        <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/tutorail-wraning.svg" alt="">
                        <div class="ai-upload-option-tooltip">
                            <span>Upon confirming your plan change, your saved credit card will be automatically charged or prorated based on whether you upgraded or downgraded your plan. This will be processed via FastSpring.</span>
                        </div>
                    </div>
                </div>
                <select id="next_subscription_plan" name="next_subscription_plan" class="form-select nwfiles-optns"
                    aria-label="Choose Plan" onchange="getProductByPlan('{{$userActivePlan}}');">
                    <option value="" selected disabled>Select Subscription Plan to Upgrade/Downgrade</option>
                    @foreach ($subscription_plans as $plan => $plan_display)
                        <option value="{{ $plan }}"@if ($userActivePlan == $plan) selected @endif>
                            {{ $plan_display }}</option>
                        {{-- <option value="{{ $plan }}@if ($userActivePlan == $plan) selected @endif">{{ $plan_display }}</option> --}}
                    @endforeach
                </select>
                <div class="gs-modal-btns">
                    <a href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#cancel_subscription_003" class="gs-modal-continue-btn"
                        >Upgrade to Change Plan</a>
                    {{-- <a href="#" class="gs-modal-continue-btn" onclick="upgradeSubscription();"
                        id="btn_upgrade_subscription">Upgrade to Change Plan</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_003" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <div class="confirm-content">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/warning.png">
                    <h2 class="modal-title" id="modalTitle">Are you sure?</h2>
                    <p>Clicking 'Yes' will confirm your plan change. Your saved credit card will be automatically charged for an upgrade or credited for a downgrade, based on the adjustment. </p>
                    <div class="confirm-modal-button">
                        <button id="btn_upgrade_subscription" class="gs-login-btn" onclick="upgradeSubscription();" type="button">
                            Yes
                        </button>
                        <button class="gs-login-btn close-confirm-modal" type="button" data-dismiss="modal" data-toggle="modal"
                        data-target="#cancel_subscription_002">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_02" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <h3>Are you sure you want to cancel your plan?</h3>
                <p>If you decide to cancel your plan, you’ll loose the the flexibility of
                    re-designing your home with 30+ AI tools and miss out on premium features
                    such as Sky color changer and Design Critique.</p>

                <p> Even if you choose to cancel today, your plan access remains active until
                    {{ $formattedExpDate }}.</p>
                <div class="gs-modal-btns">
                    <a href="#" class="gs-modal-continue-btn" data-dismiss="modal" data-toggle="modal"
                        data-target="#cancel_subscription_03">Cancel Subscription</a>
                    <a href="#" class="gs-modal-cancel-btn" data-toggle="modal"
                        data-target="#cancel_subscription_01" data-dismiss="modal">Go Back</a>
                </div>
                {{-- <div class="gs-modal-btnpause">
                    <a href="#">Would you like to pause instead?</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background gs-modal-freedays" id="cancel_subscription_03" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <h3>Get an Extra
                    <span>30 Days of Free Access </span>
                </h3>
                <p>We’re sorry you’re thinking about leaving us. We’re in the process of pushing a number of updates
                    that
                    will make our app faster, more reliable and much more easier to use.</p>
                <p>To make sure you get to experience the new version of HomeDesigns AI, we’re giving you the option to
                    delay your next billing cycle by <strong> 30 days - completely free of charge.</strong></p>
                <div class="gs-modal-btns">
                    <a href="#" class="gs-modal-continue-btn delay_next_billing" data-dismiss="modal">Delay
                        Next Billing</a>
                    <a href="#" class="gs-modal-cancel-btn" data-toggle="modal"
                        data-target="{{ $premiumPlan == 1 ? '#cancel_subscription_05' : '#cancel_subscription_04' }}"
                        data-dismiss="modal">Not Now</a>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_04" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>

                <div class="gs-free-premium-top">
                    <div class="gs-free-premium-left">
                        <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/premium-free.svg">
                    </div>
                    <div class="gs-free-premium-right">
                        <h3>{{ ucfirst($fullName) }}, Try Premium for Free!</h3>
                        <h4>Pause your plan for up to 3 months instead?</h4>
                    </div>
                </div>

                <p>We get it - there are times where you need to do more than generate design
                    inspiration with our AI. Before we see you go, we’re giving you the
                    opportunity to add our toolkit of advanced AI models to your account -
                    completely free of charge. </p>
                <p> Click the 'Add Premium' button below and get lifetime access to AI Upscaler, AI Enhancer,
                    Precision+,
                    Fill Spaces, and more.</p>
                <div class="gs-modal-btns">
                    <a href="#" class="gs-modal-continue-btn" data-dismiss="modal"
                        onclick="addPremiumPlan();">Add Premium For Free</a>
                    <a href="#" data-toggle="modal" data-target="#cancel_subscription_05"
                        class="gs-modal-cancel-btn" data-dismiss="modal">Cancel Subscription</a>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_05" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>

                <h3>We would like to hear your feedback 🙂</h3>
                <h4>We’d appreciate if you would take a moment to let us know why you are cancelling.</h4>
                <form id="myCancleFeedbackForm">
                    <div class="gs-modal-feeback-outer">
                        <h5>Please choose one:</h5>

                        <div class="gs-modal-feeback-row">
                            <input type="radio" name="cancel_reason" value="1" id="gs-modal-feeback1">
                            <span></span>
                            <label for="gs-modal-feeback1">It's too expensive.</label>
                        </div>
                        <div class="gs-modal-feeback-row">
                            <input type="radio" name="cancel_reason" value="2" id="gs-modal-feeback2">
                            <span></span>
                            <label for="gs-modal-feeback2">It was too difficult to use.</label>
                        </div>
                        <div class="gs-modal-feeback-row">
                            <input type="radio" name="cancel_reason" value="3" id="gs-modal-feeback3">
                            <span></span>
                            <label for="gs-modal-feeback3">Results were not as expected.</label>
                        </div>
                        <div class="gs-modal-feeback-row">
                            <input type="radio" name="cancel_reason" value="4" id="gs-modal-feeback4">
                            <span></span>
                            <label for="gs-modal-feeback4">Your service is no longer needed.</label>
                        </div>
                        <div class="gs-modal-feeback-row">
                            <input type="radio" name="cancel_reason" value="5" id="gs-modal-feeback5">
                            <span></span>
                            <label for="gs-modal-feeback5">I'm moving to a competitor. (Specify which one in the comment section)</label>
                        </div>
                        <div class="gs-modal-additional-comment">
                            <label>Additional Comments</label>
                            <textarea placeholder="Please add more details here." name="additional_comments"></textarea>
                        </div>
                    </div>
                </form>
                <div class="gs-modal-btns">
                     <a href="#" id="continue_button" class="gs-modal-continue-btn cancel_feedback_data">Continue</a>
                    <a href="#" class="gs-modal-cancel-btn" data-toggle="modal"
                        data-target="{{ $premiumPlan == 1 ? '#cancel_subscription_03' : '#cancel_subscription_04' }}"
                        data-dismiss="modal">Go Back</a>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="cancel_subscription_06" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg"></button>
                <h3>Confirm Your Cancelation Request</h3>
                <p>In order to process your cancelation request, our support team needs to confirm your cancelation
                    request.
                </p>
                <div data-reamaze-embed="contact" data-reamaze-embed-disable-subject="true" data-reamaze-embed-channel="support" data-reamaze-embed-form-id="75218"></div>

                {{-- <div data-reamaze-embed="contact" data-reamaze-embed-disable-subject="true"
                    data-reamaze-embed-form-id="75218"></div> --}}
                {{-- <div class="gs-modal-btns">
                    <a href="https://homedesigns.ai/go/support" class="gs-modal-continue-btn" id="confirmCancelBtn">Confirm Cancelation</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="confirm_modal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <div class="confirm-content">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/warning.png">
                    <h2 class="modal-title" id="modalTitle">Are you sure?</h2>
                    <p>You won't be able to revert this!</p>
                    <div class="confirm-modal-button">
                        <button class="gs-login-btn yes-confirm-modal" type="button">
                            Yes, delete it!
                        </button>
                        <button class="gs-login-btn close-confirm-modal" type="button">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="confirm_project_modal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <div class="confirm-content">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/warning.png">
                    <h2 class="modal-title" id="modalTitle">Are you sure?</h2>
                    <p>You won't be able to revert this!</p>
                    <div class="confirm-modal-button">
                        <button class="gs-login-btn yes-confirm-project-modal" type="button">
                            Yes, delete it!
                        </button>
                        <button class="gs-login-btn close-confirm-modal" type="button">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="confirm_sub_project_modal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <div class="confirm-content">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/warning.png">
                    <h2 class="modal-title" id="modalTitle">Are you sure?</h2>
                    <p>You won't be able to revert this!</p>
                    <div class="confirm-modal-button">
                        <button class="gs-login-btn yes-confirm-sub-project-modal" type="button">
                            Yes, delete it!
                        </button>
                        <button class="gs-login-btn close-confirm-modal" type="button">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="confirm_delete_modal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <div class="confirm-content">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/success_icon.png">
                    <h2 class="modal-title" id="modalTitle">Deleted!</h2>
                    <p>Your Images have been deleted.</p>
                    <div class="confirm-modal-button">
                        <button class="gs-login-btn close-confirm-delete-modal" type="button">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gs-modal-background" id="success_project_modal" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/gs-close-icon.svg">
                </button>
                <div class="confirm-content">
                    <img src="https://homedesigns-ai.b-cdn.net/webWidget/images/success_icon.png">
                    <h2 class="modal-title" id="modalTitle">Added!</h2>
                    <p>Your Images has been added successfully!</p>
                    <div class="confirm-modal-button">
                        <button class="gs-login-btn close-confirm-project-modal" type="button">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="routeToRunpodType" data-route="{{ route('nextrunpod.name') }}"></div> --}}
    <div id="routeToGetFailedResp" data-route="{{ route('failed_response.data') }}"></div>
    <div id="deleteRenderImages" class="hidden" data-route="{{ route('image.delete') }}"></div>
    {{-- <div id="addImagesToProject" class="hidden" data-route="{{ route('user.add-images-to-project') }}"></div> --}}
    {{-- <div id="addAllImagesAsFavourite" class="hidden" data-route="{{ route('user.add-images-as-favourite') }}"> --}}
    </div>
    {{-- <div id="editAsPrecision" data-route="{{ route('editAs.precision') }}"></div> --}}
    @include('web2.common.design-preview')
    <div 
        id="translations"
        data-design-styles="{{ trans('content.design_style_text') }}"
        data-room-types="{{ trans('content.room_type_text') }}"
        data-house-angle-types="{{ trans('content.house_angle_text') }}"
        data-garden-types="{{ trans('content.garden_type_text') }}"
        data-mode-types="{{ trans('content.mode_type_text') }}"
        data-no-text-type="{{ trans('content.no_designs_text') }}"
        data-validation1-type="{{ trans('validation_messages.upload_texture_color') }}"
        data-validation2-type="{{ trans('validation_messages.masked_image') }}"
        data-validation3-type="{{ trans('validation_messages.upload_textture_image') }}"
        data-validation4-type="{{ trans('validation_messages.main_image_missing') }}"
        data-validation5-type="{{ trans('validation_messages.select_room_type') }}"
        data-validation6-type="{{ trans('validation_messages.select_house_angle') }}"
        data-validation7-type="{{ trans('validation_messages.select_garden_type') }}"
        data-validation8-type="{{ trans('validation_messages.select_design_style') }}"
        data-validation9-type="{{ trans('validation_messages.select_mode_type') }}"
        data-validation10-type="{{ trans('validation_messages.upload_custom_element') }}"
        data-validation11-type="{{ trans('validation_messages.select_sky_Color') }}"
        data-validation12-type="{{ trans('validation_messages.select_material_type') }}"
        data-validation13-type="{{ trans('validation_messages.select_one_custom_element') }}"
        data-validation14-type="{{ trans('validation_messages.no_image_merge') }}"
        data-validation15-type="{{ trans('validation_messages.select_more_image') }}"
        data-validation16-type="{{ trans('validation_messages.upload_image') }}"
        data-validation17-type="{{ trans('validation_messages.allowed_extension') }}"
        data-validation18-type="{{ trans('validation_messages.min_size_text') }}"
        data-validation19-type="{{ trans('validation_messages.update_prompts') }}"
        data-validation20-type="{{ trans('validation_messages.no_furniture_found') }}"
        data-validation21-type="{{ trans('validation_messages.find_similar_product') }}"
        data-validation22-type="{{ trans('validation_messages.select_image_type') }}"
        data-custom-texture-type="{{ trans('content.custom_textures') }}"
        data-preset-texture-type="{{ trans('content.preset_textures') }}"
        data-placeholder-colortext-type="{{ trans('content.placholder_Orange_peel_text') }}"
        data-preset-color-type="{{ trans('content.preset_colors') }}"
        data-custom-color-type="{{ trans('content.custom_colors') }}"
        >
    </div>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script> --}}

    @yield('scripts')

    @stack('script-stack')
    <script type="text/javascript">
    const maskingTranslations = @json(__('masking_objects'));

        //$productFruits.push(['init', 'jz7YULFHbhRincAX', 'en', { username: '{{$customerName}}' }]);
    </script>
    <script>
        ire('identify', {
            customerid: "{{ $customerId }}",
            customeremail: "{{ $customerEmail }}"
        });
        // $('[data-toggle="tooltip"]').tooltip();
        $(document).on('click', '.cancel_subscription_btn', function() {
            swal.fire({
                    title: 'Are you sure you want to cancel your active subscription?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $('#cancel_subscription_form').submit();
                        Swal.fire(
                            'Deleted!',
                            'Your Current Subscription has been cancled successfully',
                            'success'
                        )
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000); //refresh every 2 seconds
                    }
                });
        });
    </script>
    <script>
        function hideCred() {
            console.log("");
        };

        function toggleDiv() {
            var div = document.getElementById("myDiv");
            div.classList.toggle("hidden");
            event.stopPropagation();
        }
    </script>
    <script>
        if (window.innerWidth < 768) {
            // Set a different width for mobile view
            $('.welcome_video').html(
                '<iframe width="100%" height="180" src="https://www.youtube.com/embed/cIYIejIHjDA" frameborder="0" allowfullscreen></iframe>'
            );
        } else {
            // Use the default width for other screen sizes
            $('.welcome_video').html(
                '<iframe width="560" height="315" src="https://www.youtube.com/embed/cIYIejIHjDA" frameborder="0" allowfullscreen></iframe>'
            );
        }
        let clickCount = 1;

        function myClickHandler(event) {
            clickCount = parseInt(localStorage.getItem('clickCount')) || 1;
            clickCount++;
            if (clickCount === 5) {
                event.preventDefault();
                $.ajax({
                    url: "",
                    type: 'post',
                    complete: function() {},
                    success: function(data) {
                        if (data['success'] == true) {
                            $("#multipleDecorClick").modal('show');
                        } else {
                            window.location.href = "";
                        }
                        clickCount = 1; // Reset click count
                        localStorage.setItem('clickCount', clickCount);
                    },
                    error: function() {}
                })
            } else if (clickCount > 5) {
                clickCount = 1; // Reset click count
                localStorage.setItem('clickCount', clickCount);
            }
            localStorage.setItem('clickCount', clickCount);
        }
    </script>
    <script>

        $("#closeExtraStyleModal").click(function() {
            $("#modalStyleUpgradePlan").hide();
            location.reload();
        });
        $("#closeExtraRoomModal").click(function() {
            $("#modalRoomTypeUpgradePlan").hide();
            location.reload();
        });
    </script>
    <script>
        $(document).ready(function() {
            //Open Drop Down
            $(".custom-select-wrapper p").click(function() {

                $(".custom-select-wrapper ul").slideToggle(700);
                $(this).parent().parent().toggleClass('open-dropdown');
            });

            const activeLinks = $(".dash-list ul li a.active");

            if (activeLinks.length > 0) {
                $('.dash-list .custom-select-wrapper ul').css('display', 'block');
                $('.dash-list .custom-select-wrapper').addClass('open-dropdown');

            } else {
                $('.dash-list .custom-select-wrapper ul').css('display', 'none');
                $('.dash-list .custom-select-wrapper').removeClass('open-dropdown');
            }

            //$('#confirmCancelBtn').on('click', function(event) {
                //event.preventDefault();

                // Open the link in a new tab
                //window.open('https://homedesigns.ai/go/support', '_blank');

                // Close the modal
               // $('#cancel_subscription_06').modal('hide');
           // });

            $('#cancel_subscription_002').on('shown.bs.modal', function () {
            // Reset the dropdown value to userActivePlan
                var userActivePlan = '{{ $userActivePlan }}';
                $('#next_subscription_plan').val(userActivePlan);
            });

            $('#cancel_subscription_05').on('hidden.bs.modal', function () {
                // Clear all form fields
                $('#myCancleFeedbackForm')[0].reset();

                // Optionally, you can also clear additional comments and radio buttons manually if needed
                $('#myCancleFeedbackForm textarea[name="additional_comments"]').val('');
                $('#myCancleFeedbackForm input[name="cancel_reason"]').prop('checked', false);
            });
        });
    </script>

    <script>
        function selectRoomType(roomType, sec) {
            // Set the selected room type in the hidden input
            document.getElementById('selectedRoomType' + sec + '-' + dataPage).value = roomType;

            // Update the display
            var roomTypeDisplay = document.getElementById('roomTypeDisplay' + sec + '-' + dataPage);
            var allRoomTypes = document.getElementById('allRoomTypes' + sec);

            // Remove the "active" class from all room type divs in allRoomTypes
            var activeDivAllRoomTypes = roomTypeDisplay.querySelector('.gs-select-room-style-single.active');
            if (activeDivAllRoomTypes) {
                activeDivAllRoomTypes.classList.remove('active');
            }

            var activeDivAllRoomTypes = allRoomTypes.querySelector('.gs-select-room-style-single.active');
            if (activeDivAllRoomTypes) {
                activeDivAllRoomTypes.classList.remove('active');
            }

            // Check if the selected room type div is already present in roomTypeDisplay
            var selectedRoomTypeDivRoomTypeDisplay = roomTypeDisplay.querySelector(`[data-room-type="${roomType}"]`);

            if (selectedRoomTypeDivRoomTypeDisplay) {
                // Add the "active" class to the selected room type div in roomTypeDisplay
                selectedRoomTypeDivRoomTypeDisplay.classList.add('active');

                // Add the "active" class to the corresponding room type div in allRoomTypes
                var selectedRoomTypeDivAllRoomTypes = allRoomTypes.querySelector(`[data-room-type="${roomType}"]`);
                if (selectedRoomTypeDivAllRoomTypes) {
                    selectedRoomTypeDivAllRoomTypes.classList.add('active');
                }
            } else {
                // Remove the last child of roomTypeDisplay
                if (roomTypeDisplay.children.length > 0) {
                    roomTypeDisplay.removeChild(roomTypeDisplay.lastElementChild);
                }

                // Clone the selected room type div from allRoomTypes before moving it
                var selectedRoomTypeDivAllRoomTypes = allRoomTypes.querySelector(`[data-room-type="${roomType}"]`);
                if (selectedRoomTypeDivAllRoomTypes) {
                    var clonedRoomTypeDiv = selectedRoomTypeDivAllRoomTypes.cloneNode(true);

                    // Add the "active" class to the cloned room type div
                    clonedRoomTypeDiv.classList.add('active');

                    // Insert the new cloned room type div as the first child of roomTypeDisplay
                    roomTypeDisplay.insertBefore(clonedRoomTypeDiv, roomTypeDisplay.firstChild);

                    // Add the "active" class to the corresponding room type div in allRoomTypes
                    selectedRoomTypeDivAllRoomTypes.classList.add('active');
                }
            }
        }

        function selectDesignStyle(style, sec) {
            // Set the selected design style in the hidden input
            document.getElementById('selectedDesignStyle' + sec + '-' + dataPage).value = style;

            // Update the display logic here (if needed)
            // For example, you can highlight the selected design style visually
            var designStyleDisplay = document.getElementById('designStyleDisplay' + sec + '-' + dataPage);
            var allDesignStyles = document.getElementById('allDesignStyles' + sec);

            // Remove the "active" class from all design style divs in allDesignStyles
            var activeDivAllDesignStyles = designStyleDisplay.querySelector('.gs-select-room-style-single.active');
            if (activeDivAllDesignStyles) {
                activeDivAllDesignStyles.classList.remove('active');
            }

            var activeDivAllDesignStyles = allDesignStyles.querySelector('.gs-select-room-style-single.active');
            if (activeDivAllDesignStyles) {
                activeDivAllDesignStyles.classList.remove('active');
            }

            // Check if the selected design style div is already present in designStyleDisplay
            var selectedDesignStyleDivDesignStyleDisplay = designStyleDisplay.querySelector(
                `[data-design-style="${style}"]`);

            if (selectedDesignStyleDivDesignStyleDisplay) {
                // Add the "active" class to the selected design style div in designStyleDisplay
                selectedDesignStyleDivDesignStyleDisplay.classList.add('active');

                // Add the "active" class to the corresponding design style div in allDesignStyles
                var selectedDesignStyleDivAllDesignStyles = allDesignStyles.querySelector(`[data-design-style="${style}"]`);
                if (selectedDesignStyleDivAllDesignStyles) {
                    selectedDesignStyleDivAllDesignStyles.classList.add('active');
                }
            } else {
                // Remove the last child of designStyleDisplay
                if (designStyleDisplay.children.length > 0) {
                    designStyleDisplay.removeChild(designStyleDisplay.lastElementChild);
                }

                // Clone the selected design style div from allDesignStyles before moving it
                var selectedDesignStyleDivAllDesignStyles = allDesignStyles.querySelector(`[data-design-style="${style}"]`);
                if (selectedDesignStyleDivAllDesignStyles) {
                    var clonedDesignStyleDiv = selectedDesignStyleDivAllDesignStyles.cloneNode(true);

                    // Add the "active" class to the cloned design style div
                    clonedDesignStyleDiv.classList.add('active');

                    // Insert the new cloned design style div as the first child of designStyleDisplay
                    designStyleDisplay.insertBefore(clonedDesignStyleDiv, designStyleDisplay.firstChild);

                    // Add the "active" class to the corresponding design style div in allDesignStyles
                    selectedDesignStyleDivAllDesignStyles.classList.add('active');
                }
            }
        }

        function selectModeType(modeType, sec) {
            $(`#modeTypeDisplay${sec} .gs-select-room-style-single`).removeClass('active');
            $(`#modeTypeDisplay${sec} .gs-select-room-style-single[data-room-type="${modeType}"]`).addClass('active');
            document.getElementById('selectedModeType' + sec + "-" +dataPage).value = modeType;

            const checkbox = document.getElementById('structural_elements_ck' + sec);
            if (modeType === 'Perfect Redesign') {
                checkbox.checked = true; // Check the checkbox
            } else {
                checkbox.checked = false; // Uncheck the checkbox
            }
        }
    </script>
    <script>
        $(document).on('click', '.delay_next_billing', function() {
            $.ajax({
                type: "POST",
                url: "", // Using named route
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    period: '1'
                },
                success: function(response) {
                    if (response.success == true) {
                        alert(response.message);
                        //alert("No order is associated with this user account. Please contact our support team at <a href="mailto:help@homedesigns.ai">help@homedesigns.ai</a>.");
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        });

        function addPremiumPlan() {
            $.ajax({
                type: "POST",
                url: "", // Using named route
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    alert("Premium Plan is added to your account for free");
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        }

        $(document).on('click', '.cancel_feedback_data', function() {
            event.preventDefault(); // Prevent default action of the button
            var selectedReason = $('input[name="cancel_reason"]:checked').val();
            var additionalComments = $('textarea[name="additional_comments"]').val().trim();

            // Validation for radio buttons and textarea
            if (!selectedReason) {
                alert('Please choose at least one option.');
                return;
            }

            // if (additionalComments === "") {
            //    alert('Please provide additional comments.');
            //    return;
            // }
            var formData = $('#myCancleFeedbackForm').serialize();
            // Make AJAX call
            $.ajax({
                type: 'POST',
                url: "", // Update with your PHP file URL
                data: formData,
                success: function(response) {
                   if (response.success) {
                    $('#cancel_subscription_05').modal('hide');
                    $('#cancel_subscription_06').modal('show');
                    } else {
                        // Handle case where response indicates failure
                        alert('Something went wrong. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error:', error);
                }
            });
        });
    </script>
    <script>
        let current_subscription = null;
        let current_subsctiption_amount = 0;

        function getProductByPlan(userActivePlan) {
            let selected_subscription_plan = $("#next_subscription_plan").find(":selected").val();
            if (userActivePlan == selected_subscription_plan) {
                alert("You are already using this subscription, please choose another one.");
                return false;
            } else if (selected_subscription_plan == "") {
                return false;
            }
            $.ajax({
                url: "/admin/getProductByPath/" + selected_subscription_plan,
                type: "GET",
                async: false,
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        if (response.data.products[0].result != "success") {
                            swal({
                                title: "Product Not found.",
                                text: "Something went wrong please try again",
                                icon: "error"
                            });
                            return false;
                        }
                        let amount = response.data.products[0].pricing.price.USD;
                        let differenciate_amount = amount - current_subsctiption_amount;
                        // current_subsctiption_amount
                        $("#next_amount").html('USD ' + amount.toFixed(2) + ' -  USD ' +
                            current_subsctiption_amount.toFixed(2) + ' = <strong>USD ' +
                            differenciate_amount.toFixed(2) + '</strong>');
                    } else {
                        swal({
                            title: "Product Not found.",
                            text: "Something went wrong please try again",
                            icon: "error"
                        });
                    }
                }
            })
        }

        function getSubscriptionDetails(order_id) {
            $.ajax({
                url: "",
                type: "POST",
                data: {
                    'order_id': order_id
                },
                async: false,
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function(resp) {
                    if (resp.success) {
                        if (resp.data.state == "active") {
                            $("#btn_cancel_subscription").removeClass('d-none');
                            $("#plan_status").html("<span class='badge bg-success'>" + resp.data.state +
                                "</span>");
                        } else if (resp.data.state == "canceled") {
                            $("#plan_status").html("<span class='badge bg-info'>" + resp.data.state +
                                "</span>");
                        } else if (resp.data.state == "paused") {
                            $("#plan_status").html("<span class='badge bg-warning'>" + resp.data.state +
                                "</span>");
                        }
                        $("#upgradeSubcriptionModal").modal("show");
                        if (resp.data.isPauseScheduled == true) {
                            $("#btn_pause_subscription").addClass('d-none');
                            $("#btn_resume_subscription").addClass('d-none');
                            $("#btn_cancel_paused_subscription").removeClass('d-none');
                            $("#subscription_status").html(
                                '<div class="alert alert-warning">The subscription is scheduled to be <strong>Paused</strong> on <strong>' +
                                resp.data.pauseDateDisplayISO8601 +
                                '</strong> and will resume on <strong>' + resp.data
                                .resumeDateDisplayISO8601 + '</strong></div>');
                        } else if (resp.data.state == "canceled") {
                            $("#btn_pause_subscription").addClass('d-none');
                            $("#btn_resume_subscription").removeClass('d-none');
                            $("#subscription_status").html(
                                '<div class="alert alert-danger">The subscription is <strong>Canceled</strong> on <strong>' +
                                resp.data.canceledDateDisplayISO8601 +
                                '</strong> and Deactivation Date should be <strong>' + resp.data
                                .deactivationDateDisplayISO8601 + '</strong></div>');
                        } else {
                            $("#subscription_status").html("");
                            $("#btn_pause_subscription").removeClass('d-none');
                            $("#btn_resume_subscription").addClass('d-none');
                            $("#btn_cancel_paused_subscription").addClass('d-none');
                        }
                        $("#subscription_name").html(
                            "<span><small>Current Subscription</small><br><div class='d-flex justify-content-between'><h5>" +
                            resp.data.display + "</h5></div></span>");
                        $("#next_subscription_plan").val(resp.data.product);
                        current_subscription = resp.data.product;
                        $("#next_subscription_plan").find('option[value=' + resp.data.product + ']').prop(
                            'disabled', true);
                        $("#subscription_id").val(resp.data.id);
                        $("#next_amount").html("<strong>" + resp.data.nextChargeTotalDisplay + "</strong>");
                        $("#next_date").html("<strong>" + resp.data.nextChargeDateDisplayISO8601 + "</strong>");
                        current_subsctiption_amount = resp.data.nextChargeTotal;
                    } else {
                        console.log(resp.message);
                    }
                },
                error: function(resp) {
                    data = false;
                }
            })
        }

        function getSubscriptionDetailsBySubscriptionId(subscription_id) {
            $.ajax({
                url: "",
                type: "POST",
                data: {
                    'subscription_id': subscription_id
                },
                async: false,
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function(resp) {
                    if (resp.success) {
                        $("#current_active_subscription").text(resp.data.display);
                    } else {
                        console.log(resp.message);
                    }
                },
                error: function(resp) {
                    data = false;
                }
            })
        }

        function upgradeSubscription() {
            let selected_subscription_plan = $("#next_subscription_plan").find(":selected").val();
            let active_subscription_plan = "{{ $userActivePlan }}";

            if (!selected_subscription_plan) {
                alert('Please select a subscription plan.');
            } else if (!selected_subscription_plan || selected_subscription_plan === active_subscription_plan) {
                alert('You are already using this subscription, Please choose another Plan.');
            } else {
                $.ajax({
                    type: "POST",
                    url: "", // Using named route
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product: selected_subscription_plan
                    },
                    success: function(response) {
                        if (response.success == false) {
                            alert(response.message);
                            $('#cancel_subscription_002').hide();
                            $('#cancel_subscription_01').show();
                        } else {
                            alert("Your Subscription plan should be Changed Successfully.");
                            $('#cancel_subscription_002').hide();
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            }
        }
    </script>
    {{-- <div class="elfsight-app-c277abde-f388-4053-bb82-572a308f96f1"></div> --}}
</body>

</html>
