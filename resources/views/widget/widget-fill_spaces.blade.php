{{-- section first start --}}
<div>
    <div class="ai-tool-right-top top-menu-bar-first">
        {{-- <h3 class="font22">Fill Spaces</h3> --}}
        <ul>
            <li class="active first_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Upload image</span>
            </li>
            <li class="second_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Select what to edit</span>
            </li>
            <li class="third_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Customise and Generate</span>
            </li>
        </ul>
        {{-- <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            <span>Log Out</span>
        </a>
    </form> --}}
    </div>

    <div class="gs-dashboard-notice upload-image-container">
        <div class="gs-dashboard-notice-info">
            <img src="{{ asset('webWidget/images/info-icon.svg') }}">
        </div>
        <div class="gs-dashboard-notice-info-text">
            <h2>Fill Empty Spaces with Furniture and Decor!</h2>
            <p>Furnish and decorate your empty rooms with our Fill Spaces mode. Using state-of-the-art AI, this tool
                helps you transform vacant areas into beautifully styled spaces tailored to your preferences. Whether
                you’re designing an empty living room, bedroom, or patio, Fill Spaces adds the perfect furniture and
                decor in seconds.</p>
        </div>
        <div class="gs-dashboard-cross">
            <img src="{{ asset('webWidget/images/cross-icon.svg') }}">
            <img class="light-mode" src="{{ asset('webWidget/images/light-mode/cross-icon.svg') }}">
        </div>
    </div>
    <div class="image-background-container upload-image-container">
        <div class="ai-upload-image">
            <input type="file" class="ai-upload-input" id="ipFilePickerFillSpaces">
            <h3 class="font22">Upload your image </h3>
            <!-- <img src="{{ asset('webWidget/images/gs-upload-img.png') }}"> -->
            <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.0057 21.4075C14.5988 21.4075 11.8418 18.6506 11.8418 15.2436C11.8418 11.8367 14.5988 9.07973 18.0057 9.07973C21.4127 9.07973 24.1696 11.8367 24.1696 15.2436C24.1696 18.6506 21.4127 21.4075 18.0057 21.4075ZM18.0057 12.4419C16.4592 12.4419 15.204 13.697 15.204 15.2436C15.204 16.7902 16.4592 18.0454 18.0057 18.0454C19.5523 18.0454 20.8075 16.7902 20.8075 15.2436C20.8075 13.697 19.5523 12.4419 18.0057 12.4419Z" fill="var(--dark-primary)"/>
<path d="M31.4542 48.3045H18.0057C5.83485 48.3045 0.634766 43.1044 0.634766 30.9335V17.485C0.634766 5.31416 5.83485 0.114075 18.0057 0.114075H26.9714C27.8904 0.114075 28.6525 0.876156 28.6525 1.79514C28.6525 2.71412 27.8904 3.4762 26.9714 3.4762H18.0057C7.67281 3.4762 3.99689 7.15212 3.99689 17.485V30.9335C3.99689 41.2665 7.67281 44.9424 18.0057 44.9424H31.4542C41.7871 44.9424 45.4631 41.2665 45.4631 30.9335V19.7265C45.4631 18.8075 46.2251 18.0454 47.1441 18.0454C48.0631 18.0454 48.8252 18.8075 48.8252 19.7265V30.9335C48.8252 43.1044 43.6251 48.3045 31.4542 48.3045Z" fill="var(--dark-primary)"/>
<path d="M38.1785 16.9246C37.2595 16.9246 36.4974 16.1625 36.4974 15.2435V1.795C36.4974 1.12258 36.9009 0.494981 37.5285 0.248425C38.1561 0.00186929 38.8733 0.136354 39.3664 0.607051L43.8492 5.08988C44.4993 5.73989 44.4993 6.81577 43.8492 7.46578C43.1992 8.11579 42.1234 8.11579 41.4733 7.46578L39.8595 5.85196V15.2435C39.8595 16.1625 39.0974 16.9246 38.1785 16.9246Z" fill="var(--dark-primary)"/>
<path d="M33.6954 7.95889C33.2695 7.95889 32.8437 7.80199 32.5075 7.46578C31.8575 6.81577 31.8575 5.73989 32.5075 5.08988L36.9903 0.607051C37.6403 -0.0429589 38.7164 -0.042959 39.3664 0.607051C40.0164 1.25706 40.0162 2.33294 39.3662 2.98295L34.8834 7.46578C34.5471 7.80199 34.1213 7.95889 33.6954 7.95889Z" fill="var(--dark-primary)"/>
<path d="M3.81713 41.4684C3.27919 41.4684 2.74125 41.1994 2.42745 40.7287C1.91192 39.9667 2.11365 38.9132 2.87573 38.3977L13.9259 30.9786C16.3466 29.3648 19.6863 29.5441 21.8829 31.4045L22.6226 32.0545C23.7433 33.0183 25.6485 33.0183 26.7468 32.0545L36.0711 24.0526C38.447 22.0129 42.1902 22.0129 44.5885 24.0526L48.242 27.1906C48.9368 27.7958 49.0265 28.8492 48.4213 29.5665C47.8161 30.2613 46.7402 30.351 46.0454 29.7458L42.3919 26.6078C41.2712 25.644 39.3884 25.644 38.2677 26.6078L28.9434 34.6097C26.5675 36.6494 22.8243 36.6494 20.426 34.6097L19.6863 33.9597C18.6553 33.0855 16.9518 32.9959 15.8087 33.7803L4.78094 41.1994C4.46714 41.3787 4.13092 41.4684 3.81713 41.4684Z" fill="var(--dark-primary)"/>
</svg>
            <span>Drag and drop your image </span>
            <a href="#">Or click here to upload</a>
        </div>
    </div>
    {{-- section first end --}}

    {{-- section second start --}}
    <div class="ai-tool-right-top top-menu-bar-second" style="display: none">
        <div class="ai-tool-right-back-btn">
            <a href="javascript:void(0)" class="gs-back-btn previous_page">
                <img src="{{ asset('webWidget/images/back-btn-icon.svg') }}">
                <img class="light-mode" src="{{ asset('webWidget/images/light-mode/back-btn-icon.svg') }}">
            </a>
            {{-- <h3 class="font22">Fill Spaces</h3> --}}
        </div>
        <ul>
            <li class="active first_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Upload image</span>
            </li>
            <li class="active second_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Select what to edit</span>
            </li>
            <li class="third_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Customise and Generate</span>
            </li>
        </ul>
        {{-- <div class="color_mode">
        <input type="checkbox" id="toggle-btn-2" class="toggle-btn" {{ auth()->user()->light_mode == 0 ? 'checked' : '' }}>
        <label for="toggle-btn-2"></label>
    </div> --}}
    </div>

    <div class="ai-tool-right-top top-menu-bar-third" style="display: none">
        <div class="ai-tool-right-back-btn">
            <a href="javascript:void(0)" class="gs-back-btn previous_page">
                <img src="{{ asset('webWidget/images/back-btn-icon.svg') }}">
                <img class="light-mode" src="{{ asset('webWidget/images/light-mode/back-btn-icon.svg') }}">
            </a>
            {{-- <h3 class="font22">Fill Spaces</h3> --}}
        </div>
        <ul>
            <li class="active first_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Upload image</span>
            </li>
            <li class="active second_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Select what to edit</span>
            </li>
            <li class="active third_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Customise and Generate</span>
            </li>
        </ul>
        {{-- <div class="color_mode">
        <input type="checkbox" id="toggle-btn-3" class="toggle-btn" {{ auth()->user()->light_mode == 0 ? 'checked' : '' }}>
        <label for="toggle-btn-3"></label>
    </div> --}}
    </div>

    <div class="image-show-container image-mask-container">
        <div class="gs-what-to-edit-wrapper">
            <div class="gs-what-to-edit-left image-mask-container image-mask-fillSpace">
                <div id="inpainting-stag-outer-fillSpace"
                    class="inpainting-stag-outer d-flex align-items-center justify-content-center">
                    <div id="painting-stag-fillSpace"></div>
                </div>
                <div class="gs-what-to-edit-tips">
                    <div class="gs-what-to-edit-tip-box">
                        <div class="gs-what-to-edit-tip-right">
                            <p>Use the automated selection, then fine-tune your selection with the manual brush.</p>
                        </div>
                    </div>
                    <div class="gs-what-to-edit-tip-box">
                        <div class="gs-what-to-edit-tip-right">
                            <p>Click ‘Refine Manually’ to adjust the brush size, shape, and behavior.</p>
                        </div>
                    </div>
                    <div class="gs-what-to-edit-tip-box">
                        <div class="gs-what-to-edit-tip-right">
                            <p>Only select the area that you want to change. Our AI will disregard non-selected areas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gs-what-to-edit-right segment-masking-container" style="display: none">
                <div class="gs-what-to-edit-tabs">
                    <div class="gs-what-to-edit-title">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#select-automatically-fillSpace">Select
                                    Automatically</a></li>
                            <li><a data-toggle="tab" href="#refine-manually-fillSpace">Refine Manually </a></li>
                        </ul>
                    </div>
                    <div class="gs-what-to-edit-content">
                        <div class="tab-content">
                            <div id="select-automatically-fillSpace" class="tab-pane show fade in active">
                                <div class="gs-select-automatically">
                                    <p>Automatically or manually select objects, with the ability to combine both
                                        methods.</p>
                                    <div class="gs-select-automatically-inner">
                                        <p>Select objects automatically</p>
                                        <div id="chkbox-segment-fillSpace" class="chkbox-segment"></div>
                                    </div>
                                    <div class="gs-continue-btn-outer">
                                        <a href="javascript:void(0)"
                                            class="gs-continue-btn continue-parameter">Continue</a>
                                    </div>
                                </div>
                            </div>
                            <div id="refine-manually-fillSpace" class="tab-pane show fade">
                                <div class="gs-select-manually-inner">
                                    <div class="gs-select-manually-top">
                                        <p>Edit manually using the brush</p>
                                        <input type="hidden" value="70" id="ip-brush-thickness-fillSpace" />
                                        <input class="gs-select-manually-value" type="text" id="amount-fillSpace" value="70"
                                            readonly="">
                                    </div>
                                    <div class="gs-select-design">
                                        <div class="gs-select-range"></div>
                                    </div>
                                    <div class="gs-refine-manually-links">
                                        <div class="gs-refine-manually-single">
                                            <input type="hidden" id="maskingCheckbox" value="true" />
                                            <a href="javascript:void(0)" id="removeMasking" class="removeMasking"
                                                onclick="toggleMasking(false)">Remove Masking</a>
                                            <a href="javascript:void(0)" id="addMasking"
                                                onclick="toggleMasking(true)" class="active addMasking">Add
                                                Masking</a>
                                        </div>
                                        <div class="gs-refine-manually-single">
                                            <input type="hidden" id="cursorCheckbox" value="false" />
                                            <a href="javascript:void(0)" onclick="toggleBrushingCursor(false)"
                                                class="active"><img
                                                    src="{{ asset('webWidget/images/circle-brush.svg') }}">
                                                Circle Brush</a>
                                            <a href="javascript:void(0)" onclick="toggleBrushingCursor(true)"><img
                                                    src="{{ asset('webWidget/images/square-brush.svg') }}">Square
                                                Brush</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="undo-redo-btn">
                                    <button class="ci-btn ci-btn-danger ip-clearImage" id="ip-clearImage"
                                        title="Clear All">
                                        <img src="{{ asset('web/images/deleteIcon.png') }}" width="25px"> Clear all
                                    </button>
                                    <button class="ci-btn ci-btn-danger ip-undoImage" id="ip-undoImage"
                                        title="Undo"><img src="{{ asset('web/images/undo.png') }}"
                                            width="25px"></button>
                                    <button class="ci-btn ci-btn-danger ip-redoImage" id="ip-redoImage"
                                        title="Redo"><img src="{{ asset('web/images/redo.png') }}"
                                            width="25px"></button>
                                </div>
                                <div class="gs-continue-btn-outer">
                                    <a href="javascript:void(0)"
                                        class="gs-continue-btn continue-parameter">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gs-what-to-edit-right category-container" style="display: none">
                <div class="gs-select-category">
                    <p class="font14">Select what you want to generate</p>
                    <div class="gs-select-category-list">
                        <ul class="gs-option-flex designs_tabs">
                            <li class="active on-gen-disable">
                                <a class="gs-select-category-list-inner" data-toggle="tab"
                                    href="#interior-fillSpace1" onclick="loadWidgetRenders(0)">
                                    <img src="{{ asset('webWidget/images/gs-interior-icon.svg') }}">
                                    <span>Interior</span>
                                </a>
                            </li>
                            <li class="on-gen-disable">
                                <a class="gs-select-category-list-inner" data-toggle="tab"
                                    href="#exterior-fillSpace1" onclick="loadWidgetRenders(1)">
                                    <img src="{{ asset('webWidget/images/gs-exterior-icon.svg') }}">
                                    <span>Exterior</span>
                                </a>
                            </li>
                            <li class="on-gen-disable">
                                <a class="gs-select-category-list-inner" data-toggle="tab" href="#garden-fillSpace1"
                                    onclick="loadWidgetRenders(2)">
                                    <img src="{{ asset('webWidget/images/gs-garden-icon.svg') }}">
                                    <span>Garden</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div id="interior-fillSpace1" class="tab-pane fade in active">
                        <div class="gs-what-to-edit-tabs">
                            <div class="gs-what-to-edit-title">
                                <ul>
                                    <li class="active"><a data-toggle="tab"
                                            href="#our-preset-settings-interior-fillSpace">Our
                                            preset settings</a></li>
                                    <li><a data-toggle="tab" href="#your-customs-settings-interior-fillSpace">Your
                                            customs
                                            settings </a></li>
                                </ul>
                            </div>
                            <div class="gs-what-to-edit-content">
                                <div class="tab-content">
                                    <div id="our-preset-settings-interior-fillSpace"
                                        class="tab-pane show fade in active">
                                        <div class="gs-select-automatically">
                                            {{-- <p>You can change the colors only, or also change textures, materials.</p> --}}
                                            <div class="gs-our-preset-settings ">
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedRoomType0-fillSpace"
                                                        name="selectedRoomType0">
                                                    <p>1. Select Room Type <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_interior_room_type">View All</a></p>
                                                    <div class="gs-select-room-style-row"
                                                        id="roomTypeDisplay0-fillSpace">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Living Room"
                                                            onclick="selectRoomType('Living Room',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/living room.png">
                                                            <span>Living Room</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Bedroom"
                                                            onclick="selectRoomType('Bedroom',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bedroom.png">
                                                            <span>Bedroom</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Bathroom"
                                                            onclick="selectRoomType('Bathroom',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bathroom.png">
                                                            <span>Bathroom</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Kitchen"
                                                            onclick="selectRoomType('Kitchen',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/kitchen.png">
                                                            <span>Kitchen</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedDesignStyle0-fillSpace"
                                                        name="selectedDesignStyle0">
                                                    <p>2. Select Design Style <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_interior_choose_design">View All</a>
                                                    </p>
                                                    <div class="gs-select-room-style-row"
                                                        id="designStyleDisplay0-fillSpace">
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Eclectic"
                                                            onclick="selectDesignStyle('Eclectic',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/eclectic.png">
                                                            <span>Eclectic</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Contemporary"
                                                            onclick="selectDesignStyle('Contemporary',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/contemporary.png">
                                                            <span>Contemporary</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Transitional"
                                                            onclick="selectDesignStyle('Transitional',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/transitional.png">
                                                            <span>Transitional</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Scandinavian"
                                                            onclick="selectDesignStyle('Scandinavian',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/scandinavian.png">
                                                            <span>Scandinavian</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="our-preset-settings-range-outer">
                                                <input type="hidden" id="no_of_des0" name="no_of_des0"
                                                    value="1" />
                                                <p class="font14">Select the number of designs you want to generate at
                                                    once.</p>
                                                <div class="gs-select-design our-preset-range-design">
                                                    <div class="our-preset-settings-range" data-sec="0">
                                                    </div>
                                                    <div class="our-preset-settings-range-list">
                                                        <ul>
                                                            <li>1</li>
                                                            <li>2</li>
                                                            <li>3</li>
                                                            <li>4</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-continue-btn-outer painting_generating_bt">
                                                <a href="javascript:void(0)"
                                                    onclick="_generateInPaintingDesign(0, this)"
                                                    id="generateDesignBtn0"
                                                    class="gs-continue-btn generateDesignBtn0">
                                                    <img
                                                        src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                    Generate New Designs
                                                    <span id="submit" style="display:none">
                                                        <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="your-customs-settings-interior-fillSpace" class="tab-pane show fade">
                                        <div class="our-preset-settings-box">
                                            <p class="our-preset-prompt-text">You can use a custom prompt below</p>
                                            <textarea placeholder="e.g. Scandinavian dining room design, beautiful, white colors" name="cust-inst0"
                                                id="custom_instruction0-fillSpace"></textarea>
                                        </div>
                                        <div class="our-preset-settings-range-outer">
                                            <p class="font14">Select the number of designs you want to generate at
                                                once.</p>
                                            <div class="gs-select-design our-preset-range-design">
                                                <div class="our-preset-settings-range" data-sec="0">
                                                </div>
                                                <div class="our-preset-settings-range-list">
                                                    <ul>
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gs-continue-btn-outer painting_generating_bt">
                                            <a href="javascript:void(0)" onclick="_generateInPaintingDesign(0, this)"
                                                id="generateDesignBtn0" class="gs-continue-btn generateDesignBtn0">
                                                <img src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                Generate New Designs
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
                    <div id="exterior-fillSpace1" class="tab-pane fade">
                        <div class="gs-what-to-edit-tabs">
                            <div class="gs-what-to-edit-title">
                                <ul>
                                    <li class="active"><a data-toggle="tab"
                                            href="#our-preset-settings-exterior-fillSpace1">Our
                                            preset settings</a></li>
                                    <li><a data-toggle="tab" href="#your-customs-settings-exterior-fillSpace1">Your
                                            customs
                                            settings </a></li>
                                </ul>
                            </div>
                            <div class="gs-what-to-edit-content">
                                <div class="tab-content">
                                    <div id="our-preset-settings-exterior-fillSpace1"
                                        class="tab-pane show fade in active">
                                        <div class="gs-select-automatically">
                                            {{-- <p>You can change the colors only, or also change textures, materials.</p> --}}
                                            <div class="gs-our-preset-settings ">
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedRoomType1-fillSpace"
                                                        name="selectedRoomType1">
                                                    <p>1. Select House Angle
                                                        <!-- <a href="javascript:void(0)"  data-toggle="modal" data-target="#view_all_exterior_room_type">View All</a> -->
                                                    </p>
                                                    <div class="gs-select-room-style-row"
                                                        id="roomTypeDisplay1-fillSpace">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Side of House"
                                                            onclick="selectRoomType('Side of House',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/types/side of the house.png">
                                                            <span>Side of House</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Front of House"
                                                            onclick="selectRoomType('Front of House',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/types/front of the house.png">
                                                            <span>Front of House</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Back of House"
                                                            onclick="selectRoomType('Back of House',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/types/back of the house.png">
                                                            <span>Back of House</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedDesignStyle1-fillSpace"
                                                        name="selectedDesignStyle1">
                                                    <p>2. Select Design Style <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_exterior_choose_design">View All</a>
                                                    </p>
                                                    <div class="gs-select-room-style-row"
                                                        id="designStyleDisplay1-fillSpace">
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Modern"
                                                            onclick="selectDesignStyle('Modern',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/modern.png">
                                                            <span>Modern</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Mediterranean"
                                                            onclick="selectDesignStyle('Mediterranean',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/mediterranean.png">
                                                            <span>Mediterranean</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="International"
                                                            onclick="selectDesignStyle('International',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/international.png">
                                                            <span>International</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Moody Colors"
                                                            onclick="selectDesignStyle('Moody Colors',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/moody colors.png">
                                                            <span>Moody Colors</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="our-preset-settings-range-outer">
                                                <input type="hidden" id="no_of_des1" name="no_of_des1"
                                                    value="1" />
                                                <p class="font14">Select the number of designs you want to generate at
                                                    once.</p>
                                                <div class="gs-select-design our-preset-range-design">
                                                    <div class="our-preset-settings-range" data-sec="1">
                                                    </div>
                                                    <div class="our-preset-settings-range-list">
                                                        <ul>
                                                            <li>1</li>
                                                            <li>2</li>
                                                            <li>3</li>
                                                            <li>4</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-continue-btn-outer painting_generating_bt">
                                                <a href="javascript:void(0)"
                                                    onclick="_generateInPaintingDesign(1, this)"
                                                    id="generateDesignBtn1"
                                                    class="gs-continue-btn generateDesignBtn1">
                                                    <img
                                                        src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                    Generate New Designs
                                                    <span id="submit" style="display:none">
                                                        <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="your-customs-settings-exterior-fillSpace1" class="tab-pane show fade">
                                        <div class="our-preset-settings-box">
                                            <p class="our-preset-prompt-text">You can use a custom prompt below</p>
                                            <textarea placeholder="e.g. Scandinavian dining room design, beautiful, white colors" name="cust-inst1"
                                                id="custom_instruction1-fillSpace"></textarea>
                                        </div>
                                        <div class="our-preset-settings-range-outer">
                                            <p class="font14">Select the number of designs you want to generate at
                                                once.</p>
                                            <div class="gs-select-design our-preset-range-design">
                                                <div class="our-preset-settings-range" data-sec="1">
                                                </div>
                                                <div class="our-preset-settings-range-list">
                                                    <ul>
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gs-continue-btn-outer painting_generating_bt">
                                            <a href="javascript:void(0)" onclick="_generateInPaintingDesign(1, this)"
                                                id="generateDesignBtn1" class="gs-continue-btn generateDesignBtn1">
                                                <img src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                Generate New Designs
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
                    <div id="garden-fillSpace1" class="tab-pane fade">
                        <div class="gs-what-to-edit-tabs">
                            <div class="gs-what-to-edit-title">
                                <ul>
                                    <li class="active"><a data-toggle="tab"
                                            href="#our-preset-settings-garden-color_swap">Our
                                            preset settings</a></li>
                                    <li><a data-toggle="tab" href="#your-customs-settings-garden-color_swap">Your
                                            customs
                                            settings </a></li>
                                </ul>
                            </div>
                            <div class="gs-what-to-edit-content">
                                <div class="tab-content">
                                    <div id="our-preset-settings-garden-color_swap"
                                        class="tab-pane show fade in active">
                                        <div class="gs-select-automatically">
                                            {{-- <p>You can change the colors only, or also change textures, materials.</p> --}}
                                            <div class="gs-our-preset-settings ">
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedRoomType2-fillSpace"
                                                        name="selectedRoomType2">
                                                    <p>1. Select Garden Type
                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#view_all_garden_type">View All</a>
                                                    </p>
                                                    <div class="gs-select-room-style-row"
                                                        id="roomTypeDisplay2-fillSpace">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Backyard"
                                                            onclick="selectRoomType('Backyard',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/backyard.png">
                                                            <span>Backyard</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Patio"
                                                            onclick="selectRoomType('Patio',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/patio.png">
                                                            <span>Patio</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Terrace"
                                                            onclick="selectRoomType('Terrace',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/terrace.png">
                                                            <span>Terrace</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Front Yard"
                                                            onclick="selectRoomType('Front Yard',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/front-yard.png">
                                                            <span>Front Yard</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedDesignStyle2-fillSpace"
                                                        name="selectedDesignStyle2">
                                                    <p>2. Select Design Style <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_garden_style">View All</a></p>
                                                    <div class="gs-select-room-style-row"
                                                        id="designStyleDisplay2-fillSpace">
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Modern"
                                                            onclick="selectDesignStyle('Modern',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/modern.png">
                                                            <span>Modern</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="City"
                                                            onclick="selectDesignStyle('City',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/city.png">
                                                            <span>City</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Contemporary"
                                                            onclick="selectDesignStyle('Contemporary',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/contemporary.png">
                                                            <span>Contemporary</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Luxury"
                                                            onclick="selectDesignStyle('Luxury',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/luxury.png">
                                                            <span>Luxury</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="our-preset-settings-range-outer">
                                                <input type="hidden" id="no_of_des2" name="no_of_des2"
                                                    value="1" />
                                                <p class="font14">Select the number of designs you want to generate at
                                                    once.</p>
                                                <div class="gs-select-design our-preset-range-design">
                                                    <div class="our-preset-settings-range" data-sec="2">
                                                    </div>
                                                    <div class="our-preset-settings-range-list">
                                                        <ul>
                                                            <li>1</li>
                                                            <li>2</li>
                                                            <li>3</li>
                                                            <li>4</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-continue-btn-outer painting_generating_bt">
                                                <a href="javascript:void(0)"
                                                    onclick="_generateInPaintingDesign(2, this)"
                                                    id="generateDesignBtn2"
                                                    class="gs-continue-btn generateDesignBtn2">
                                                    <img
                                                        src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                    Generate New Designs
                                                    <span id="submit" style="display:none">
                                                        <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="your-customs-settings-garden-color_swap" class="tab-pane show fade">
                                        <div class="our-preset-settings-box">
                                            <p class="our-preset-prompt-text">You can use a custom prompt below</p>
                                            <textarea placeholder="e.g. Scandinavian dining room design, beautiful, white colors" name="cust-inst2"
                                                id="custom_instruction2-fillSpace"></textarea>
                                        </div>
                                        <div class="our-preset-settings-range-outer">
                                            <p class="font14">Select the number of designs you want to generate at
                                                once.</p>
                                            <div class="gs-select-design our-preset-range-design">
                                                <div class="our-preset-settings-range" data-sec="2">
                                                </div>
                                                <div class="our-preset-settings-range-list">
                                                    <ul>
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gs-continue-btn-outer painting_generating_bt">
                                            <a href="javascript:void(0)" onclick="_generateInPaintingDesign(2, this)"
                                                id="generateDesignBtn2" class="gs-continue-btn generateDesignBtn2">
                                                <img src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                Generate New Designs
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
                </div>
            </div>
        </div>
    </div>

    <div class="ai-upload-latest-designs">
        <h3 class="font22">Latest Designs</h3>
        <div class="ai-upload-latest-wrapper row" id="all_data0_fillSpace">
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tensorflow/4.15.0/tf.min.js"
    integrity="sha512-RMW1ZrsUb7zY5+dY2sH+dOD3aPXpgQgWysvpyj+UtMani44bvq6Nj4HQ0tB/gdbG0gJb1BhapgYvUPNve0A6kQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        loadWidgetRenders(0);
    });

    function loadWidgetRenders(sec) {
        // Retrieve the designs array from localStorage
        let storedDesigns = JSON.parse(localStorage.getItem('in-painting-designs')) || [];

        // Check if there are any stored designs
        if (storedDesigns.length > 0) {
            // Get the container where images will be displayed
            let dataContainer = document.getElementById('all_data0_fillSpace');

            // Clear any existing content (optional, depending on how you want to handle reloading)
            dataContainer.innerHTML = '';

            // Filter the designs based on the provided 'sec' value
            let filteredDesigns = storedDesigns.filter(design => design.sec === sec);

            // Check if there are any designs after filtering
            if (filteredDesigns.length > 0) {
                // Iterate through the filtered designs and create the necessary HTML for each design
                filteredDesigns.forEach(design => {
                    // Create a new div element to wrap each design (based on your HTML structure)
                    let designDiv = document.createElement('div');
                    designDiv.classList.add('col-md-6', 'col-lg-4', 'col-12');

                    // Generate the HTML for the image and additional info (based on your provided structure)
                    designDiv.innerHTML = `
                        <div class="ai-upload-latest-single">
                            <div class="ai-upload-latest-after">
                                <div class="ai-upload-latest-inset">
                                    <img class="complte-img img" src="${design.generated_url}" data-item="output-image">
                                    <div class="ai-upload-effects">
                                        <ul class="render-overlay-data-box">
                                            <li class="render-overlay-data">Design Style: ${design.style}</li>
                                            <li class="render-overlay-data">Room Type: ${design.room_type}</li>
                                            <li class="render-overlay-data">Mode Type: ${design.mode}</li>
                                        </ul>
                                    </div>
                                    <div class="ai-upload-optons">
                                        <ul>
                                            <li class="ai-upload-add-project-list">
                                                <span class="ai-upload-option-tooltip">Download</span>
                                                <a class="download" href="javascript:void(0)" data-download-url="${design.generated_url}" title="Download" download>
                                                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon1.svg">
                                                </a>
                                            </li>
                                            <li class="ai-upload-add-project-list">
                                                <span class="ai-upload-option-tooltip">Show</span>
                                                <a class="ip_img_preview inpainting-preview" href="javascript:void(0)" data-img="${design.generated_url}"
                                                    data-item="preview-btn" title="Open" onclick="previewImage('${design.original_url}', '${design.generated_url}')">
                                                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/ai-upload-optons-icon2.svg">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    // Append the generated element to the container
                    dataContainer.appendChild(designDiv);
                });
            } else {
                // If no designs match the 'sec' value, display a message or handle the case
                //dataContainer.innerHTML = '<p style="color: #2e2424;">No designs found for this section.</p>';
            }
        } else {
            console.log("No designs found in localStorage.");
        }
    }

    function toggleMasking(value) {
        const maskingCheckbox = document.getElementById('maskingCheckbox');
        if (value) {
            maskingCheckbox.value = "true";
        } else {
            maskingCheckbox.value = "false";
        }
    }

    function toggleBrushingCursor(value) {
        removeCircleLoader();
        removeSquareLoader();
        const cursorCheckbox = document.getElementById('cursorCheckbox');
        cursorCheckbox.value = value ? "true" : "false";
        changeCursor();
        if (cursorCheckbox.value === "false") {
            showCircleLoaderForDuration(2000); // Show circle loader for 2000 milliseconds (2 seconds)
        } else {
            showSquareLoaderForDuration(2000); // Show square loader for 2000 milliseconds (2 seconds)
        }
    }
</script>
