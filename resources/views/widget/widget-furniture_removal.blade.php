<div class="ai-tool-right-top top-menu-bar-first">
    <ul class="progress-bar-tab">
        <li class="active first_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>Upload image</span>
        </li>
        <li class="second_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>Select elements to remove</span>
        </li>
    </ul>
</div>
    <div class="gs-dashboard-notice upload-image-container">
        <div class="gs-dashboard-notice-info">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/info-icon.svg">
        </div>
        <div class="gs-dashboard-notice-info-text">
            <h2>Clear Your Space with a Click!</h2>
            <p>This mode allows you to quickly declutter and empty rooms, providing a clean canvas for your design ideas. Beyond just clearing rooms, this tool offers the precision to remove specific objects. Whether it's an old couch, a misplaced table, or any other unwanted item, our AI ensures its seamless removal while keeping key elements like windows and structural components intact.</p>
        </div>
        <div class="gs-dashboard-cross">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/cross-icon.svg">
            <img class="light-mode"
                src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/cross-icon.svg">
        </div>
    </div>

<div class="image-background-container upload-image-container">
    <div class="ai-upload-image">
        <input type="file" class="ai-upload-input" id="ipFilePickeraiObjectRemoval">
        <h3 class="font22">Upload your image </h3>
        <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-upload-img.png">
        <span>Drag and drop your image </span>
        <a href="#">Or click here to upload</a>
    </div>
</div>
{{-- section second start --}}
<div class="ai-tool-right-top top-menu-bar-second" style="display: none">
    <div class="ai-tool-right-back-btn">
        <a href="javascript:void(0)" class="gs-back-btn previous_page">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/back-btn-icon.svg">
            <img class="light-mode"
                src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/back-btn-icon.svg">
        </a>
    </div>
    <ul class="progress-bar-tab">
        <li class="active first_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>Upload image</span>
        </li>

        <li class="active second_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>Select elements to remove</span>
        </li>
    </ul>
</div>

<div class="image-show-container image-mask-container" style="display: none">
    <div class="gs-what-to-edit-wrapper">
        <div class="gs-what-to-edit-left image-mask-container image-mask-aiObjectRemoval" style="display: none">
            <div id="inpainting-stag-outer-aiObjectRemoval"
                class="inpainting-stag-outer d-flex align-items-center justify-content-center">
                <div id="painting-stag-aiObjectRemoval"></div>
            </div>
            <div class="gs-what-to-edit-tips">
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>Select the pieces of furniture or decor that you want to remove.</p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>After a complete removal? Select everything aside from structural elements and
                            windows. </p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>If you’re looking to do specific decluttering, only select the the item that you
                            want to erase.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gs-what-to-edit-right segment-masking-container" style="display: none">
            <div class="gs-what-to-edit-tabs">
                <div class="gs-what-to-edit-content">
                    <div class="gs-select-manually-inner">
                        <div class="gs-select-manually-top">
                            <p>Edit manually using the brush</p>
                            {{-- <input class="gs-select-manually-value" type="text" id="amount-aiObjectRemoval" readonly=""> --}}
                            <input type="hidden" value="70" id="ip-brush-thickness-aiObjectRemoval" />
                            <input class="gs-select-manually-value" type="text" id="amount-aiObjectRemoval" value="70"
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
                                <a href="javascript:void(0)" id="addMasking" onclick="toggleMasking(true)"
                                    class="active addMasking">Add
                                    Masking</a>
                            </div>
                            <div class="gs-refine-manually-single">
                                <input type="hidden" id="cursorCheckbox" value="false" />
                                <a href="javascript:void(0)" onclick="toggleBrushingCursor(false)"
                                    class="active"><img
                                        src="https://homedesigns-ai.b-cdn.net/web2/images/circle-brush.svg">
                                    Circle Brush</a>
                                <a href="javascript:void(0)" onclick="toggleBrushingCursor(true)"><img
                                        src="https://homedesigns-ai.b-cdn.net/web2/images/square-brush.svg">Square
                                    Brush</a>
                            </div>
                        </div>
                    </div>
                    <div class="undo-redo-btn">
                        <button class="ci-btn ci-btn-danger ip-clearImage" id="ip-clearImage" title="Clear All">
                            <img src="https://homedesigns-ai.b-cdn.net/web/images/deleteIcon.png"
                                width="25px"> Clear all
                        </button>
                        <button class="ci-btn ci-btn-danger ip-undoImage" id="ip-undoImage" title="Undo"><img
                                src="https://homedesigns-ai.b-cdn.net/web/images/undo.png"
                                width="25px"></button>
                        <button class="ci-btn ci-btn-danger ip-redoImage" id="ip-redoImage" title="Redo"><img
                                src="https://homedesigns-ai.b-cdn.net/web/images/redo.png"
                                width="25px"></button>
                    </div>
                    <div class="our-preset-settings-range-outer">
                        <input type="hidden" id="no_of_des0" name="no_of_des0" value="1" />
                        <p class="font14">Select the number of designs you want to generate at once.</p>
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
                            <img
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
<div class="ai-upload-latest-designs">
    <h3 class="font22">Latest Designs</h3>
    <div class="ai-upload-latest-wrapper row" id="all_data0_aiObjectRemoval">
    </div>
</div>
