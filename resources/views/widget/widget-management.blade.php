@extends('widget.widget-layout')

@section('styles')
    <style>
        .konvajs-content {
            margin: 0 auto;
        }

        .uploadInPaintingImage {
            max-width: 100%;
        }

        .feature-buttons {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
        }

        .feature-buttons li {
            margin-top: 20px;
            margin-left: 20px;
        }

        .feature-button {
            padding: 10px 20px !important;
            border: none;
            background: #1C1E26;
            cursor: pointer !important;
            border-radius: 5px;
            transition: background-color 0.3s !important;
            color: #fff !important;
        }

        .feature-button.active {
            background: radial-gradient(66.48% 68.75% at 50% 31.25%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(33% 82.75% at 31.25% 76.56%, rgba(255, 255, 255, 0.219) 0%, rgba(255, 255, 255, 0.036) 100%), radial-gradient(66.95% 96.09% at 35.23% 0%, #C243FE 0%, rgba(182, 47, 246, 0.12) 100%), linear-gradient(0deg, #421CD8, #421CD8), #5B099B;
            color: white;
        }

        .feature-button:hover {
            background: linear-gradient(180deg, #8F73FF 0%, #5B3DD5 100%);
        }

        .feature-content {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #111929;
            border-radius: 5px;
            background-color: #111929;
        }

        .custom-logo {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }

        .custom-logo img {
            height: 50px;
            width: 50px;
        }
        .gs-our-preset-settings .toggle-button.active {
            background: linear-gradient(180deg, #8F73FF 0%, #5B3DD5 100%);
            color: #fff;

        }

        .gs-our-preset-settings .toggle-button{
            height: 54px;
            display: flex;
            align-items: center;
            width: 100%;
            /* background: #1C1E26; */
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: -0.01em;
            text-align: left;
            color: #1c1e26;
            padding: 2px 14px;
            cursor: pointer;
            transition: .3s all ease;
            -webkit-transition: .3s all ease;
            max-width: 196px;
            text-align: center;
            justify-content: center;
            border: none;
        }
        .gs-our-preset-settings .button-container{
            display: flex;
        }

        .gs-our-preset-settings .toggle-button:hover {
            color: #fff;
            background: linear-gradient(180deg, #5B3DD5 0%, #8F73FF 100%);
        }
        .button-container {
        margin-bottom: 10px;
        }

        .button-container button {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
        }
        .ui-widget-content, .ui-widget-content a{
            color: #fff !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/cropper.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tensorflow/4.15.0/tf.min.js"
        integrity="sha512-RMW1ZrsUb7zY5+dY2sH+dOD3aPXpgQgWysvpyj+UtMani44bvq6Nj4HQ0tB/gdbG0gJb1BhapgYvUPNve0A6kQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')

    <?php
    $userActivePlan = '';
    $crossShellPlan = [];
    $precisionUser = false;
    $default_gallery = 'private';
    ?>
    @dd($widgetData->accessible_features);
    <input type="hidden" id="precisionUser" value="{{ $precisionUser ? 'true' : 'false' }}">
    <input type="hidden" id="modeValueForPage" value="0" />
    <input type="hidden" id="widgetUserID" value="{{ $widgetData->user_id }}" />
    <input type="hidden" id="widgetThemeMode" value="{{ $widgetThemeMode }}" />
    <div class="ai-tool-wrapper">
        <div class="ai-tool-wrapper  demo-class">
            <div class="ai-tool-right" id="tabs">
                <ul class="feature-buttons">
                    @foreach (json_decode($widgetData->accessible_features) as $feature)
                        <li>
                            <a href="#{{ $feature }}" id="feature-{{ $feature }}"
                                class="feature-button @if ($loop->first) active @endif"
                                data-feature="{{ $feature }}"
                                data-feature-url="{{ route('widget.showFeature', ['feature' => $feature]) }}">
                                 {{ ucwords(str_replace('_', ' ', $feature)) }}@if ($feature === 'precision')+ @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="custom-logo">
                    <img src="{{ asset('storage/' . $widgetData->logo) }}" alt="Custom Logo" />
                </div>
                @foreach (json_decode($widgetData->accessible_features) as $feature)
                    <div id="{{ $feature }}">
                        @include('widget.widget-' . $feature)
                    </div>
                @endforeach
                {{-- <ul class="feature-buttons">
                    @foreach (json_decode($widgetData->accessible_features) as $feature)
                        <li>
                            <button id="feature-{{ $feature }}" class="feature-button @if ($loop->first) active @endif"
                                data-feature="{{ $feature }}"
                                data-feature-url="{{ route('widget.showFeature', ['feature' => $feature]) }}">
                                {{ ucwords(str_replace('_', ' ', $feature)) }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="feature-contents">
                    <div class="custom-logo">
                        <img src="{{ asset('storage/' . $widgetData->logo) }}" alt="Custom Logo" />
                    </div>
                    <div id="" class="feature-content"></div>
                    <!-- Content will be loaded here -->
                </div> --}}

            </div>
            <template id="redesignCard">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="ai-upload-latest-single">

                        <div class="ai-upload-latest-after">
                            <div class="ai-upload-latest-inset">
                                <div class="ai-upload-selection">
                                    <div class="ai-upload-favourite hd_image_div">
                                        <img class="hd_image" src="https://homedesigns-ai.b-cdn.net/web/images/hd_icon.png" alt="">
                                    </div>
                                </div>
                                <img class="complte-img img" src="" data-item="output-image">
                                <div class="ai-upload-effects">
                                    <ul class="render-overlay-data-box">
                                        <li class="render-overlay-data"></li>
                                        <li class="render-overlay-data"></li>
                                        <li class="render-overlay-data"></li>
                                    </ul>
                                </div>
                                <div class="ai-upload-optons">
                                    <ul>
                                        <li class="ai-upload-add-project-list">
                                            <span class="ai-upload-option-tooltip"> Download </span>
                                            <a class="download" href="javascript:void(0)" data-download-url=""
                                                title="Download" download data-item="download-output-btn">
                                                <img
                                                    src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon1.svg">
                                            </a>
                                        </li>
                                        <li class="ai-upload-add-project-list">
                                            <span class="ai-upload-option-tooltip"> Show </span>
                                            <a class="ip_img_preview inpainting-preview" href="javascript:void(0)"
                                                data-img="" data-item="preview-btn-output" title="Open"
                                                onclick="previewImage()">
                                                <img
                                                    src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon2.svg">
                                            </a>
                                        </li>
                                        <li class="ai-upload-add-project-list on-gen-disable">
                                            <span class="ai-upload-option-tooltip"> HD </span>
                                            <a class="generate_hd_img" href="javascript:void(0)" data-inputimg="" data-img=""
                                                    title="Full Hd Quality" data-sec="" data-item="hd_quality">
                                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-image-editing-slide-icon8.svg">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template id="inPaintingCard">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="ai-upload-latest-single">
                        <div class="ai-upload-latest-after">
                            <div class="ai-upload-latest-inset">
                                <div class="ai-upload-selection">
                                    <div class="ai-upload-favourite hd_image_div">
                                        <img class="hd_image" src="https://homedesigns-ai.b-cdn.net/web/images/hd_icon.png" alt="">
                                    </div>
                                </div>
                                {{-- <span class="ai-upload-title">After</span> --}}
                                <img class="complte-img img" src="" data-item="output-image">
                                <div class="ai-upload-effects">
                                    <ul class="render-overlay-data-box">
                                        <li class="render-overlay-data"></li>
                                        <li class="render-overlay-data"></li>
                                        {{-- <li class="render-overlay-data"></li> --}}
                                    </ul>
                                </div>
                                <div class="ai-upload-optons">
                                    <ul>
                                        <li class="ai-upload-add-project-list">
                                            <span class="ai-upload-option-tooltip"> Download </span>
                                            <a class="download" href="javascript:void(0)" data-download-url=""
                                                title="Download" download data-item="download-output-btn">
                                                <img src="{{ asset('web2/images/ai-upload-optons-icon1.svg') }}">
                                            </a>
                                        </li>
                                        <li class="ai-upload-add-project-list">
                                            <span class="ai-upload-option-tooltip"> Show </span>
                                            <a class="ip_img_preview inpainting-preview" href="javascript:void(0)"
                                                data-img="" data-item="preview-btn-output" title="Open"
                                                onclick="previewImage()">
                                                <img src="{{ asset('web2/images/ai-upload-optons-icon2.svg') }}">
                                            </a>
                                        </li>
                                        <li class="ai-upload-add-project-list on-gen-disable">
                                            <span class="ai-upload-option-tooltip"> HD </span>
                                            <a class="full_hd_quality" href="javascript:void(0)" data-img="" data-sec=""
                                                data-item="hd_quality" title="Full HD Quality">
                                                <img src="{{ asset('web2/images/gs-image-editing-slide-icon8.svg') }}">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div id="routeToFullHdImageData" data-route="{{ route('getHdImages') }}"></div>
        @include('web2.common.widget-design-preview')
    @endsection

    @section('scripts')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-G0JYLHV57P"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-G0JYLHV57P');
        </script>
        <script>
            $(document).ready(function() {
                var dropdownValue = localStorage.getItem('dropdownValue');
                if (dropdownValue) {
                    selectModeType(dropdownValue, 0);
                    localStorage.removeItem('dropdownValue');
                }
            });

            function loadVideoModal() {
                if (window.innerWidth < 768) {
                    // Set a different width for mobile view
                    $('.pdf-container').html(
                        '<iframe width="auto" height="180" src="https://www.youtube.com/embed/IMCUjuW_Rhk?si=q_Y3tzzQ1-11ZZAZ" frameborder="0" allowfullscreen></iframe>'
                    );
                } else {
                    // Use the default width for other screen sizes
                    $('.pdf-container').html(
                        '<iframe width="560" height="315" src="https://www.youtube.com/embed/IMCUjuW_Rhk?si=q_Y3tzzQ1-11ZZAZ" frameborder="0" allowfullscreen></iframe>'
                    );
                }
                $("#pdfModal").modal("show");
            }
        </script>
    @endsection
