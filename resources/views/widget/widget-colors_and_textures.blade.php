{{-- section first start --}}
<div class="ai-tool-right-top top-menu-bar-first">
    {{-- <h3 class="font22">Colors & Textures</h3> --}}
    <ul class="progress-bar-tab">
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
    <div>

    </div>
</div>
<div class="gs-dashboard-notice upload-image-container">
    <div class="gs-dashboard-notice-info">
        <img src="https://homedesigns-ai.b-cdn.net/web2/images/info-icon.svg">
    </div>
    <div class="gs-dashboard-notice-info-text">
        <h2>AI-Powered Color & Texture Customization</h2>
        <p>Fine-tune color and texture changes on specific design elements, preserving the integrity of your overall
            image. This AI model let's you experiment with colors, textures, and materials on furniture, walls, decor,
            on both interior and exterior spaces. Combine our extensive presets with your custom instructions to achieve
            truly personalized results.</p>
    </div>
    <div class="gs-dashboard-cross">
        <img src="https://homedesigns-ai.b-cdn.net/web2/images/cross-icon.svg">
        <img class="light-mode" src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/cross-icon.svg">
    </div>
</div>

<div class="image-background-container upload-image-container">
    <div class="ai-upload-image">
        <input type="file" class="ai-upload-input" id="ipFilePickerColorTexture">
        <h3 class="font22">Upload your image </h3>
        <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-upload-img.png">
        <span>Drag and drop your image </span>
        <a href="#">Or click here to upload</a>
    </div>
</div>
{{-- section first end --}}

{{-- section second start --}}
<div class="ai-tool-right-top top-menu-bar-second" style="display: none">
    <div class="ai-tool-right-back-btn">
        <a href="javascript:void(0)" class="gs-back-btn previous_page">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/back-btn-icon.svg">
            <img class="light-mode" src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/back-btn-icon.svg">
        </a>
        {{-- <h3 class="font22">Colors & Textures</h3> --}}
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
        <li class="third_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>Customise and Generate</span>
        </li>
    </ul>
    <div>
    </div>
</div>

<div class="ai-tool-right-top top-menu-bar-third" style="display: none">
    <div class="ai-tool-right-back-btn">
        <a href="javascript:void(0)" class="gs-back-btn previous_page">
            <img src="https://homedesigns-ai.b-cdn.net/web2/images/back-btn-icon.svg">
            <img class="light-mode" src="https://homedesigns-ai.b-cdn.net/web2/images/light-mode/back-btn-icon.svg">
        </a>
        {{-- <h3 class="font22"> Colors & Textures</h3> --}}
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
        <li class="active third_tab_active">
            <div class="ai-tool-right-steps"></div>
            <span>Customise and Generate</span>
        </li>
    </ul>
    <div>
    </div>
</div>

<div class="image-show-container image-mask-container" style="display: none">
    <div class="gs-what-to-edit-wrapper">
        <div class="gs-what-to-edit-left image-mask-container image-mask-change-colors-texture" style="display: none">
            <div id="inpainting-stag-outer-change-colors-texture"
                class="inpainting-stag-outer d-flex align-items-center justify-content-center">
                <div id="painting-stag-change-colors-texture"></div>
            </div>
            <div class="gs-what-to-edit-tips">
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>Use the manual or automatic selection to select the object that you want to change.</p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>You can use this AI model to change the color or texture or any interior or exterior object.
                        </p>
                    </div>
                </div>
                <div class="gs-what-to-edit-tip-box">
                    <div class="gs-what-to-edit-tip-right">
                        <p>You can add custom colors or textures by clicking on "Custom Colors" or "Custom Textures".
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gs-what-to-edit-right segment-masking-container" style="display: none">
            <div class="gs-what-to-edit-tabs">
                <div class="gs-what-to-edit-title">
                    <ul>
                        <li class="active"><a data-toggle="tab" href="#select-automatically-colorTexture">Automatic
                                Selection</a>
                        </li>
                        <li><a data-toggle="tab" href="#refine-manually-colorTexture">Manual Selection </a></li>
                    </ul>
                </div>
                <div class="gs-what-to-edit-content">
                    <div class="tab-content">
                        <div id="select-automatically-colorTexture" class="tab-pane show fade in active">
                            <div class="gs-select-automatically">
                                <p>Automatically or manually select objects, with the ability to combine both
                                    methods.</p>
                                <div class="gs-select-automatically-inner">
                                    <p>Select objects automatically</p>
                                    <div id="chkbox-segment-change-colors-texture" class="chkbox-segment"></div>
                                </div>
                                <div class="gs-continue-btn-outer">
                                    <a href="javascript:void(0)" class="gs-continue-btn continue-parameter">Continue</a>
                                </div>
                            </div>
                        </div>
                        <div id="refine-manually-colorTexture" class="tab-pane show fade">
                            <div class="gs-select-manually-inner">
                                <div class="gs-select-manually-top">
                                    <p>Edit manually using the brush</p>
                                    <input type="hidden" value="70" id="ip-brush-thickness" />
                                    <input class="gs-select-manually-value" type="text" id="amount"
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
                                <button class="ci-btn ci-btn-danger ip-clearImage" id="ip-clearImage"
                                    title="Clear All">
                                    <img src="https://homedesigns-ai.b-cdn.net/web/images/deleteIcon.png"
                                        width="25px"> Clear all
                                </button>
                                <button class="ci-btn ci-btn-danger ip-undoImage" id="ip-undoImage"
                                    title="Undo"><img src="https://homedesigns-ai.b-cdn.net/web/images/undo.png"
                                        width="25px"></button>
                                <button class="ci-btn ci-btn-danger ip-redoImage" id="ip-redoImage"
                                    title="Redo"><img src="https://homedesigns-ai.b-cdn.net/web/images/redo.png"
                                        width="25px"></button>
                            </div>
                            <div class="gs-continue-btn-outer">
                                <a href="javascript:void(0)" class="gs-continue-btn continue-parameter">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gs-what-to-edit-right category-container" style="display: none">
            <div class="gs-select-category">
                <p class="font14">Select what kind of space you are generating</p>
                <div class="gs-select-category-list">
                    <ul class="gs-option-flex designs_tabs">
                        <li class="active on-gen-disable nwai-tabs">
                            <a class="gs-select-category-list-inner" data-toggle="tab" href="#interior-colorTexture1"
                                onclick="loadRenders(0)">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-interior-icon.svg">
                                <span class="nwtb-titles">Interior</span>
                            </a>
                        </li>
                        <li class="on-gen-disable nwai-tabs">
                            <a class="gs-select-category-list-inner" data-toggle="tab" href="#exterior-colorTexture1"
                                onclick="loadRenders(1)">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-exterior-icon.svg">
                                <span class="nwtb-titles">Exterior</span>
                            </a>
                        </li>
                        <li class="on-gen-disable nwai-tabs">
                            <a class="gs-select-category-list-inner" data-toggle="tab" href="#garden-colorTexture1"
                                onclick="loadRenders(2)">
                                <img src="https://homedesigns-ai.b-cdn.net/web2/images/gs-garden-icon.svg">
                                <span class="nwtb-titles">Garden</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div id="interior-colorTexture1" class="tab-pane fade in active" data-sec="0">
                    <div class="gs-what-to-edit-tabs">
                        <div class="gs-what-to-edit-title">
                            <ul>
                                <li class="active"><a data-toggle="tab"
                                        href="#our-preset-settings-interior-change-colors-texture"
                                        class="presetLink">Preset Colors</a></li>
                                <li><a data-toggle="tab" href="#your-customs-settings-interior-change-colors-texture"
                                        class="customLink">Custom Colors </a></li>
                            </ul>
                        </div>
                        <div class="gs-what-to-edit-content">
                            <div class="tab-content">
                                <div id="our-preset-settings-interior-change-colors-texture"
                                    class="tab-pane show fade in active">
                                    <div class="gs-select-automatically">
                                        <p>What do you want to change?</p>
                                        <div class="gs-our-preset-settings">
                                            <div class="button-container">
                                                <button class="toggle-button color-button active">Color</button>
                                                <button class="toggle-button material-button">Material</button>
                                            </div>
                                            <div class="gs-our-preset-color" data-sec="0">
                                                <input type="hidden" id="color_texture_change-colors-texture"
                                                    name="color_texture0">
                                                <p>Select a color from the list:</p>
                                                @include('widget.designs_options.colors_texture')
                                            </div>
                                            <div class="gs-our-preset-interior materials-textures-cat  materials-textures-cat-int"
                                                style="display: none;">
                                                <input type="hidden" id="material0" name="material0">
                                                <p>Pick a texture from the list:
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target="#view_all_material_interior">View All</a> --}}
                                                </p>
                                                <ul class="interior-list int_list_item">
                                                    <li data-item="fabrics">Fabrics</li>
                                                    <li data-item="glass">Glass</li>
                                                    <li data-item="wood">Wood</li>
                                                    <li data-item="stone">Stone</li>
                                                    <li data-item="metal">Metal</li>
                                                    <li data-item="ceramics and porcelain">Ceramics and Porcelain</li>
                                                    <li data-item="plastics and polymers">Plastics and Polymers</li>
                                                    <li data-item="paper and cardboard">Paper and Cardboard</li>
                                                    <li data-item="natural fibers">Natural Fibers</li>
                                                    <li data-item="composite materials">Composite Materials</li>
                                                </ul>
                                            </div>
                                            <div class="gs-our-preset-interior select-more-details select-more-details-int"
                                                style="display: none;">
                                                <input type="hidden" id="material_type0" name="material_type0">
                                                <p>Select Material Types
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#view_all_interior">View All</a> --}}
                                                </p>
                                                <ul class="interior-list int_mate_list_item">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="our-preset-settings-range-outer">
                                            <input type="hidden" id="no_of_des0" name="no_of_des0"
                                                value="1" />
                                            <p class="font14">Select the number of designs you want to generate at
                                                once.
                                            </p>
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
                                <div id="your-customs-settings-interior-change-colors-texture"
                                    class="tab-pane show fade">
                                    <div class="our-preset-settings-box">
                                        <textarea id="custom_instruction0-change-colors-texture" placeholder="white chalk paint" name="prompt"
                                            class="promtCustomInput"></textarea>
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
                <div id="exterior-colorTexture1" class="tab-pane fade" data-sec="1">
                    <div class="gs-what-to-edit-tabs">
                        <div class="gs-what-to-edit-title">
                            <ul>
                                <li class="active"><a data-toggle="tab"
                                        href="#our-preset-settings-exterior-colorTexture1" class="presetLink">Preset
                                        Colors</a></li>
                                <li><a data-toggle="tab" href="#your-customs-settings-exterior-colorTexture1"
                                        class="customLink">Custom Colors</a></li>
                            </ul>
                        </div>
                        <div class="gs-what-to-edit-content">
                            <div class="tab-content">
                                <div id="our-preset-settings-exterior-colorTexture1"
                                    class="tab-pane show fade in active">
                                    <div class="gs-select-automatically">
                                        <p>What do you want to change?</p>
                                        <div class="gs-our-preset-settings">
                                            <div class="button-container">
                                                <button class="toggle-button color-button active">Color</button>
                                                <button class="toggle-button material-button">Material</button>
                                            </div>
                                            <div class="gs-our-preset-color" data-sec="1">
                                                <input type="hidden" id="color_texture1" name="color_texture1">
                                                <p>Changing the color? Select one</p>
                                                @include('widget.designs_options.colors_texture')
                                            </div>
                                            <div class="gs-our-preset-interior materials-textures-cat  materials-textures-cat-ext"
                                                style="display: none;">
                                                <input type="hidden" id="material1" name="material1">
                                                <p>Select Exterior Materials
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target="#view_all_material_exterior">View All</a> --}}
                                                </p>

                                                <ul class="interior-list ext_list_item">
                                                    <li data-item="facade">Facade</li>
                                                    <li data-item="roofing">Roofing</li>
                                                    <li data-item="decking and walkways">Decking and Walkways</li>
                                                    <li data-item="outdoor fixtures and accents">Outdoor Fixtures and
                                                        Accents</li>
                                                </ul>
                                            </div>
                                            <div class="gs-our-preset-interior select-more-details select-more-details-ext"
                                                style="display: none;">
                                                <input type="hidden" id="material_type1" name="material_type1">
                                                <p>Select Material Types
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target="#view_all_interior">View All</a> --}}
                                                </p>
                                                <ul class="interior-list ext_mate_list_item">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="our-preset-settings-range-outer">
                                            <input type="hidden" id="no_of_des1" name="no_of_des1"
                                                value="1" />
                                            <p class="font14">Select the number of designs you want to generate at
                                                once.
                                            </p>
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
                                <div id="your-customs-settings-exterior-colorTexture1" class="tab-pane show fade">
                                    <div class="our-preset-settings-box">
                                        <textarea id="custom_instruction1-change-colors-texture" placeholder="white chalk paint" name="prompt"
                                            class="promtCustomInput"></textarea>
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
                <div id="garden-colorTexture1" class="tab-pane fade" data-sec="2">
                    <div class="gs-what-to-edit-tabs">
                        <div class="gs-what-to-edit-title">
                            <ul>
                                <li class="active"><a data-toggle="tab" href="#our-preset-settings-garden-color_swap"
                                        class="presetLink">Preset Colors</a></li>
                                <li><a data-toggle="tab" href="#your-customs-settings-garden-color_swap"
                                        class="customLink">Custom Colors</a></li>
                            </ul>
                        </div>
                        <div class="gs-what-to-edit-content">
                            <div class="tab-content">
                                <div id="our-preset-settings-garden-color_swap" class="tab-pane show fade in active">
                                    <div class="gs-select-automatically">
                                        <p>What do you want to change?</p>
                                        <div class="gs-our-preset-settings">
                                            <div class="button-container">
                                                <button class="toggle-button color-button active">Color</button>
                                                <button class="toggle-button material-button">Material</button>
                                            </div>
                                            <div class="gs-our-preset-color" data-sec="2">
                                                <input type="hidden" id="color_texture2" name="color_texture2">
                                                <p>Changing the color? Select one</p>
                                                @include('widget.designs_options.colors_texture')
                                            </div>
                                            <div class="gs-our-preset-interior materials-textures-cat  materials-textures-cat-gar"
                                                style="display: none;">
                                                <input type="hidden" id="material2" name="material2">
                                                <p>Select Garden Materials
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target="#view_all_material_garden">View All</a> --}}
                                                </p>
                                                <ul class="interior-list gar_list_item">
                                                    <li data-item="ground cover materials">Ground Cover Materials</li>
                                                    <li data-item="planters and edging">Planters and Edging</li>
                                                    <li data-item="outdoor furniture and decor">Outdoor Furniture and
                                                        Decor</li>
                                                    <li data-item="water features and structures">Water Features and
                                                        Structures</li>
                                                    <li data-item="lighting">Lighting</li>
                                                </ul>
                                            </div>
                                            <div class="gs-our-preset-interior select-more-details select-more-details-gar"
                                                style="display: none;">
                                                <input type="hidden" id="material_type2" name="material_type2">
                                                <p>Select Material Types
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#view_all_interior">View All</a> --}}
                                                </p>
                                                <ul class="interior-list gar_mate_list_item">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="our-preset-settings-range-outer">
                                            <input type="hidden" id="no_of_des2" name="no_of_des2"
                                                value="1" />
                                            <p class="font14">Select the number of designs you want to generate at
                                                once.
                                            </p>
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
                                <div id="your-customs-settings-garden-color_swap" class="tab-pane show fade">
                                    <div class="our-preset-settings-box">
                                        <textarea id="custom_instruction2-change-colors-texture" placeholder="white chalk paint" name="prompt"
                                            class="promtCustomInput"></textarea>
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
            </div>
        </div>
    </div>
</div>
{{-- section second end --}}

<div class="ai-upload-latest-designs">
    <h3 class="font22">Latest Designs</h3>
    <div class="ai-upload-latest-wrapper row" id="all_data0_change-colors-texture">

    </div>
</div>
<script>
    function handleColorTextureChange(selectElement, dropdownId) {
        // Get the selected value
        var selected = $(selectElement).val();

        // Extract the number from the dropdown's ID
        var dropdownNumber = $(selectElement).attr('id').replace(dropdownId, '');

        // Form the ID of the associated textarea
        var textareaId = 'custom_instruction' + dropdownNumber + '-' + dataPage;
        // Get the associated textarea using the formed ID
        var textarea = $('#' + textareaId);

        // Check the selected value and enable or disable the textarea accordingly
        var secondSelection = '';

        if (dropdownId == 'color_texture') {
            secondSelection = $('#material' + dropdownNumber).val();
        } else {
            secondSelection = $('#color_texture' + dropdownNumber).val();
        }

        if (selected === "" && secondSelection === "") {
            textarea.prop('disabled', false);
        } else {
            textarea.prop('disabled', true);
        }
    }
    $('.changeColorTexture').on('change', function() {
        handleColorTextureChange(this, 'color_texture');
    });

    $('.changeMaterial').change(function() {

        handleColorTextureChange(this, 'material');

        // Clear previous options in 'Select Material Types' dropdown
        $('.changeMaterialType').empty();

        // Get the selected value from 'Select Materials' dropdown
        var selectedMaterial = $(this).val();

        // Enable/disable 'Select Material Types' dropdown based on selection
        if (selectedMaterial !== '') {
            // Enable 'Select Material Types' dropdown
            $('.changeMaterialType').prop('disabled', false);

            // Load options into 'Select Material Types' dropdown based on the selected material
            if (selectedMaterial === 'Fabrics') {
                // Load options for 'Material 1' selected in 'Select Materials'
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Cotton">Cotton</option>');
                $('.changeMaterialType').append('<option value="Linen">Linen</option>');
                $('.changeMaterialType').append('<option value="Silk">Silk</option>');
                $('.changeMaterialType').append('<option value="Velvet">Velvet</option>');
                $('.changeMaterialType').append('<option value="Wool">Wool</option>');
                $('.changeMaterialType').append('<option value="Leather">Leather</option>');
                $('.changeMaterialType').append('<option value="Suede">Suede</option>');
                $('.changeMaterialType').append('<option value="Tweed">Tweed</option>');
                $('.changeMaterialType').append('<option value="Chenille">Chenille</option>');
                $('.changeMaterialType').append('<option value="Jacquard">Jacquard</option>');
                $('.changeMaterialType').append('<option value="Satin">Satin</option>');
                $('.changeMaterialType').append('<option value="Polyester">Polyester</option>');
                $('.changeMaterialType').append('<option value="Nylon">Nylon</option>');
                $('.changeMaterialType').append('<option value="Rayon">Rayon</option>');
                $('.changeMaterialType').append('<option value="Cashmere">Cashmere</option>');
            } else if (selectedMaterial === 'Glass') {
                // Load options for 'Material 2' selected in 'Select Materials'
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Clear">Clear</option>');
                $('.changeMaterialType').append('<option value="Frosted">Frosted</option>');
                $('.changeMaterialType').append('<option value="Stained">Stained</option>');
                $('.changeMaterialType').append('<option value="Tempered">Tempered</option>');
                $('.changeMaterialType').append('<option value="Laminated">Laminated</option>');
                $('.changeMaterialType').append('<option value="Shattered">Shattered</option>');
                $('.changeMaterialType').append('<option value="Patterned">Patterned</option>');
                $('.changeMaterialType').append('<option value="Textured">Textured</option>');
                $('.changeMaterialType').append('<option value="Seeded">Seeded</option>');
                $('.changeMaterialType').append('<option value="Colored">Colored</option>');
                $('.changeMaterialType').append('<option value="Mirrored">Mirrored</option>');
                $('.changeMaterialType').append('<option value="Etched">Etched</option>');
                $('.changeMaterialType').append('<option value="Smoked">Smoked</option>');
                $('.changeMaterialType').append('<option value="Beveled">Beveled</option>');
                $('.changeMaterialType').append('<option value="Lead Crystal">Lead Crystal</option>');
                $('.changeMaterialType').append('<option value="Obscured">Obscured</option>');
            } else if (selectedMaterial === 'Wood') {
                // Load options for 'Material 2' selected in 'Select Materials'
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Oak">Oak</option>');
                $('.changeMaterialType').append('<option value="Maple">Maple</option>');
                $('.changeMaterialType').append('<option value="Cherry">Cherry</option>');
                $('.changeMaterialType').append('<option value="Walnut">Walnut</option>');
                $('.changeMaterialType').append('<option value="Pine">Pine</option>');
                $('.changeMaterialType').append('<option value="Teak">Teak</option>');
                $('.changeMaterialType').append('<option value="Mahogany">Mahogany</option>');
                $('.changeMaterialType').append('<option value="Bamboo">Bamboo</option>');
                $('.changeMaterialType').append('<option value="Birch">Birch</option>');
                $('.changeMaterialType').append('<option value="Rosewood">Rosewood</option>');
                $('.changeMaterialType').append('<option value="Ash">Ash</option>');
                $('.changeMaterialType').append('<option value="Cedar">Cedar</option>');
                $('.changeMaterialType').append('<option value="Hickory">Hickory</option>');
                $('.changeMaterialType').append('<option value="Alder">Alder</option>');
                $('.changeMaterialType').append('<option value="Ebony">Ebony</option>');
            } else if (selectedMaterial === 'Stone') {
                // Load options for 'Material 2' selected in 'Select Materials'
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Marble">Marble</option>');
                $('.changeMaterialType').append('<option value="Granite">Granite</option>');
                $('.changeMaterialType').append('<option value="Bricks">Bricks</option>');
                $('.changeMaterialType').append('<option value="Red Bricks">Red Bricks</option>');
                $('.changeMaterialType').append('<option value="Limestone">Limestone</option>');
                $('.changeMaterialType').append('<option value="Slate">Slate</option>');
                $('.changeMaterialType').append('<option value="Travertine">Travertine</option>');
                $('.changeMaterialType').append('<option value="Sandstone">Sandstone</option>');
                $('.changeMaterialType').append('<option value="Quartz">Quartz</option>');
                $('.changeMaterialType').append('<option value="Onyx">Onyx</option>');
                $('.changeMaterialType').append('<option value="Basalt">Basalt</option>');
                $('.changeMaterialType').append('<option value="Terrazzo">Terrazzo</option>');
                $('.changeMaterialType').append('<option value="Soapstone">Soapstone</option>');
                $('.changeMaterialType').append('<option value="Quartzite">Quartzite</option>');
                $('.changeMaterialType').append('<option value="Dolomite">Dolomite</option>');
                $('.changeMaterialType').append('<option value="Gneiss">Gneiss</option>');
                $('.changeMaterialType').append('<option value="Bluestone">Bluestone</option>');
            } else if (selectedMaterial === 'Metal') {
                // Load options for 'Material 2' selected in 'Select Materials'
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Steel">Steel</option>');
                $('.changeMaterialType').append('<option value="Aluminum">Aluminum</option>');
                $('.changeMaterialType').append('<option value="Brass">Brass</option>');
                $('.changeMaterialType').append('<option value="Wrought Iron">Wrought Iron</option>');
                $('.changeMaterialType').append('<option value="Stainless Steel">Stainless Steel</option>');
                $('.changeMaterialType').append('<option value="Chrome">Chrome</option>');
                $('.changeMaterialType').append('<option value="Gold">Gold</option>');
                $('.changeMaterialType').append('<option value="Silver">Silver</option>');
                $('.changeMaterialType').append('<option value="Copper">Copper</option>');
                $('.changeMaterialType').append('<option value="Bronze">Bronze</option>');
                $('.changeMaterialType').append('<option value="Titanium">Titanium</option>');
                $('.changeMaterialType').append('<option value="Zinc">Zinc</option>');
                $('.changeMaterialType').append('<option value="Nickel">Nickel</option>');
                $('.changeMaterialType').append('<option value="Lead">Lead</option>');
                $('.changeMaterialType').append('<option value="Pewter">Pewter</option>');
            } else if (selectedMaterial === 'Ceramics and Porcelain') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Earthenware">Earthenware</option>');
                $('.changeMaterialType').append('<option value="Stoneware">Stoneware</option>');
                $('.changeMaterialType').append('<option value="Porcelain">Porcelain</option>');
                $('.changeMaterialType').append('<option value="Terracotta">Terracotta</option>');
                $('.changeMaterialType').append('<option value="Vitreous China">Vitreous China</option>');
                $('.changeMaterialType').append('<option value="Bone China">Bone China</option>');
                $('.changeMaterialType').append('<option value="Glazed">Glazed</option>');
                $('.changeMaterialType').append('<option value="Matte">Matte</option>');
                $('.changeMaterialType').append('<option value="Polished">Polished</option>');
                $('.changeMaterialType').append('<option value="Textured">Textured</option>');
                $('.changeMaterialType').append('<option value="Mosaic">Mosaic</option>');
                $('.changeMaterialType').append('<option value="Hand-painted">Hand-painted</option>');
                $('.changeMaterialType').append('<option value="Crackle">Crackle</option>');
                $('.changeMaterialType').append('<option value="Metallic">Metallic</option>');
                $('.changeMaterialType').append('<option value="Luster">Luster</option>');
            } else if (selectedMaterial === 'Plastics and Polymers') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Acrylic">Acrylic</option>');
                $('.changeMaterialType').append('<option value="Polyethylene">Polyethylene</option>');
                $('.changeMaterialType').append('<option value="PVC">PVC</option>');
                $('.changeMaterialType').append('<option value="Polycarbonate">Polycarbonate</option>');
                $('.changeMaterialType').append('<option value="Polypropylene">Polypropylene</option>');
                $('.changeMaterialType').append('<option value="ABS">ABS</option>');
                $('.changeMaterialType').append('<option value="Epoxy">Epoxy</option>');
                $('.changeMaterialType').append('<option value="Silicone">Silicone</option>');
                $('.changeMaterialType').append('<option value="Vinyl">Vinyl</option>');
                $('.changeMaterialType').append('<option value="Melamine">Melamine</option>');
                $('.changeMaterialType').append('<option value="Phenolic">Phenolic</option>');
                $('.changeMaterialType').append('<option value="Urethane">Urethane</option>');
                $('.changeMaterialType').append('<option value="Fiberglass">Fiberglass</option>');
                $('.changeMaterialType').append('<option value="Nylon">Nylon</option>');
                $('.changeMaterialType').append('<option value="Acetate">Acetate</option>');
            } else if (selectedMaterial === 'Paper and Cardboard') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Wallpaper">Wallpaper</option>');
                $('.changeMaterialType').append('<option value="Cardboard">Cardboard</option>');
                $('.changeMaterialType').append('<option value="Kraft">Kraft</option>');
                $('.changeMaterialType').append('<option value="Parchment">Parchment</option>');
                $('.changeMaterialType').append('<option value="Foil embossed">Foil embossed</option>');
                $('.changeMaterialType').append('<option value="Textured">Textured</option>');
                $('.changeMaterialType').append('<option value="Handmade paper">Handmade paper</option>');
                $('.changeMaterialType').append('<option value="Recycled paper">Recycled paper</option>');
                $('.changeMaterialType').append('<option value="Flocked paper">Flocked paper</option>');
                $('.changeMaterialType').append('<option value="Metallic paper">Metallic paper</option>');
                $('.changeMaterialType').append('<option value="Vellum">Vellum</option>');
                $('.changeMaterialType').append('<option value="Linen paper">Linen paper</option>');
                $('.changeMaterialType').append('<option value="Watercolor paper">Watercolor paper</option>');
                $('.changeMaterialType').append('<option value="Matte">Matte</option>');
                $('.changeMaterialType').append('<option value="Glossy">Glossy</option>');
            } else if (selectedMaterial === 'Natural Fibers') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Jute">Jute</option>');
                $('.changeMaterialType').append('<option value="Hemp">Hemp</option>');
                $('.changeMaterialType').append('<option value="Sisal">Sisal</option>');
                $('.changeMaterialType').append('<option value="Coir">Coir</option>');
                $('.changeMaterialType').append('<option value="Bamboo fiber">Bamboo fiber</option>');
                $('.changeMaterialType').append('<option value="Wool">Wool</option>');
                $('.changeMaterialType').append('<option value="Cotton">Cotton</option>');
                $('.changeMaterialType').append('<option value="Linen">Linen</option>');
                $('.changeMaterialType').append('<option value="Silk">Silk</option>');
                $('.changeMaterialType').append('<option value="Cashmere">Cashmere</option>');
                $('.changeMaterialType').append('<option value="Mohair">Mohair</option>');
                $('.changeMaterialType').append('<option value="Alpaca">Alpaca</option>');
                $('.changeMaterialType').append('<option value="Seagrass">Seagrass</option>');
                $('.changeMaterialType').append('<option value="Ramie">Ramie</option>');
                $('.changeMaterialType').append('<option value="Abaca">Abaca</option>');
            } else if (selectedMaterial === 'Composite Materials') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Concrete">Concrete</option>');
                $('.changeMaterialType').append('<option value="Plywood">Plywood</option>');
                $('.changeMaterialType').append('<option value="MDF">MDF</option>');
                $('.changeMaterialType').append('<option value="Particleboard">Particleboard</option>');
                $('.changeMaterialType').append('<option value="Fiberglass">Fiberglass</option>');
                $('.changeMaterialType').append('<option value="Corian">Corian</option>');
                $('.changeMaterialType').append('<option value="Quartz composite">Quartz composite</option>');
                $('.changeMaterialType').append('<option value="Terrazzo">Terrazzo</option>');
                $('.changeMaterialType').append('<option value="Engineered stone">Engineered stone</option>');
                $('.changeMaterialType').append('<option value="Laminate">Laminate</option>');
                $('.changeMaterialType').append(
                    '<option value="Vinyl composite tile">Vinyl composite tile</option>');
                $('.changeMaterialType').append('<option value="Resin">Resin</option>');
                $('.changeMaterialType').append('<option value="Acrylic composite">Acrylic composite</option>');
                $('.changeMaterialType').append('<option value="Carbon fiber">Carbon fiber</option>');
                $('.changeMaterialType').append(
                    '<option value="Glass fiber reinforced concrete">Glass fiber reinforced concrete</option>'
                );
            } else if (selectedMaterial === 'Facade') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Brick">Brick</option>');
                $('.changeMaterialType').append('<option value="Natural Stone">Natural Stone</option>');
                $('.changeMaterialType').append('<option value="Granite">Granite</option>');
                $('.changeMaterialType').append('<option value="Fieldstone">Fieldstone</option>');
                $('.changeMaterialType').append('<option value="Limestone">Limestone</option>');
                $('.changeMaterialType').append('<option value="Sandstone">Sandstone</option>');
                $('.changeMaterialType').append('<option value="Stucco">Stucco</option>');
                $('.changeMaterialType').append('<option value="Wood">Wood</option>');
                $('.changeMaterialType').append('<option value="Vinyl">Vinyl</option>');
                $('.changeMaterialType').append('<option value="Fiber cement">Fiber cement</option>');
                $('.changeMaterialType').append('<option value="Metal">Metal</option>');
                $('.changeMaterialType').append('<option value="Glass">Glass</option>');
            } else if (selectedMaterial === 'Roofing') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Asphalt shingles">Asphalt shingles</option>');
                $('.changeMaterialType').append('<option value="Metal roofing">Metal roofing</option>');
                $('.changeMaterialType').append('<option value="Clay tiles">Clay tiles</option>');
                $('.changeMaterialType').append('<option value="Concrete tiles">Concrete tiles</option>');
                $('.changeMaterialType').append('<option value="Slate tiles">Slate tiles</option>');
                $('.changeMaterialType').append(
                    '<option value="Wooden shakes or shingles">Wooden shakes or shingles</option>');
                $('.changeMaterialType').append('<option value="Solar tiles">Solar tiles</option>');
                $('.changeMaterialType').append('<option value="Roof Tiles">Roof Tiles</option>');
            } else if (selectedMaterial === 'Decking and Walkways') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Composite decking">Composite decking</option>');
                $('.changeMaterialType').append(
                    '<option value="Natural stone pavers">Natural stone pavers</option>');
                $('.changeMaterialType').append('<option value="Concrete pavers">Concrete pavers</option>');
                $('.changeMaterialType').append('<option value="Brick pavers">Brick pavers</option>');
                $('.changeMaterialType').append('<option value="Treated lumber">Treated lumber</option>');
                $('.changeMaterialType').append('<option value="Teak">Teak</option>');
                $('.changeMaterialType').append('<option value="Redwood decking">Redwood decking</option>');
                $('.changeMaterialType').append('<option value="Pea Gravel">Pea Gravel</option>');
                $('.changeMaterialType').append(
                    '<option value="Anthracite Grey Deck">Anthracite Grey Deck</option>');
                $('.changeMaterialType').append('<option value="Crushed Granite">Crushed Granite</option>');
            } else if (selectedMaterial === 'Outdoor Fixtures and Accents') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Wrought iron">Wrought iron</option>');
                $('.changeMaterialType').append('<option value="Stainless steel">Stainless steel</option>');
                $('.changeMaterialType').append('<option value="Copper">Copper</option>');
                $('.changeMaterialType').append('<option value="Natural stone">Natural stone</option>');
                $('.changeMaterialType').append('<option value="Ceramic tiles">Ceramic tiles</option>');
            } else if (selectedMaterial === 'Ground Cover Materials') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Mulch">Mulch</option>');
                $('.changeMaterialType').append('<option value="Wood Chips">Wood Chips</option>');
                $('.changeMaterialType').append('<option value="Grass">Grass</option>');
                $('.changeMaterialType').append('<option value="Clover">Clover</option>');
                $('.changeMaterialType').append('<option value="Moss">Moss</option>');
                $('.changeMaterialType').append('<option value="Lawn">Lawn</option>');
                $('.changeMaterialType').append('<option value="Pebbles">Pebbles</option>');
                $('.changeMaterialType').append('<option value="River rocks">River rocks</option>');
                $('.changeMaterialType').append(
                    '<option value="Ground cover plants">Ground cover plants</option>');
                $('.changeMaterialType').append('<option value="thyme">thyme</option>');
                $('.changeMaterialType').append('<option value="Sedum">Sedum</option>');
                $('.changeMaterialType').append('<option value="Artificial grass">Artificial grass</option>');
                $('.changeMaterialType').append(
                    '<option value="Decomposed granite">Decomposed granite</option>');
            } else if (selectedMaterial === 'Planters and Edging') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Corten steel">Corten steel</option>');
                $('.changeMaterialType').append('<option value="Stone">Stone</option>');
                $('.changeMaterialType').append('<option value="Fruit Trees">Fruit Trees</option>');
                $('.changeMaterialType').append('<option value="Berry Bushes">Berry Bushes</option>');
                $('.changeMaterialType').append('<option value="Plants">Plants</option>');
                $('.changeMaterialType').append('<option value="Flowers">Flowers</option>');
                $('.changeMaterialType').append('<option value="Concrete">Concrete</option>');
                $('.changeMaterialType').append('<option value="Natural Stone">Natural Stone</option>');
                $('.changeMaterialType').append('<option value="Recycled plastic">Recycled plastic</option>');
                $('.changeMaterialType').append('<option value="Bamboo">Bamboo</option>');
            } else if (selectedMaterial === 'Outdoor Furniture and Decor') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Teak">Teak</option>');
                $('.changeMaterialType').append('<option value="Wrought iron">Wrought iron</option>');
                $('.changeMaterialType').append('<option value="Rattan">Rattan</option>');
                $('.changeMaterialType').append('<option value="Fire Pits">Fire Pits</option>');
                $('.changeMaterialType').append('<option value="Concrete">Concrete</option>');
                $('.changeMaterialType').append('<option value="Ceramic">Ceramic</option>');
                $('.changeMaterialType').append('<option value="Brick">Brick</option>');
            } else if (selectedMaterial === 'Water Features and Structures') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="Natural stone">Natural stone</option>');
                $('.changeMaterialType').append('<option value="Fiberglass">Fiberglass</option>');
                $('.changeMaterialType').append('<option value="Copper">Copper</option>');
                $('.changeMaterialType').append('<option value="Wood">Wood</option>');
                $('.changeMaterialType').append('<option value="Glass">Glass</option>');
            } else if (selectedMaterial === 'Lighting') {
                $('.changeMaterialType').append('<option value="">Select Material Types</option>');
                $('.changeMaterialType').append('<option value="LED lights">LED lights</option>');
                $('.changeMaterialType').append(
                    '<option value="Solar-powered lights">Solar-powered lights</option>');
                $('.changeMaterialType').append(
                    '<option value="Low-voltage halogen">Low-voltage halogen</option>');
                $('.changeMaterialType').append('<option value="Fiber optics">Fiber optics</option>');
            }
            // Add more conditions as needed for other material options
        } else {
            // If no option selected in 'Select Materials', disable 'Select Material Types' and reset its value
            $('.changeMaterialType').prop('disabled', true);
        }
    });
    $(document).ready(function() {
        function handleButtonClick($tabPane) {
            const $colorButton = $tabPane.find('.color-button');
            const $materialButton = $tabPane.find('.material-button');
            const $colorDiv = $tabPane.find('.gs-our-preset-color');
            const $materialDivs = $tabPane.find('.materials-textures-cat');
            const $presetLink = $tabPane.find('.presetLink');
            const $customLink = $tabPane.find('.customLink');
            const $textareas = $tabPane.find('.promtCustomInput');
            const $colorListItems = $tabPane.find('#colorListColorTexture li');
            const $colorInput = $tabPane.find('input[name^="color_texture"]');
            const $materialInput = $tabPane.find('input[name^="material_type"]');
            const $selectMoreMaterial = $tabPane.find('.select-more-details');

            $colorButton.on('click', function() {
                $colorButton.addClass('active');
                $materialButton.removeClass('active');
                $colorDiv.show();
                $materialDivs.hide();
                $presetLink.text('Preset Colors');
                $customLink.text('Custom Colors');
                $textareas.each(function() {
                    $(this).attr('placeholder', 'white chalk paint');
                });
                $selectMoreMaterial.hide();
            });

            $materialButton.on('click', function() {
                $materialButton.addClass('active');
                $colorButton.removeClass('active');
                $colorDiv.hide();
                $materialDivs.show();
                $presetLink.text('Preset Textures');
                $customLink.text('Custom Textures');
                $textareas.each(function() {
                    $(this).attr('placeholder', 'Orange peel textured wall');
                });
                const hasActiveItems = $materialDivs.find('li.active').length > 0;
                if (hasActiveItems) {
                    $selectMoreMaterial.show();
                } else {
                    $selectMoreMaterial.hide();
                }
            });
        }

        // Iterate over each tab pane to attach handlers
        $('.tab-pane').each(function() {
            handleButtonClick($(this));
        });
    });
</script>
<script>
    function selectColorColorTexture(event, colorName) {
        var parentDiv = event.target.closest('.gs-our-preset-color');
        var secId = parentDiv.getAttribute('data-sec');
        var hiddenInput = document.getElementById('color_texture_' + dataPage);
        var custom_instruction = document.getElementById('custom_instruction' + secId + '-' + dataPage);

        var clickedLi = event.target.closest('li.color-option');
        var isActive = clickedLi.classList.contains('active');

        // Remove active class from all list items
        var allLis = clickedLi.parentElement.querySelectorAll('li');
        allLis.forEach(li => li.classList.remove('active')); // Remove 'active' class from all 'li' elements

        if (isActive) {
            clickedLi.classList.remove('active'); // This will work now since we removed 'active' from all before
            hiddenInput.value = '';
            custom_instruction.disabled = false;
        } else {
            clickedLi.classList.add('active'); // Adds 'active' class to the clicked item
            hiddenInput.value = colorName;
            custom_instruction.disabled = true;
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
<script>
    const subItemsMapping = {
        "fabrics": ['Cotton', 'Silk', 'Wool', 'Linen', 'Velvet', 'Leather', 'Suede', 'Tweed', 'Chenille',
            'Jacquard', 'Satin', 'Polyester', 'Nylon', 'Rayon', 'Cashmere'
        ],
        "glass": ['Clear', 'Frosted', 'Stained', 'Tempered', 'Laminated', 'Shattered', 'Patterned', 'Textured',
            'Seeded', 'Colored', 'Mirrored', 'Etched', 'Smoked', 'Beveled', 'Lead Crystal', 'Obscured'
        ],
        "wood": ['Oak', 'Maple', 'Cherry', 'Walnut', 'Pine', 'Teak', 'Mahogany', 'Bamboo', 'Birch', 'Rosewood',
            'Ash', 'Cedar', 'Hickory', 'Alder', 'Ebony'
        ],
        "stone": ['Marble', 'Granite', 'Bricks', 'Red Bricks', 'Limestone', 'Slate', 'Travertine', 'Sandstone',
            'Quartz', 'Onyx', 'Basalt', 'Terrazzo', 'Soapstone', 'Quartzite', 'Dolomite', 'Gneiss', 'Bluestone'
        ],
        "metal": ['Steel', 'Aluminum', 'Brass', 'Wrought iron', 'Stainless steel', 'Chrome', 'Gold', 'Silver',
            'Copper', 'Bronze', 'Titanium', 'Zinc', 'Nickel', 'Lead', 'Pewter'
        ],
        "ceramics and porcelain": ['Earthenware', 'Stoneware', 'Porcelain', 'Terracotta', 'Vitreous China',
            'Bone China', 'Glazed', 'Matte', 'Polished', 'Textured', 'Mosaic', 'Hand-painted', 'Crackle',
            'Metallic', 'Luster'
        ],
        "plastics and polymers": ['Acrylic', 'Polyethylene', 'PVC', 'Polycarbonate', 'Polypropylene', 'ABS',
            'Epoxy', 'Silicone', 'Vinyl', 'Melamine', 'Phenolic', 'Urethane', 'Fiberglass', 'Nylon', 'Acetate'
        ],
        "paper and cardboard": ['Wallpaper', 'Cardboard', 'Kraft', 'Parchment', 'Foil embossed', 'Textured',
            'Handmade paper', 'Recycled paper', 'Flocked paper', 'Metallic paper', 'Vellum', 'Linen paper',
            'Watercolor paper', 'Matte', 'Glossy'
        ],
        "natural fibers": ['Jute', 'Hemp', 'Sisal', 'Coir', 'Bamboo fiber', 'Wool', 'Cotton', 'Linen', 'Silk',
            'Cashmere', 'Mohair', 'Alpaca', 'Seagrass', 'Ramie', 'Abaca'
        ],
        "composite materials": ['Concrete', 'Plywood', 'MDF', 'Particleboard', 'Fiberglass', 'Corian',
            'Quartz composite', 'Terrazzo', 'Engineered stone', 'Laminate', 'Vinyl composite tile', 'Resin',
            'Acrylic composite', 'Carbon fiber', 'Glass fiber reinforced concrete'
        ],
        "facade": ['Brick', 'Natural Stone', 'Granite', 'Fieldstone', 'Limestone', 'Sandstone', 'Stucco', 'Wood',
            'Vinyl', 'Fiber cement', 'Metal', 'Glass'
        ],
        "roofing": ['Asphalt shingles', 'Metal roofing', 'Clay tiles', 'Concrete tiles', 'Slate tiles',
            'Wooden Shakes or Shingles', 'Solar Tiles', 'Roof Tiles'
        ],
        "decking and walkways": ['Composite decking', 'Natural stone pavers', 'Concrete pavers', 'Brick pavers',
            'Treated lumber', 'Teak', 'Redwood decking', 'Pea Gravel', 'Anthracite Grey Deck', 'Crushed Granite'
        ],
        "outdoor fixtures and accents": ['Wrought iron', 'Stainless steel', 'Copper', 'Natural stone',
            'Ceramic tiles'
        ],
        "ground cover materials": ['Mulch', 'Wood Chips', 'Grass', 'Clover', 'Moss', 'Lawn', 'Pebbles',
            'River rocks', 'Ground cover plants', 'thyme', 'Sedum', 'Artificial grass', 'Decomposed granite'
        ],
        "planters and edging": ['Corten steel', 'Stone', 'Fruit Trees', 'Berry Bushes', 'Plants', 'Flowers',
            'Concrete', 'Natural Stone', 'Recycled plastic', 'Bamboo'
        ],
        "outdoor furniture and decor": ['Teak', 'Wrought iron', 'Rattan', 'Fire Pits', 'Concrete', 'Ceramic',
            'Brick'
        ],
        "water features and structures": ['Natural stone', 'Fiberglass', 'Copper', 'Wood', 'Glass'],
        "lighting": ['LED lights', 'Solar-powered lights', 'Low-voltage halogen', 'Fiber optics'],
    };

    // Handle click events for initial list items
    $(".int_list_item li").click(function() {
        var materialInput = document.getElementById('material0');
        var materialTypeInput = document.getElementById('material_type0');
        var custom_instruction = document.getElementById('custom_instruction0-change-colors-texture');
        materialTypeInput.value = '';
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            materialInput.value = '';
            custom_instruction.disabled = false; // Enable the textarea
            $(".select-more-details-int").slideUp();
        } else {
            $(".int_list_item li").removeClass("active");
            $(this).addClass("active");
            materialInput.value = $(this).data('item');
            custom_instruction.disabled = true; // Disable the textarea
            $(".select-more-details-int").slideDown();

            const selectedItem = $(this).data('item');
            updateSubItems(selectedItem, '.int_mate_list_item', 0);
        }
    });

    // For exterior materials
    $(".ext_list_item li").click(function() {
        var materialInput = document.getElementById('material1');
        var materialTypeInput = document.getElementById('material_type1');
        var custom_instruction = document.getElementById('custom_instruction1-change-colors-texture');
        materialTypeInput.value = '';
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            materialInput.value = '';
            custom_instruction.disabled = false; // Enable the textarea
            $(".select-more-details-ext").slideUp();
        } else {
            $(".ext_list_item li").removeClass("active");
            $(this).addClass("active");
            materialInput.value = $(this).data('item');
            custom_instruction.disabled = true; // Disable the textarea
            $(".select-more-details-ext").slideDown();

            const selectedItem = $(this).data('item');
            updateSubItems(selectedItem, '.ext_mate_list_item', 1);
        }
    });

    // For garden materials
    $(".gar_list_item li").click(function() {
        var materialInput = document.getElementById('material2');
        var materialTypeInput = document.getElementById('material_type2');
        var custom_instruction = document.getElementById('custom_instruction2-change-colors-texture');
        materialTypeInput.value = '';
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            materialInput.value = '';
            custom_instruction.disabled = false; // Enable the textarea
            $(".select-more-details-gar").slideUp();
        } else {
            $(".gar_list_item li").removeClass("active");
            $(this).addClass("active");
            materialInput.value = $(this).data('item');
            custom_instruction.disabled = true; // Disable the textarea
            $(".select-more-details-gar").slideDown();

            const selectedItem = $(this).data('item');
            updateSubItems(selectedItem, '.gar_mate_list_item', 2);
        }
    });



    // Use event delegation for dynamically generated list items
    // $(document).on('click', '.int_mate_list_item li, .ext_mate_list_item li, .gar_mate_list_item li', function() {
    //     $(".int_mate_list_item li, .ext_mate_list_item li, .gar_mate_list_item li").removeClass("active");
    //     $(this).addClass("active");
    // });

    $(".int_mate_list_item").on('click', 'li', function() {
        $(".int_mate_list_item li").removeClass("active");
        $(this).addClass("active");

        const selectedMaterialType = $(this).text();
        $('#material_type0').val(selectedMaterialType);
    });

    $(".ext_mate_list_item").on('click', 'li', function() {
        $(".ext_mate_list_item li").removeClass("active");
        $(this).addClass("active");

        const selectedMaterialType = $(this).text();
        $('#material_type1').val(selectedMaterialType);
    });

    $(".gar_mate_list_item").on('click', 'li', function() {
        $(".gar_mate_list_item li").removeClass("active");
        $(this).addClass("active");

        const selectedMaterialType = $(this).text();
        $('#material_type2').val(selectedMaterialType);
    });

    function updateSubItems(selectedItem, subItemsSelector, sec) {
        const subItems = subItemsMapping[selectedItem] || [];
        const subItemsHtml = subItems.map(item => `<li>${item}</li>`).join('');
        $(subItemsSelector).html(subItemsHtml);

        $(`#material${sec}`).val(selectedItem);
    }
</script>
