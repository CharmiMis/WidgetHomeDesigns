{{-- section first start --}}
<div>
    <div class="ai-tool-right-top top-menu-bar-first">
        {{-- <h3 class="font22">Redesign</h3> --}}
        <ul>
            <li class="active first_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Upload image</span>
            </li>
            <li class="second_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Select what to edit</span>
            </li>
            <li class="second_tab_active">
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
            <h2>Redesign Your Space Instantly!</h2>
            <p>Ideal for quick makeovers, our Redesign Mode provides a streamlined, easy-to-use solution for achieving a
                fresh new look without the hassle. Choose from three dynamic sub-types—Creative Redesign, Beautiful
                Redesign, and Sketch-to-Render—to breathe new life into your house interiors, exteriors, gardens, or
                patios.</p>
        </div>
        <div class="gs-dashboard-cross">
            <img src="{{ asset('webWidget/images/cross-icon.svg') }}">
            <img class="light-mode" src="{{ asset('webWidget/images/light-mode/cross-icon.svg') }}">
        </div>
    </div>

    <div class="image-background-container upload-image-container">
        <div class="ai-upload-image">
            <input type="file" class="ai-upload-input select-file dimg-picker" id="fileselect0" data-section="0">
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
    <div class="ai-tool-right-top top-menu-bar-second" id="viewImage" style="display: none">
        <div class="ai-tool-right-back-btn">
            {{-- <a href="javascript:void(0)" class="gs-back-btn previous_page">
                <img src="{{ asset('webWidget/images/back-btn-icon.svg') }}">
                <img class="light-mode" src="{{ asset('webWidget/images/light-mode/back-btn-icon.svg') }}">
            </a> --}}
            {{-- <h3 class="font22">Redesign</h3> --}}
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
            <li class="active second_tab_active">
                <div class="ai-tool-right-steps"></div>
                <span>Customise and Generate</span>
            </li>
        </ul>
    </div>

    <div class="image-show-container image-mask-container">
        <div class="gs-what-to-edit-wrapper">
            <div class="gs-what-to-edit-left image-mask-container" style="display: none">
                <input type="hidden" name="image_type" id="input_img_typ">
                <input type="hidden" name="image" id="input_image">
                <div class="gs-what-to-edit-leftimg" id="gallery0">
                    <img id="im">
                </div>
                <div class="gs-what-to-edit-tips">
                    <div class="gs-what-to-edit-tip-box">
                        <div class="gs-what-to-edit-tip-right">
                            <p>Click on ‘Your Custom settings’ to give specific instructions to our AI.</p>
                        </div>
                    </div>
                    <div class="gs-what-to-edit-tip-box">
                        <div class="gs-what-to-edit-tip-right">
                            <p>In Beautiful Redesign, our AI generates fast and beautiful results, but has less freedom
                                to add or remove objects.</p>
                        </div>
                    </div>
                    <div class="gs-what-to-edit-tip-box">
                        <div class="gs-what-to-edit-tip-right">
                            <p>Use Sketch-to-Render mode type to turn raw drawings into photorealistic renders.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gs-what-to-edit-right segment-masking-container" style="display: none">
                <div class="gs-select-category">
                    <p class="font14">Select what you want to generate</p>
                    <div class="gs-select-category-list">
                        <ul class="gs-option-flex">
                            <li class="active on-gen-disable">
                                <a class="gs-select-category-list-inner" data-toggle="tab" href="#interior"
                                    onclick="loadWidgetRenders(0)">
                                    <img src="{{ asset('webWidget/images/gs-interior-icon.svg') }}">
                                    <span>Interior</span>
                                </a>
                            </li>
                            <li class="on-gen-disable">
                                <a class="gs-select-category-list-inner" data-toggle="tab" href="#exterior"
                                    onclick="loadWidgetRenders(1)">
                                    <img src="{{ asset('webWidget/images/gs-exterior-icon.svg') }}">
                                    <span>Exterior</span>
                                </a>
                            </li>
                            <li class="on-gen-disable">
                                <a class="gs-select-category-list-inner" data-toggle="tab" href="#garden"
                                    onclick="loadWidgetRenders(2)">
                                    <img src="{{ asset('webWidget/images/gs-garden-icon.svg') }}">
                                    <span>Garden</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div id="interior" class="tab-pane fade in active">
                        <div class="gs-what-to-edit-tabs">
                            <div class="gs-what-to-edit-title">
                                <ul>
                                    <li class="active"><a data-toggle="tab" href="#our-preset-settings-interior-redesign">Our
                                            preset settings</a></li>
                                    <li><a data-toggle="tab" href="#your-customs-settings-interior-redesign">Your customs
                                            settings </a></li>
                                </ul>
                            </div>
                            <div class="gs-what-to-edit-content">
                                <div class="tab-content">
                                    <div id="our-preset-settings-interior-redesign" class="tab-pane show fade in active">
                                        <div class="gs-select-automatically">
                                            <div class="gs-our-preset-settings ">
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedRoomType0-redesign"
                                                        name="selectedRoomType0">
                                                    <p>1. Select Room Type <a href="javascript:void(0)"
                                                            id="viewAllRoomTypes" data-toggle="modal"
                                                            data-target="#view_all_interior_room_type">View All</a></p>
                                                    <div class="gs-select-room-style-row" id="roomTypeDisplay0-redesign">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Living Room"
                                                            onclick="selectRoomType('Living Room',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/living room.png">
                                                            <span>Living Room</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Bedroom"
                                                            onclick="selectRoomType('Bedroom',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bedroom.png">
                                                            <span>Bedroom</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Bathroom"
                                                            onclick="selectRoomType('Bathroom',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bathroom.png">
                                                            <span>Bathroom</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Kitchen"
                                                            onclick="selectRoomType('Kitchen',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/kitchen.png">
                                                            <span>Kitchen</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedDesignStyle0-redesign"
                                                        name="selectedDesignStyle0">
                                                    <p>2. Select Design Style <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_interior_choose_design">View All</a>
                                                    </p>
                                                    <div class="gs-select-room-style-row" id="designStyleDisplay0-redesign">
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Eclectic"
                                                            onclick="selectDesignStyle('Eclectic',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/eclectic.png">
                                                            <span>Eclectic</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Contemporary"
                                                            onclick="selectDesignStyle('Contemporary',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/contemporary.png">
                                                            <span>Contemporary</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Transitional"
                                                            onclick="selectDesignStyle('Transitional',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/transitional.png">
                                                            <span>Transitional</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Scandinavian"
                                                            onclick="selectDesignStyle('Scandinavian',0)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/scandinavian.png">
                                                            <span>Scandinavian</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedModeType0"
                                                        name="selectedModeType0">
                                                    <p>3. Select Mode Type</p>
                                                    <div class="gs-select-room-style-row" id="modeTypeDisplay0">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Beautiful Redesign"
                                                            onclick="selectModeType('Beautiful Redesign',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/select-room-type10.png">
                                                            <span>Beautiful Redesign</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Creative Redesign"
                                                            onclick="selectModeType('Creative Redesign',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/select-room-type11.png">
                                                            <span>Creative Redesign</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Sketch to Render"
                                                            onclick="selectModeType('Sketch to Render',0)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/Sketch to Render.png">
                                                            <span>Sketch to Render</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="nwchoice-toggle" style="margin-top: 15px !important">
                                                <span class="nw-tgtype">Private Gallery </span>
                                                <input type="checkbox" id="nwtoggle0" onchange="loadWidgetRenders(0)"
                                                    @checked($default_gallery == 'public')>
                                                <label class="nwtoggle-label0" for="nwtoggle0">Toggle</label>
                                                <span class="nw-tgtype">Public Gallery</span>
                                            </div> --}}
                                            <div class="our-preset-settings-range-outer">
                                                <input type="hidden" id="strength0" name="strength0"
                                                    value="mid" />
                                                <div class="d-flex align-items-center">
                                                    <p class="font14">AI Intervention</p>
                                                    <div class="gs-tutorials-toolnip">
                                                        <img src="{{ asset('webWidget/images/tutorail-wraning.svg') }}"
                                                            alt="">
                                                        <div class="ai-upload-option-tooltip">
                                                            <span>Control the number of changes you want the AI to make
                                                                to your upload. For the best results, leave this option
                                                                to MEDIUM. You can try with LOW and EXTREME if you don't
                                                                get good results with MEDIUM.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-design our-preset-range-design">
                                                    <div class="ai-intervention" data-sec="0">
                                                    </div>
                                                    <div class="our-preset-settings-range-list">
                                                        <ul>
                                                            <li>Very Low</li>
                                                            <li>Low</li>
                                                            <li>Medium</li>
                                                            <li>Extreme</li>
                                                        </ul>
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
                                            <div class="gs-continue-btn-outer">
                                                <a href="javascript:void(0)" onclick="_generateDesign(0, this)"
                                                    class="gs-continue-btn"><img
                                                        src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                    Generate New Designs
                                                    <span id="submit" style="display:none">
                                                        <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="your-customs-settings-interior-redesign" class="tab-pane show fade">
                                        <div class="our-preset-settings-box">

                                            <label class="our-preset-prompt-text">Type your custom instructions below
                                                and our AI will take them into account when generating your designs:
                                                <input type="checkbox" id="nwcust0" class="ms-1 ck_inst" checked
                                                    onchange="customInstruction(0)"></label>
                                            <textarea
                                                placeholder="e.g. A clean-looking living room with black and yellow textures and a coffee table made from hardwood."
                                                name="cust-inst0" id="custom_instruction0" class=""></textarea>
                                        </div>

                                        <div class="our-preset-settings-range-outer">
                                            <div class="d-flex align-items-center">
                                                <p class="font14">AI Intervention</p>
                                                <div class="gs-tutorials-toolnip">
                                                    <img src="{{ asset('webWidget/images/tutorail-wraning.svg') }}"
                                                        alt="">
                                                    <div class="ai-upload-option-tooltip">
                                                        <span>Control the number of changes you want the AI to make to
                                                            your upload. For the best results, leave this option to
                                                            MEDIUM. You can try with LOW and EXTREME if you don't get
                                                            good results with MEDIUM.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-select-design our-preset-range-design">
                                                <div class="ai-intervention" data-sec="0">
                                                </div>
                                                <div class="our-preset-settings-range-list">
                                                    <ul>
                                                        <li>Very Low</li>
                                                        <li>Low</li>
                                                        <li>Medium</li>
                                                        <li>Extreme</li>
                                                    </ul>
                                                </div>
                                            </div>
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
                                        <div class="gs-continue-btn-outer">
                                            <a href="javascript:void(0)" onclick="_generateDesign(0, this)"
                                                class="gs-continue-btn"><img
                                                    src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
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
                    <div id="exterior" class="tab-pane fade">
                        <div class="gs-what-to-edit-tabs">
                            <div class="gs-what-to-edit-title">
                                <ul>
                                    <li class="active"><a data-toggle="tab" href="#our-preset-settings-exterior-redesign">Our
                                            preset settings</a></li>
                                    <li><a data-toggle="tab" href="#your-customs-settings-exterior-redesign">Your customs
                                            settings </a></li>
                                </ul>
                            </div>
                            <div class="gs-what-to-edit-content">
                                <div class="tab-content">
                                    <div id="our-preset-settings-exterior-redesign" class="tab-pane show fade in active">
                                        <div class="gs-select-automatically">
                                            <div class="gs-our-preset-settings ">
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedRoomType1-redesign"
                                                        name="selectedRoomType1">
                                                    <p>1. Select House Angle
                                                    </p>
                                                    <div class="gs-select-room-style-row" id="roomTypeDisplay1-redesign">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Side of House"
                                                            onclick="selectRoomType('Side of House',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/types/side of the house.png">
                                                            <span>Side of House</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Front of House"
                                                            onclick="selectRoomType('Front of House',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/types/front of the house.png">
                                                            <span>Front of House</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Back of House"
                                                            onclick="selectRoomType('Back of House',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/types/back of the house.png">
                                                            <span>Back of House</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedDesignStyle1-redesign"
                                                        name="selectedDesignStyle1">
                                                    <p>2. Select Design Style <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_exterior_choose_design">View All</a>
                                                    </p>
                                                    <div class="gs-select-room-style-row" id="designStyleDisplay1-redesign">
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Modern"
                                                            onclick="selectDesignStyle('Modern',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/modern.png">
                                                            <span>Modern</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Mediterranean"
                                                            onclick="selectDesignStyle('Mediterranean',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/mediterranean.png">
                                                            <span>Mediterranean</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="International"
                                                            onclick="selectDesignStyle('International',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/international.png">
                                                            <span>International</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Moody Colors"
                                                            onclick="selectDesignStyle('Moody Colors',1)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/moody colors.png">
                                                            <span>Moody Colors</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedModeType1"
                                                        name="selectedModeType1">
                                                    <p>3. Select Mode Type </p>
                                                    <div class="gs-select-room-style-row" id="modeTypeDisplay1">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Beautiful Redesign"
                                                            onclick="selectModeType('Beautiful Redesign',1)">
                                                            <img
                                                                src="{{ asset('webWidget/images/select-room-type10.png') }}">
                                                            <span>Beautiful Redesign</span>
                                                        </div>
                                                         <div class="gs-select-room-style-single"
                                                            data-room-type="Creative Redesign"
                                                            onclick="selectModeType('Creative Redesign',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/select-room-type11.png">
                                                            <span>Creative Redesign</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Sketch to Render"
                                                            onclick="selectModeType('Sketch to Render',1)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/Sketch to Render.png">
                                                            <span>Sketch to Render</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="nwchoice-toggle" style="margin-top: 15px !important">
                                                <span class="nw-tgtype">Private Gallery </span>
                                                <input type="checkbox" id="nwtoggle1" onchange="loadWidgetRenders(1)"
                                                    @checked($default_gallery == 'public')>
                                                <label class="nwtoggle-label1" for="nwtoggle1">Toggle</label>
                                                <span class="nw-tgtype">Public Gallery</span>
                                            </div> --}}
                                            <div class="our-preset-settings-range-outer">
                                                <input type="hidden" id="strength1" name="strength1"
                                                    value="mid" />
                                                <div class="d-flex align-items-center">
                                                    <p class="font14">AI Intervention</p>
                                                    <div class="gs-tutorials-toolnip">
                                                        <img src="{{ asset('webWidget/images/tutorail-wraning.svg') }}"
                                                            alt="">
                                                        <div class="ai-upload-option-tooltip">
                                                            <span>Control the number of changes you want the AI to make
                                                                to your upload. For the best results, leave this option
                                                                to MEDIUM. You can try with LOW and EXTREME if you don't
                                                                get good results with MEDIUM.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-design our-preset-range-design">
                                                    <div class="ai-intervention" data-sec="1">
                                                    </div>
                                                    <div class="our-preset-settings-range-list">
                                                        <ul>
                                                            <li>Very Low</li>
                                                            <li>Low</li>
                                                            <li>Medium</li>
                                                            <li>Extreme</li>
                                                        </ul>
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
                                            <div class="gs-continue-btn-outer">
                                                <a href="javascript:void(0)" onclick="_generateDesign(1, this)"
                                                    class="gs-continue-btn"><img
                                                        src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                    Generate New Designs
                                                    <span id="submit" style="display:none">
                                                        <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="your-customs-settings-exterior-redesign" class="tab-pane show fade">
                                        <div class="our-preset-settings-box">

                                            <label class="our-preset-prompt-text">Type your custom instructions below
                                                and our AI will take them into account when generating your designs:
                                                <input type="checkbox" id="nwcust1" class="ms-1 ck_inst" checked
                                                    onchange="customInstruction(1)"></label>
                                            <textarea
                                                placeholder="e.g. A clean-looking living room with black and yellow textures and a coffee table made from hardwood."
                                                name="cust-inst1" id="custom_instruction1" class=""></textarea>
                                        </div>

                                        <div class="our-preset-settings-range-outer">
                                            <div class="d-flex align-items-center">
                                                <p class="font14">AI Intervention</p>
                                                <div class="gs-tutorials-toolnip">
                                                    <img src="{{ asset('webWidget/images/tutorail-wraning.svg') }}"
                                                        alt="">
                                                    <div class="ai-upload-option-tooltip">
                                                        <span>Control the number of changes you want the AI to make to
                                                            your upload. For the best results, leave this option to
                                                            MEDIUM. You can try with LOW and EXTREME if you don't get
                                                            good results with MEDIUM.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-select-design our-preset-range-design">
                                                <div class="ai-intervention" data-sec="1">
                                                </div>
                                                <div class="our-preset-settings-range-list">
                                                    <ul>
                                                        <li>Very Low</li>
                                                        <li>Low</li>
                                                        <li>Medium</li>
                                                        <li>Extreme</li>
                                                    </ul>
                                                </div>
                                            </div>
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
                                        <div class="gs-continue-btn-outer">
                                            <a href="javascript:void(0)" onclick="_generateDesign(1, this)"
                                                class="gs-continue-btn"><img
                                                    src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
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
                    <div id="garden" class="tab-pane fade">
                        <div class="gs-what-to-edit-tabs">
                            <div class="gs-what-to-edit-title">
                                <ul>
                                    <li class="active"><a data-toggle="tab" href="#our-preset-settings-garden-redesign">Our
                                            preset settings</a></li>
                                    <li><a data-toggle="tab" href="#your-customs-settings-garden-redesign">Your customs
                                            settings </a></li>
                                </ul>
                            </div>
                            <div class="gs-what-to-edit-content">
                                <div class="tab-content">
                                    <div id="our-preset-settings-garden-redesign" class="tab-pane show fade in active">
                                        <div class="gs-select-automatically">
                                            <div class="gs-our-preset-settings ">
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedRoomType2-redesign"
                                                        name="selectedRoomType2">
                                                    <p>1. Select Garden Type
                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#view_all_garden_type">View All</a>
                                                    </p>
                                                    <div class="gs-select-room-style-row" id="roomTypeDisplay2-redesign">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Backyard"
                                                            onclick="selectRoomType('Backyard',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/backyard.png">
                                                            <span>Backyard</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Patio"
                                                            onclick="selectRoomType('Patio',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/patio.png">
                                                            <span>Patio</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Terrace"
                                                            onclick="selectRoomType('Terrace',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/terrace.png">
                                                            <span>Terrace</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Front Yard"
                                                            onclick="selectRoomType('Front Yard',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/front-yard.png">

                                                            <span>Front Yard</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedDesignStyle2-redesign"
                                                        name="selectedDesignStyle2">
                                                    <p>2. Select Design Style <a href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#view_all_garden_style">View All</a></p>
                                                    <div class="gs-select-room-style-row" id="designStyleDisplay2-redesign">
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Modern"
                                                            onclick="selectDesignStyle('Modern',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/modern.png">
                                                            <span>Modern</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="City"
                                                            onclick="selectDesignStyle('City',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/city.png">
                                                            <span>City</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Contemporary"
                                                            onclick="selectDesignStyle('Contemporary',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/contemporary.png">
                                                            <span>Contemporary</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-design-style="Luxury"
                                                            onclick="selectDesignStyle('Luxury',2)">
                                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/design styles/luxury.png">
                                                            <span>Luxury</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-room-style">
                                                    <input type="hidden" id="selectedModeType2"
                                                        name="selectedModeType2">
                                                    <p>3. Select Mode Type </p>
                                                    <div class="gs-select-room-style-row" id="modeTypeDisplay2">
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Beautiful Redesign"
                                                            onclick="selectModeType('Beautiful Redesign',2)">
                                                            <img
                                                                src="{{ asset('webWidget/images/select-room-type10.png') }}">
                                                            <span>Beautiful Redesign</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Creative Redesign"
                                                            onclick="selectModeType('Creative Redesign',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/select-room-type11.png">
                                                            <span>Creative Redesign</span>
                                                        </div>
                                                        <div class="gs-select-room-style-single"
                                                            data-room-type="Sketch to Render"
                                                            onclick="selectModeType('Sketch to Render',2)">
                                                            <img
                                                                src="https://homedesigns-ai.b-cdn.net/web2/images/Sketch to Render.png">
                                                            <span>Sketch to Render</span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            {{-- <div class="nwchoice-toggle" style="margin-top: 15px !important">
                                                <span class="nw-tgtype">Private Gallery </span>
                                                <input type="checkbox" id="nwtoggle2" onchange="loadWidgetRenders(2)"
                                                    @checked($default_gallery == 'public')>
                                                <label class="nwtoggle-label2" for="nwtoggle2">Toggle</label>
                                                <span class="nw-tgtype">Public Gallery</span>
                                            </div> --}}
                                            <div class="our-preset-settings-range-outer">
                                                <input type="hidden" id="strength2" name="strength2"
                                                    value="mid" />
                                                <div class="d-flex align-items-center">
                                                    <p class="font14">AI Intervention</p>
                                                    <div class="gs-tutorials-toolnip">
                                                        <img src="{{ asset('webWidget/images/tutorail-wraning.svg') }}"
                                                            alt="">
                                                        <div class="ai-upload-option-tooltip">
                                                            <span>Control the number of changes you want the AI to make
                                                                to your upload. For the best results, leave this option
                                                                to MEDIUM. You can try with LOW and EXTREME if you don't
                                                                get good results with MEDIUM.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gs-select-design our-preset-range-design">
                                                    <div class="ai-intervention" data-sec="2">
                                                    </div>
                                                    <div class="our-preset-settings-range-list">
                                                        <ul>
                                                            <li>Very Low</li>
                                                            <li>Low</li>
                                                            <li>Medium</li>
                                                            <li>Extreme</li>
                                                        </ul>
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
                                            <div class="gs-continue-btn-outer">
                                                <a href="javascript:void(0)" onclick="_generateDesign(2, this)"
                                                    class="gs-continue-btn"><img
                                                        src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
                                                    Generate New Designs
                                                    <span id="submit" style="display:none">
                                                        <i class="fa fa-spinner fa-spin m-0" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="your-customs-settings-garden-redesign" class="tab-pane show fade">
                                        <div class="our-preset-settings-box">

                                            <label class="our-preset-prompt-text">Type your custom instructions below
                                                and our AI will take them into account when generating your designs:
                                                <input type="checkbox" id="nwcust2" class="ms-1 ck_inst" checked
                                                    onchange="customInstruction(2)"></label>
                                            <textarea
                                                placeholder="e.g. A clean-looking living room with black and yellow textures and a coffee table made from hardwood."
                                                name="cust-inst2" id="custom_instruction2" class=""></textarea>
                                        </div>

                                        <div class="our-preset-settings-range-outer">
                                            <div class="d-flex align-items-center">
                                                <p class="font14">AI Intervention</p>
                                                <div class="gs-tutorials-toolnip">
                                                    <img src="{{ asset('webWidget/images/tutorail-wraning.svg') }}"
                                                        alt="">
                                                    <div class="ai-upload-option-tooltip">
                                                        <span>Control the number of changes you want the AI to make to
                                                            your upload. For the best results, leave this option to
                                                            MEDIUM. You can try with LOW and EXTREME if you don't get
                                                            good results with MEDIUM.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-select-design our-preset-range-design">
                                                <div class="ai-intervention" data-sec="2">
                                                </div>
                                                <div class="our-preset-settings-range-list">
                                                    <ul>
                                                        <li>Very Low</li>
                                                        <li>Low</li>
                                                        <li>Medium</li>
                                                        <li>Extreme</li>
                                                    </ul>
                                                </div>
                                            </div>
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
                                        <div class="gs-continue-btn-outer">
                                            <a href="javascript:void(0)" onclick="_generateDesign(2, this)"
                                                class="gs-continue-btn"><img
                                                    src="{{ asset('webWidget/images/gs-generate-new-design.svg') }}">
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
    {{-- section second end --}}

    <div class="ai-upload-latest-designs">
        <h3 class="font22">Latest Designs</h3>
        <div class="ai-upload-latest-wrapper row" id="all_data0_redesign">

        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        console.log('here');
        loadWidgetRenders(0);
    });

    function loadWidgetRenders(sec) {
        console.log('sec',sec);
        // Retrieve the designs array from localStorage
        let storedDesigns = JSON.parse(localStorage.getItem('designs')) || [];
        console.log('storedDesigns',storedDesigns);

        // Check if there are any stored designs
        if (storedDesigns.length > 0) {
            // Get the container where images will be displayed
            let dataContainer = document.getElementById('all_data0_redesign');

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
                dataContainer.innerHTML = '<p style="color: #2e2424;">No designs found for this section.</p>';
            }
        } else {
            console.log("No designs found in localStorage.");
        }
    }
</script>
