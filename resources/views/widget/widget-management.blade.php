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
            margin: 0;
        }

        .feature-button {
            padding: 10px 20px;
            border: none;
            background-color: #f0f0f0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .feature-button.active {
            background-color: #007bff;
            color: white;
        }

        .feature-content {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #111929;
            border-radius: 5px;
            background-color: #111929;
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
    <input type="hidden" id="precisionUser" value="{{ $precisionUser ? 'true' : 'false' }}">
    <input type="hidden" class="data_page" data-page="redesign" />
    <input type="hidden" id="modeValueForPage" value="0" />
    <div class="ai-tool-wrapper">
        <div class="ai-tool-wrapper  demo-class">
            <div class="ai-tool-right">
                <ul class="feature-buttons">
                    @foreach (json_decode($widgetData->accessible_features) as $feature)
                        <li>
                            <button class="feature-button @if ($loop->first) active @endif"
                                data-feature="{{ $feature }}"
                                data-feature-url="{{ route('widget.showFeature', ['feature' => $feature]) }}">
                                {{ ucwords(str_replace('_', ' ', $feature)) }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="feature-content">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
        <template id="redesignCard">
            <div class="col-md-6 col-lg-4 col-12">
                <div class="ai-upload-latest-single">
                    {{-- <div class="ai-upload-latest-before">
                    <div class="ai-upload-latest-inset">
                        <span class="ai-upload-title">Before</span>
                        <img class="img" data-item="input-image">
                        <div class="ai-upload-optons">
                            <ul>
                                <li class="ai-upload-add-project-list">
                                    <span class="ai-upload-option-tooltip"> Download </span>
                                    <a class="download" href="javascript:void(0)" data-download-url="" title="Download"
                                        download data-item="download-input-btn">
                                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon1.svg">
                                    </a>
                                </li>
                                <li class="ai-upload-add-project-list">
                                    <span class="ai-upload-option-tooltip"> Show </span>
                                    <a class="ip_img_preview inpainting-preview" href="javascript:void(0)" data-img=""
                                        data-item="preview-btn-input" title="Open" onclick="previewImage()">
                                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon2.svg">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                    <div class="ai-upload-latest-after">
                        <div class="ai-upload-latest-inset">
                            {{-- <div class="ai-upload-selection">
                            <div class="ai-upload-favourite">
                                <input class="ml_dw_img" name="check" type="checkbox" onclick="getMultipleImages()">
                                <div class="ai-upload-checked"></div>
                            </div>
                            <div class="ai-upload-favourite">
                                <img class="ai-upload-favourite-checked favcheckimg" onclick="addRemovefavorite()"
                                    src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-favourite-checked.svg" alt="">
                            </div>
                            <div class="ai-upload-favourite hd_image_div">
                                <img class="hd_image" src="https://homedesigns-ai.b-cdn.net/web/images/hd_icon.png" alt="">
                            </div>
                        </div> --}}
                            {{-- <span class="ai-upload-title">After</span> --}}
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
                                        <a class="download" href="javascript:void(0)" data-download-url="" title="Download"
                                            download data-item="download-output-btn">
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
                                    {{-- <li class="ai-upload-add-project-list on-gen-disable">
                                    <span class="ai-upload-option-tooltip"> Edit </span>
                                    <a class="edit_generated_image" href="javascript:void(0)"
                                        data-index="0"
                                        data-outputImg="" data-item="edit_image"
                                        title="Edit Image" data-sec=""
                                        data-inputImg="">
                                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon3.svg">
                                    </a>
                                </li> --}}
                                    {{-- <li class="ai-upload-add-project-list on-gen-disable">
                                    <span class="ai-upload-option-tooltip"> Input </span>
                                    <a class="use-as-input" href="javascript:void(0)"
                                        data-img="" data-item="user_as_output_image"
                                        title="Use as Input" data-sec="">
                                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-image-editing-slide-icon3.svg">
                                    </a>
                                </li> --}}
                                    {{-- <li class="ai-upload-add-project-list on-gen-disable">
                                    <span class="ai-upload-option-tooltip"> HD </span>
                                    <a class="generate_hd_img" href="javascript:void(0)" data-img="" data-sec=""
                                        data-item="hd_quality" title="Full HD Quality">
                                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-image-editing-slide-icon8.svg">
                                    </a>
                                </li> --}}
                                    {{-- <li class="ai-upload-add-project-list on-gen-disable">
                                    <span class="ai-upload-option-tooltip"> Feedback </span>
                                    <a class="showFeedbackModal feedback_btn" href="javascript:void(0)" data-img=""
                                        data-item="feedback_button" title="Add Feedback" data-id="" data-design-type="">
                                        <img src="https://homedesigns-ai.b-cdn.net/web/images/magnifying4.svg">
                                    </a>
                                </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        {{-- <div id="routeToFullHdImageData" data-route="{{ route('getHdImages') }}"></div> --}}
    @endsection

    @section('scripts')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-G0JYLHV57P"></script>
        <script>
            $(document).ready(function() {
                $('#custom_instruction0').show();

                function loadFeatureContent(url) {
                    console.log("Loading feature content from URL:", url);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(data) {
                            $('.feature-content').html(data);
                        },
                        error: function(xhr, status, error) {
                            console.log("Failed to load content:", status, error);
                            $('.feature-content').html(
                                '<p>Failed to load content. It is under process</p>');
                        }
                    });
                }

                $(document).on('click', '.feature-button', function() {
                    console.log("Button clicked:", $(this).data('feature'));
                    $('.feature-button').removeClass('active');
                    $(this).addClass('active');

                    var url = $(this).data('feature-url');
                    loadFeatureContent(url);
                });

                // Ensure the active button click is triggered
                console.log("Triggering click on active button");
                $('.feature-button.active').trigger('click');
            });

        </script>
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
