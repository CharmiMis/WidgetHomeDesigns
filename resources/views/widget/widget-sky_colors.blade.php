{{-- section first start --}}
<div class="ai-tool-right-top top-menu-bar-first">
    <ul class="progress-bar-tab">
        <li class="active first_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>{{ trans('content.upload_image') }}</span>
        </li>
        <li class="second_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>{{ trans('content.change_weather') }}</span>
        </li>
    </ul>
</div>

    <div class="gs-dashboard-notice upload-image-container">
        <div class="gs-dashboard-notice-info">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/info-icon.svg">
        </div>
        <div class="gs-dashboard-notice-info-text">
            <h2>{{ trans('content.heading_title_sky_color') }}</h2>
            <p>{{ trans('content.heading_sky_color') }}</p>
        </div>
        <div class="gs-dashboard-cross">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/cross-icon.svg">
            <img class="light-mode" src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/cross-icon.svg">
        </div>
    </div>

<div class="image-background-container upload-image-container">
    <div class="ai-upload-image">
        <input type="file" class="ai-upload-input" id="ipFilePickerSkyColor">
        <h3 class="font22">{{ trans('content.upload_your_image') }} </h3>
        <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-upload-img.png">
        <span>{{ trans('content.drag_and_drop_your_image_here') }} </span>
        <a href="#">{{ trans('content.or_click_here_to_upload') }}</a>
    </div>
</div>
{{-- section first end --}}

{{-- section third start --}}
<div class="ai-tool-right-top top-menu-bar-second" style="display: none">
    <div class="ai-tool-right-back-btn">
        <a href="javascript:void(0)" class="gs-back-btn previous_page">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/back-btn-icon.svg">
            <img class="light-mode" src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/back-btn-icon.svg">
        </a>
    </div>
    <ul class="progress-bar-tab">
        <li class="active first_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>{{ trans('content.upload_image') }}</span>
        </li>
        <li class="active second_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>{{ trans('content.change_weather') }}</span>
        </li>

    </ul>
</div>

<div class="image-show-container image-mask-container" style="display: none">
    <div class="gs-what-to-edit-wrapper">
        <div class="gs-what-to-edit-left image-mask-container" style="display: none">
            <div id="inpainting-stag-outer-sky-color"
                class="inpainting-stag-outer d-flex align-items-center justify-content-center">
                <div id="painting-stag-sky-color"></div>
            </div>
            <div class="gs-what-to-edit-tips">
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>{{ trans('content.right_tip_sky_color_first') }}</p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>{{ trans('content.right_tip_sky_color_second') }}</p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>{{ trans('content.right_tip_sky_color_third') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gs-what-to-edit-right segment-masking-container" style="display: none">
            <div class="gs-what-to-edit-tabs">
                <div class="gs-what-to-edit-content">
                    <div class="gs-select-automatically-inner">
                        <input type="hidden" id="weather0" name="weather0">
                        <p class="font14">{{ trans('content.change_sky_colors') }}</p>
                        <div class="gs-select-room-style-row" id="skyColorDisplay">
                            <div class="gs-select-room-style-single" data-sky-color="Sunshine"
                                onclick="selectSkyColor('Sunshine')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon1.png">
                                <span>{{ trans('content.sunshine') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Rainy"
                                onclick="selectSkyColor('Rainy')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon2.png">
                                <span>{{ trans('content.rainy') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Cloudy"
                                onclick="selectSkyColor('Cloudy')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon3.png">
                                <span>{{ trans('content.cloudy') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Clear Sky"
                                onclick="selectSkyColor('Clear Sky')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon4.png">
                                <span>{{ trans('content.clear_sky') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Windy"
                                onclick="selectSkyColor('Windy')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon5.png">
                                <span>{{ trans('content.windy') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Dawn"
                                onclick="selectSkyColor('Dawn')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon6.png">
                                <span>{{ trans('content.dawn') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Dusk"
                                onclick="selectSkyColor('Dusk')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon7.png">
                                <span>{{ trans('content.dusk') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Twilight"
                                onclick="selectSkyColor('Twilight')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon8.png">
                                <span>{{ trans('content.twilight') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Sunny"
                                onclick="selectSkyColor('Sunny')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon9.png">
                                <span>{{ trans('content.sunny') }}</span>
                            </div>
                            <div class="gs-select-room-style-single" data-sky-color="Night"
                                onclick="selectSkyColor('Night')">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/sky-color-icon10.png">
                                <span>{{ trans('content.night') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="our-preset-settings-range-outer">
                        <input type="hidden" id="no_of_des0" name="no_of_des0"
                            value="1" />
                    </div>
                    <div class="gs-continue-btn-outer painting_generating_bt">
                        <a href="javascript:void(0)" onclick="_generateInPaintingDesign(0, this)"
                            id="generateDesignBtn0" class="gs-continue-btn generateDesignBtn0">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-generate-new-design.svg">
                            {{ trans('content.generate_new_designs')}}
                            <span id="submit" style="display:none">
                                <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- section third end --}}

<div class="ai-upload-latest-designs">
    <h3 class="font22">{{ trans('content.latest_designs') }}</h3>
    <div class="latest-designs-info">{{ trans('content.latest_designs_info') }}</div>
    <div class="ai-upload-latest-wrapper row" id="all_data0_sky-color">

    </div>
</div>
    <script>
        function selectSkyColor(skyValue) {
            document.getElementById('weather0').value = skyValue;
        }
    </script>
