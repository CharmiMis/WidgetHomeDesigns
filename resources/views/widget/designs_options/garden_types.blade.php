<div class="modal fade gs-modal-background" id="view_all_garden_type" role="dialog">
    <div class="modal-dialog gs-modal-container">
        <div class="modal-content gs-modal-content">
            <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                    src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg"></button>
            <h3>{{ trans('garden_types.all_garden_type') }}</h3>
            <div class="gs-select-room-style-row" id="allRoomTypes2">
                <div class="gs-select-room-style-single" data-room-type="Backyard" onclick="selectRoomType('Backyard',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/backyard.png">
                    <span>{{ trans('garden_types.backyard') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Patio" onclick="selectRoomType('Patio',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/patio.png">
                    <span>{{ trans('garden_types.patio') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Terrace" onclick="selectRoomType('Terrace',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/terrace.png">
                    <span>{{ trans('garden_types.terrace') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Front Yard" onclick="selectRoomType('Front Yard',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/front-yard.png">
                    <span>{{ trans('garden_types.front_yard') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Front Yard" onclick="selectRoomType('Courtyard',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/courtyard.png">
                    <span>{{ trans('garden_types.courtyard') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Pool Area" onclick="selectRoomType('Pool Area',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/pool-area.png">
                    <span>{{ trans('garden_types.pool_area') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Porch" onclick="selectRoomType('Porch',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/porch.png">
                    <span>{{ trans('garden_types.porch') }}</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Playground" onclick="selectRoomType('Playground',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/playground.png">
                    <span>{{ trans('garden_types.playground') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
