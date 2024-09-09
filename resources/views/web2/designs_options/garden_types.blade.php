<div class="modal fade gs-modal-background" id="view_all_garden_type" role="dialog">
    <div class="modal-dialog gs-modal-container">
        <div class="modal-content gs-modal-content">
            <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                    src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg"></button>
            <h3>All Garden Type </h3>
            <div class="gs-select-room-style-row" id="allRoomTypes2">
                <div class="gs-select-room-style-single" data-room-type="Backyard" onclick="selectRoomType('Backyard',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/backyard.png">
                    <span>Backyard</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Patio" onclick="selectRoomType('Patio',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/patio.png">
                    <span>Patio</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Terrace" onclick="selectRoomType('Terrace',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/terrace.png">
                    <span>Terrace</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Front Yard" onclick="selectRoomType('Front Yard',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/front-yard.png">
                    <span>Front Yard</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Front Yard" onclick="selectRoomType('Courtyard',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/courtyard.png">
                    <span>Courtyard</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Pool Area" onclick="selectRoomType('Pool Area',2)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/pool-area.png">
                    <span>Pool Area</span>
                </div>
                @if($userActivePlan == 'free' || empty($crossShellPlan) || !in_array('Extra Rooms', $crossShellPlan))
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Porch">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/porch.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Porch</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Playground">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/playground.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Playground</span>
                    </div>
                @else
                    <div class="gs-select-room-style-single" data-room-type="Porch" onclick="selectRoomType('Porch',2)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/porch.png">
                        <span>Porch</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Playground" onclick="selectRoomType('Playground',2)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/garden/types/playground.png">
                        <span>Playground</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
