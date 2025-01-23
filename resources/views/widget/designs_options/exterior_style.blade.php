<div class="modal fade gs-modal-background" id="view_all_exterior_choose_design" role="dialog">
    <div class="modal-dialog gs-modal-container">
        <div class="modal-content gs-modal-content">
            <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                    src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg"></button>
            <h3>{{ trans('exterior_style.all_design_styles') }}</h3>
            <div class="gs-select-room-style-row" id="allDesignStyles1">
                <div class="gs-select-room-style-single" data-design-style="No Style"
                    onclick="selectDesignStyle('No Style',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/select-room-type1.png">
                    <span>{{ trans('exterior_style.no_style') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Modern"
                    onclick="selectDesignStyle('Modern',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/modern.png">
                    <span>{{ trans('exterior_style.modern') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Mediterranean"
                    onclick="selectDesignStyle('Mediterranean',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/mediterranean.png">
                    <span>{{ trans('exterior_style.mediterranean') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="International"
                    onclick="selectDesignStyle('International',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/international.png">
                    <span>{{ trans('exterior_style.international') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Moody Colors"
                    onclick="selectDesignStyle('Moody Colors',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/moody colors.png">
                    <span>{{ trans('exterior_style.moody_colors') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Wood Accents"
                    onclick="selectDesignStyle('Wood Accents',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/wood accents.png">
                    <span>{{ trans('exterior_style.wood_accents') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Bohemian"
                    onclick="selectDesignStyle('Bohemian',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/bohemian.png">
                    <span>{{ trans('exterior_style.bohemian') }} </span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Industrial"
                    onclick="selectDesignStyle('Industrial',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/industrial.png">
                    <span>{{ trans('exterior_style.industrial') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Retreat"
                    onclick="selectDesignStyle('Retreat',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/retreat.png">
                    <span>{{ trans('exterior_style.retreat') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Elegant"
                    onclick="selectDesignStyle('Elegant',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/elegant.png">
                    <span>{{ trans('exterior_style.elegant') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Painted Brick"
                    onclick="selectDesignStyle('Painted Brick',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/painted brick.png">
                    <span>{{ trans('exterior_style.painted_brick') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Red Brick"
                    onclick="selectDesignStyle('Red Brick',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/red brick.png">
                    <span>{{ trans('exterior_style.red_brick') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Modern Blend"
                    onclick="selectDesignStyle('Modern Blend',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/modern blend.png">
                    <span>{{ trans('exterior_style.modern_blend') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Stone Clad"
                    onclick="selectDesignStyle('Stone Clad',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/stone clad.png">
                    <span>{{ trans('exterior_style.stone_clad') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Glass House"
                    onclick="selectDesignStyle('Glass House',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/glass house.png">
                    <span>{{ trans('exterior_style.glass_house') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Ranch"
                    onclick="selectDesignStyle('Ranch',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/ranch.png">
                    <span>{{ trans('exterior_style.ranch') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Modern Farm House"
                    onclick="selectDesignStyle('Modern Farm House',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/modern farmhouse.png">
                    <span>{{ trans('exterior_style.modern_farm_house') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Portuguese"
                    onclick="selectDesignStyle('Portuguese',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/portugese.png">
                    <span>{{ trans('exterior_style.portuguese') }} </span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Traditional"
                    onclick="selectDesignStyle('Traditional',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/traditional.png">
                    <span>{{ trans('exterior_style.traditional') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Craftsman"
                    onclick="selectDesignStyle('Craftsman',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/craftsman.png">
                    <span>{{ trans('exterior_style.craftsman') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Tudor"
                    onclick="selectDesignStyle('Tudor',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/tudor.png">
                    <span>{{ trans('exterior_style.tudor') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Prairie"
                    onclick="selectDesignStyle('Prairie',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/praire.png">
                    <span>{{ trans('exterior_style.prairie') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Chalet"
                    onclick="selectDesignStyle('Chalet',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/chalet.png">
                    <span>Ch{{ trans('exterior_style.chalet') }}alet</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Colonial"
                    onclick="selectDesignStyle('Colonial',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/colonial.png">
                    <span>{{ trans('exterior_style.colonial') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Dutch Colonial"
                    onclick="selectDesignStyle('Dutch Colonial',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/dutch colonial.png">
                    <span>{{ trans('exterior_style.dutch_colonial') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Georgian"
                    onclick="selectDesignStyle('Georgian',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/georgian.png">
                    <span>{{ trans('exterior_style.georgian') }}</span>
                </div>

                <div class="gs-select-room-style-single" data-design-style="Green"
                    onclick="selectDesignStyle('Green',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/green.png">
                    <span>{{ trans('exterior_style.green') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Contemporary"
                    onclick="selectDesignStyle('Contemporary',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/contemporary.png">
                    <span>{{ trans('exterior_style.contemporary') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Christmas"
                    onclick="selectDesignStyle('Christmas',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/christmas.png">
                    <span>{{ trans('exterior_style.christmas') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Cottage"
                    onclick="selectDesignStyle('Cottage',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/cottage.png">
                    <span>{{ trans('exterior_style.cottage') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Farmhouse"
                    onclick="selectDesignStyle('Farmhouse',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/farmhouse.png">
                    <span>{{ trans('exterior_style.farmhouse') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="French Country"
                    onclick="selectDesignStyle('French Country',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/french country.png">
                    <span>{{ trans('exterior_style.french_country') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Futuristic"
                    onclick="selectDesignStyle('Futuristic',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/futuristic.png">
                    <span>{{ trans('exterior_style.futuristic') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Gothic"
                    onclick="selectDesignStyle('Gothic',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/gothic.png">
                    <span>{{ trans('exterior_style.gothic') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Greek Revival"
                    onclick="selectDesignStyle('Greek Revival',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/greek revival.png">
                    <span>{{ trans('exterior_style.greek_revival') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Mansion"
                    onclick="selectDesignStyle('Mansion',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/mansion.png">
                    <span>{{ trans('exterior_style.mansion') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Townhouse"
                    onclick="selectDesignStyle('Townhouse',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/townhouse.png">
                    <span>{{ trans('exterior_style.townhouse') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Victorian"
                    onclick="selectDesignStyle('Victorian',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/victorian.png">
                    <span>{{ trans('exterior_style.victorian') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Corporate building"
                    onclick="selectDesignStyle('Corporate building',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/corporate building.png">
                    <span>{{ trans('exterior_style.corporate_building') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-design-style="Baroque"
                    onclick="selectDesignStyle('Baroque',1)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/exterior/exterior styles/corporate building.png">
                    <span>{{ trans('exterior_style.baroque') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
