    <div class="modal fade gs-modal-background" id="view_all_interior_choose_design" role="dialog">
        <div class="modal-dialog gs-modal-container">
            <div class="modal-content gs-modal-content">
                <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                        src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg"></button>
                <h3>All Design Styles</h3>
                <div class="gs-select-room-style-row" id="allDesignStyles0">
                    <div class="gs-select-room-style-single" data-design-style="No Style"
                        onclick="selectDesignStyle('No Style',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/select-room-type1.png">
                        <span>No Style - Image Improvement Only</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Eclectic"
                        onclick="selectDesignStyle('Eclectic',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/eclectic.png">
                        <span>Eclectic</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Modern"
                        onclick="selectDesignStyle('Modern',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/modern.png">
                        <span>Modern</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Contemporary"
                        onclick="selectDesignStyle('Contemporary',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/contemporary.png">
                        <span>Contemporary</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Transitional"
                        onclick="selectDesignStyle('Transitional',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/transitional.png">
                        <span>Transitional</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Scandinavian"
                        onclick="selectDesignStyle('Scandinavian',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/scandinavian.png">
                        <span>Scandinavian</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Mediterranean"
                        onclick="selectDesignStyle('Mediterranean',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/mediterranean.png">
                        <span>Mediterranean </span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Ikea"
                        onclick="selectDesignStyle('Ikea',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/ikea.png">
                        <span>Ikea</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Industrial"
                        onclick="selectDesignStyle('Industrial',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/industrial.png">
                        <span>Industrial</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Quiet Luxury"
                        onclick="selectDesignStyle('Quiet Luxury',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/quiet luxury.png">
                        <span>Quiet Luxury</span>
                    </div>
                    <div class="gs-select-room-style-single" data-design-style="Kids Room"
                        onclick="selectDesignStyle('Kids Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/kids room.png">
                        <span>Kids Room</span>
                    </div>

                    @if ($userActivePlan == 'free')
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Shabby Chic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/shabby chic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Shabby Chic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Coastal">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/coastal.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Coastal</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Bauhaus">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/bahaus.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Bauhaus</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Bohemian">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/bohemian.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Bohemian</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Traditional">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/traditional.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Traditional</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Rustic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/rustic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Rustic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Minimalism">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/minimalism.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Minimalism</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Japandi">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/japandi.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Japandi</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Japanese Design">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/japanese design.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Japanese Design</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Modern Arabic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/modern arabic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Modern Arabic</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Traditional Arabic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/kids room.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Traditional Arabic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Bali">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/bali.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Bali</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Tropical">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/tropical.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Tropical</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Asian Decor">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/asian decor.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Asian Decor</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Zen">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/zen.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Zen</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Hollywood Regency">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/hollywood regency.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Hollywood Regency</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Hollywood Glam">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/hollywood glam.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Hollywood Glam</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Minimalist">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/minimalist.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Minimalist</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Christmas">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/christmas.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Christmas</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Futuristic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/futuristic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Futuristic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Luxurious">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/luxurious.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Luxurious</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Midcentury Modern">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/midcentury modern.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Midcentury Modern</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Biophilic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/biophilic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Biophilic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Cottage Core">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/cottage core.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Cottage Core</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="French Country">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/french country.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>French Country</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Art Deco">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/art deco.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Art Deco</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Art Nouveau">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/art noveau.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Art Nouveau</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="South Western">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/south western.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>South Western</span>
                        </div>

                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Modern Farm House">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/modern farmhouse.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Modern Farm House</span>
                        </div>
                    @else
                        <div class="gs-select-room-style-single" data-design-style="Shabby Chic"
                            onclick="selectDesignStyle('Shabby Chic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/shabby chic.png">
                            <span>Shabby Chic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Coastal"
                            onclick="selectDesignStyle('Coastal',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/coastal.png">
                            <span>Coastal</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Bauhaus"
                            onclick="selectDesignStyle('Bauhaus',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/bahaus.png">
                            <span>Bauhaus</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Bohemian"
                            onclick="selectDesignStyle('Bohemian',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/bohemian.png">
                            <span>Bohemian</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Traditional"
                            onclick="selectDesignStyle('Traditional',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/traditional.png">
                            <span>Traditional</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Rustic"
                            onclick="selectDesignStyle('Rustic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/rustic.png">
                            <span>Rustic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Minimalism"
                            onclick="selectDesignStyle('Minimalism',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/minimalism.png">
                            <span>Minimalism</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Japandi"
                            onclick="selectDesignStyle('Japandi',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/japandi.png">
                            <span>Japandi</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Japanese Design"
                            onclick="selectDesignStyle('Japanese Design',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/japanese design.png">
                            <span>Japanese Design</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Modern Arabic"
                            onclick="selectDesignStyle('Modern Arabic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/modern arabic.png">
                            <span>Modern Arabic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Traditional Arabic"
                            onclick="selectDesignStyle('Traditional Arabic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/modern farmhouse.png">
                            <span>Traditional Arabic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Bali"
                            onclick="selectDesignStyle('Bali',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/bali.png">
                            <span>Bali</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Tropical"
                            onclick="selectDesignStyle('Tropical',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/tropical.png">
                            <span>Tropical</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Asian Decor"
                            onclick="selectDesignStyle('Asian Decor',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/asian decor.png">
                            <span>Asian Decor</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Zen"
                            onclick="selectDesignStyle('Zen',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/zen.png">
                            <span>Zen</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Hollywood Regency"
                            onclick="selectDesignStyle('Hollywood Regency',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/hollywood regency.png">
                            <span>Hollywood Regency</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Hollywood Glam"
                            onclick="selectDesignStyle('Hollywood Glam',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/hollywood glam.png">
                            <span>Hollywood Glam</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Minimalist"
                            onclick="selectDesignStyle('Minimalist',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/minimalist.png">
                            <span>Minimalist</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Christmas"
                            onclick="selectDesignStyle('Christmas',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/christmas.png">
                            <span>Christmas</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Futuristic"
                            onclick="selectDesignStyle('Futuristic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/futuristic.png">
                            <span>Futuristic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Luxurious"
                            onclick="selectDesignStyle('Luxurious',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/luxurious.png">
                            <span>Luxurious</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Midcentury Modern"
                            onclick="selectDesignStyle('Midcentury Modern',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/midcentury modern.png">
                            <span>Midcentury Modern</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Biophilic"
                            onclick="selectDesignStyle('Biophilic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/biophilic.png">
                            <span>Biophilic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Cottage Core"
                            onclick="selectDesignStyle('Cottage Core',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/cottage core.png">
                            <span>Cottage Core</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="French Country"
                            onclick="selectDesignStyle('French Country',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/french country.png">
                            <span>French Country</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Art Deco"
                            onclick="selectDesignStyle('Art Deco',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/art deco.png">
                            <span>Art Deco</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Art nouveau"
                            onclick="selectDesignStyle('Art nouveau',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/art noveau.png">
                            <span>Art nouveau</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="South Western"
                            onclick="selectDesignStyle('South Western',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/south western.png">
                            <span>South Western</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Modern Farm House"
                            onclick="selectDesignStyle('Modern Farm House',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/modern farmhouse.png">
                            <span>Modern Farm House</span>
                        </div>
                    @endif

                    @if ($precisionUser == true && !$api_user)
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Moroccan">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/moroccan.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Moroccan</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Gothic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/gothic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Gothic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Victorian">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/victorian.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Victorian</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Steampunk">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/steampunk.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Steampunk</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Urban Modern">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/urban modern.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Urban Modern</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Desert Modernism">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/desert modernism.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Desert Modernism</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Colonial">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/colonial.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Colonial</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Brutalist">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/brutalist.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Brutalist</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Nordic Noir">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/nordic noir.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Nordic Noir</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Postmodern">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/postmodern.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Postmodern</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Psychedelic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/psychedelic.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Psychedelic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Cosmic Chic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/cosmic chic.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Cosmic Chic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Mexican Hacienda">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/mexican hacienda.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Mexican Hacienda</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Coastal Modern">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/coastal modern.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Coastal Modern</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_feature_modal"
                            data-design-style="Eco Friendly">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/eco frienly.png">
                            <img class="premium_lock_icons"
                                src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Eco Friendly</span>
                        </div>
                    @else
                        <div class="gs-select-room-style-single" data-design-style="Moroccan"
                            onclick="selectDesignStyle('Moroccan',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/moroccan.png">
                            <span>Moroccan</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Gothic"
                            onclick="selectDesignStyle('Gothic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/gothic.png">
                            <span>Gothic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Victorian"
                            onclick="selectDesignStyle('Victorian',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/victorian.png">
                            <span>Victorian</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Steampunk"
                            onclick="selectDesignStyle('Steampunk',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/steampunk.png">
                            <span>Steampunk</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Urban Modern"
                            onclick="selectDesignStyle('Urban Modern',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/urban modern.png">
                            <span>Urban Modern</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Desert Modernism"
                            onclick="selectDesignStyle('Desert Modernism',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/desert modernism.png">
                            <span>Desert Modernism </span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Colonial"
                            onclick="selectDesignStyle('Colonial',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/colonial.png">
                            <span>Colonial</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Brutalist"
                            onclick="selectDesignStyle('Brutalist',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/brutalist.png">
                            <span>Brutalist</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Nordic Noir"
                            onclick="selectDesignStyle('Nordic Noir',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/nordic noir.png">
                            <span>Nordic Noir</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Postmodern"
                            onclick="selectDesignStyle('Postmodern',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/postmodern.png">
                            <span>Postmodern</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Psychedelic"
                            onclick="selectDesignStyle('Psychedelic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/psychedelic.png">
                            <span>Psychedelic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Cosmic Chic"
                            onclick="selectDesignStyle('Cosmic Chic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/cosmic chic.png">
                            <span>Cosmic Chic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Mexican Hacienda"
                            onclick="selectDesignStyle('Mexican Hacienda',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/mexican hacienda.png">
                            <span>Mexican Hacienda</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Coastal Modern"
                            onclick="selectDesignStyle('Coastal Modern',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/coastal modern.png">
                            <span>Coastal Modern</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Eco Friendly"
                            onclick="selectDesignStyle('Eco Friendly',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/eco frienly.png">
                            <span>Eco Friendly</span>
                        </div>
                    @endif

                    @if($userActivePlan == 'free' || empty($crossShellPlan) || !in_array('Extra Styles', $crossShellPlan))
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Pop Art">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/pop art.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Pop Art</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Vintage Glam">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/vintage glam.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Vintage Glam</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Candy Land">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/candy land.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Candy Land</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Barbie">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/barbie.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Barbie</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Doodle">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/doodle.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Doodle</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Sketch">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/sketch.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Sketch</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Maximalist">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/maximalist.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Maximalist</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Professional">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/professional.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Professional</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="AirBnb">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/airbnb.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>AirBnb</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Halloween">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/halloween.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Halloween</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Retro">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/retro.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Retro</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Romantic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/romantic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Romantic</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Glam Rock">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/glam rock.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Glam Rock</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Safari">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/safari.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Safari</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Tuscan">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/tuscan.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Tuscan</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Nautical">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/nautical.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Nautical</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Craftman">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/craftman.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Craftman</span>
                        </div>
                         <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Farmhouse Chic">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/farmhouse chic.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Farmhouse Chic</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Prairie">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/praire.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Prairie</span>
                        </div>
                        <div class="gs-select-room-style-single premium_feature_types paid_style_feature_modal"
                            data-design-style="Cubism">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/cubism.png">
                            <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                            <span>Cubism</span>
                        </div>
                    @else
                        <div class="gs-select-room-style-single" data-design-style="Pop Art"
                            onclick="selectDesignStyle('Pop Art',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/pop art.png">
                            <span>Pop Art</span>
                        </div>
                         <div class="gs-select-room-style-single" data-design-style="Vintage Glam"
                            onclick="selectDesignStyle('Vintage Glam',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/vintage glam.png">
                            <span>Vintage Glam</span>
                        </div>
                         <div class="gs-select-room-style-single" data-design-style="Candy Land"
                            onclick="selectDesignStyle('Candy Land',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/candy land.png">
                            <span>Candy Land</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Barbie"
                            onclick="selectDesignStyle('Barbie',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/barbie.png">
                            <span>Barbie</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Doodle"
                            onclick="selectDesignStyle('Doodle',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/doodle.png">
                            <span>Doodle</span>
                        </div>
                          <div class="gs-select-room-style-single" data-design-style="Sketch"
                            onclick="selectDesignStyle('Sketch',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/sketch.png">
                            <span>Sketch</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Maximalist"
                            onclick="selectDesignStyle('Maximalist',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/maximalist.png">
                            <span>Maximalist</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Professional"
                            onclick="selectDesignStyle('Professional',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/professional.png">
                            <span>Professional</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="AirBnb"
                            onclick="selectDesignStyle('AirBnb',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/airbnb.png">
                            <span>AirBnb</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Halloween"
                            onclick="selectDesignStyle('Halloween',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/hollywood regency.png">
                            <span>Halloween</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Retro"
                            onclick="selectDesignStyle('Retro',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/retro.png">
                            <span>Retro</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Romantic"
                            onclick="selectDesignStyle('Romantic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/romantic.png">
                            <span>Romantic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Glam Rock"
                            onclick="selectDesignStyle('Glam Rock',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/glam rock.png">
                            <span>Glam Rock</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Safari"
                            onclick="selectDesignStyle('Safari',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/safari.png">
                            <span>Safari</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Tuscan"
                            onclick="selectDesignStyle('Tuscan',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/tuscan.png">
                            <span>Tuscan</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Nautical"
                            onclick="selectDesignStyle('Nautical',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/nautical.png">
                            <span>Nautical</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Craftman"
                            onclick="selectDesignStyle('Craftman',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/craftman.png">
                            <span>Craftman</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Farmhouse Chic"
                            onclick="selectDesignStyle('Farmhouse Chic',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/farmhouse chic.png">
                            <span>Farmhouse Chic</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Prairie"
                            onclick="selectDesignStyle('Prairie',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/praire.png">
                            <span>Prairie</span>
                        </div>
                        <div class="gs-select-room-style-single" data-design-style="Cubism"
                            onclick="selectDesignStyle('Cubism',0)">
                            <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/interior styles/cubism.png">
                            <span>Cubism</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
