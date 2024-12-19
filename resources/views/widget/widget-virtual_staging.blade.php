<div class="ai-tool-right-top top-menu-bar-first">
    <ul class="progress-bar-tab">
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
    <div>
    </div>
</div>
<div class="image-background-container upload-image-container">
    <div class="ai-upload-image">
        <input type="file" class="ai-upload-input" id="ipFilePickerFurnishEmptyRoom">
        <h3 class="font22">Upload your image </h3>
        <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-upload-img.png">
        <span>Drag and drop your image </span>
        <a href="#">Or click here to upload</a>
    </div>
</div>

{{-- section first end --}}

{{-- section second start --}}
<div class="ai-tool-right-top top-menu-bar-second" id="viewImage" style="display: none">
    <div class="ai-tool-right-back-btn">
        <a href="javascript:void(0)" class="gs-back-btn previous_page">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/back-btn-icon.svg">
            <img class="light-mode" src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/back-btn-icon.svg">
        </a>
    </div>
    <ul class="progress-bar-tab">
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
    <div>
    </div>
</div>

<div class="image-show-container image-mask-container" style="display: none">
    <div class="gs-what-to-edit-wrapper">
        <div class="gs-what-to-edit-left image-mask-container image-mask-furnish_empty_room" style="display: none">
           
            <div id="inpainting-stag-outer-furnish_empty_room"
                class="inpainting-stag-outer d-flex align-items-center justify-content-center">
                <div id="painting-stag-furnish_empty_room"></div>
            </div>
            <div class="gs-what-to-edit-tips">
                <div class="gs-what-to-edit-tip-box">
             
                    <div class="gs-what-to-edit-tip-right">
                        <p>Use the AI Intervention Slider to control the level of creativity. For subtle changes, set it
                            lower; for bold, innovative designs, move the slider higher.</p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
               
                    <div class="gs-what-to-edit-tip-right">
                        <p>Add specific instructions in the ‘Additional Instructions’ menu to tailor the AI’s redesign,
                            such as “Add modern art to the walls” or “Replace the rug with a minimalist design.”</p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>Start with the Redesign tool to make overall changes, then use Precision+ to fine-tune the
                            details. Seamlessly switch between tools using the gallery’s ‘Edit’ button.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gs-what-to-edit-right segment-masking-container" style="display: none">
            <div class="tab-content">
                <div id="interior" class="tab-pane fade in active">
                    <div class="gs-what-to-edit-tabs">
                        <div class="gs-what-to-edit-title">
                            <ul>
                                <li class="active"><a data-toggle="tab" href="#our-preset-settings-interior">Preset
                                        Settings</a></li>
                                <li><a data-toggle="tab" href="#your-customs-settings-interior">Additional
                                        Instructions</a></li>
                            </ul>
                        </div>
                        <div class="gs-what-to-edit-content">
                            <div class="tab-content">
                                <div id="our-preset-settings-interior" class="tab-pane show fade in active">
                                    <div class="gs-select-automatically">
                                        <div class="gs-our-preset-settings ">
                                            <div class="gs-select-room-style">
                                                <input type="hidden" id="selectedRoomType0-furnish_empty_room" name="selectedRoomType0">
                                                <p>1. Select Room Type <a href="javascript:void(0)"
                                                        id="viewAllRoomTypes" data-toggle="modal"
                                                        data-target="#view_all_interior_room_type">View All</a></p>
                                                <div class="gs-select-room-style-row" id="roomTypeDisplay0-furnish_empty_room">
                                                    <div class="gs-select-room-style-single"
                                                        data-room-type="Living Room"
                                                        onclick="selectRoomType('Living Room',0)">
                                                        <img
                                                            src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/living room.png">
                                                        <span>Living Room</span>
                                                    </div>
                                                    <div class="gs-select-room-style-single" data-room-type="Bedroom"
                                                        onclick="selectRoomType('Bedroom',0)">
                                                        <img
                                                            src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bedroom.png">
                                                        <span>Bedroom</span>
                                                    </div>
                                                    <div class="gs-select-room-style-single" data-room-type="Bathroom"
                                                        onclick="selectRoomType('Bathroom',0)">
                                                        <img
                                                            src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bathroom.png">
                                                        <span>Bathroom</span>
                                                    </div>
                                                    <div class="gs-select-room-style-single" data-room-type="Kitchen"
                                                        onclick="selectRoomType('Kitchen',0)">
                                                        <img
                                                            src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/kitchen.png">
                                                        <span>Kitchen</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gs-select-room-style">
                                                <input type="hidden" id="selectedDesignStyle0-furnish_empty_room"
                                                    name="selectedDesignStyle0">
                                                <p>2. Select Design Style <a href="javascript:void(0)"
                                                        data-toggle="modal"
                                                        data-target="#view_all_interior_choose_design">View All</a>
                                                </p>
                                                <div class="gs-select-room-style-row" id="designStyleDisplay0-furnish_empty_room">
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
                                    </div>
                                </div>
                                <div id="your-customs-settings-interior" class="tab-pane show fade">
                                    <div class="our-preset-settings-box">
                                        @if ($precisionUser == true)
                                            <label class="our-preset-prompt-text ips-bf-parent">Type your custom
                                                instructions below and our AI will take them into account when
                                                generating your designs:
                                                <input type="checkbox" id="nwcust0_furnish_empty_room" class="ms-1 ck_inst"
                                                    onchange="customInstruction(0)" disabled>
                                                &nbsp;&nbsp;&nbsp;<img
                                                    src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                                                <div class="ips-bf-child paid_feature_modal"></div>
                                            </label>
                                            <textarea
                                                placeholder="e.g. A clean-looking living room with black and yellow textures and a coffee table made from hardwood."
                                                name="cust-inst0" id="custom_instruction0-furnish_empty_room" class="hidden"></textarea>
                                        @else
                                            <label class="our-preset-prompt-text">Type your custom instructions below
                                                and our AI will take them into account when generating your designs:
                                                <input type="checkbox" id="nwcust0_furnish_empty_room" class="ms-1 ck_inst" checked
                                                    onchange="customInstruction(0)"></label>
                                            <textarea
                                                placeholder="e.g. A clean-looking living room with black and yellow textures and a coffee table made from hardwood."
                                                name="cust-inst0" id="custom_instruction0-furnish_empty_room" class=""></textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="our-preset-settings-range-outer">
                                    <input type="hidden" id="strength0" name="strength0" value="mid" />
                                    <div class="d-flex align-items-center">
                                        <p class="font14">AI Intervention</p>
                                        <div class="gs-tutorials-toolnip">
                                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/tutorail-wraning.svg"
                                                alt="">
                                            <div class="ai-upload-option-tooltip">
                                                <span>Control the number of changes you want the AI to make to your
                                                    upload. For the best results, leave this option to MEDIUM. You can
                                                    try with LOW and EXTREME if you don't get good results with
                                                    MEDIUM.</span>
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
                            
                                <div class="gs-continue-btn-outer redesign-generate-btn">
                                   
                                    <a href="javascript:void(0)" onclick="_generateInPaintingDesign(0, this)"
                                        class="gs-continue-btn"><img
                                            src="https://homedesigns-ai.b-cdn.net/web2/images/gs-generate-new-design.svg">
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
{{-- section second end --}}

<div class="ai-upload-latest-designs">
    <h3 class="font22">Latest Designs</h3>
    <div class="latest-designs-info">Check your latest designs below and save them to projects or to favorites.</div>
    <div class="gs-select-category redesign-designs-tabs">
        <div class="gs-select-category-list">
            
        </div>
    </div>
    <div class="tab-content">
        <div id="interior" class="tab-pane fade in active">
            <div class="ai-upload-latest-top" id="jumphere0">
                <h3 class="font22"></h3>
            </div>
            <div class="ai-upload-latest-wrapper row" id="all_data0_furnish_empty_room">

            </div>
        </div>
    </div>
</div>
