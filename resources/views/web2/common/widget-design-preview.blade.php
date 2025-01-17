<!-- Modal -->
<div class="modal fade gs-image-editing-background" id="modalImagePreview" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  gs-image-editing-container">
        <div class="modal-content gs-image-editing-content">
            <button type="button" class="gs-modal-close" data-dismiss="modal">
                <img src="{{ asset('webWidget/images/gs-close-icon.svg') }}">
            </button>
            <div class="gs-image-editing-slide-outer">
                <div class="gs-image-editing-slide">
                    <div class="gs-image-editing-slide-row">
                        <div class="search-preview-outer">
                            <div class="mainSection">
                                <div id="one" class="bal-container">
                                    <div class="bal-after">
                                        <img src="" id="mip_before" class="inked"
                                            alt="results when using beautiful redesign with ai">
                                        <div class="bal-afterPosition afterLabel"> </div>
                                    </div>
                                    <div class="bal-before-outer">
                                        <div class="bal-before">
                                            <div class="bal-before-inset"> <img id="mip_after"
                                                    alt="ai beautiful redesign before generating">
                                                <div class="bal-beforePosition beforeLabel"> </div>
                                            </div>
                                        </div>
                                        <div class="bal-handle left-right-arrow-slider"> <span
                                                class=" handle-left-arrow"></span> <span
                                                class="handle-right-arrow"></span> </div>
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
