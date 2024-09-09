<div class="modal fade gs-modal-background" id="view_all_interior_room_type" role="dialog">
    <div class="modal-dialog gs-modal-container">
        <div class="modal-content gs-modal-content">
            <button type="button" class="gs-modal-close" data-dismiss="modal"><img
                    src="https://homedesigns-ai.b-cdn.net/web2/images/gs-close-icon.svg"></button>
            <h3>All Room Types</h3>
            <div class="gs-select-room-style-row" id="allRoomTypes0">
                <div class="gs-select-room-style-single" data-room-type="Living Room"
                    onclick="selectRoomType('Living Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/living room.png">
                    <span>Living Room</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Bedroom"
                    onclick="selectRoomType('Bedroom',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bedroom.png">
                    <span>Bedroom</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Bathroom"
                    onclick="selectRoomType('Bathroom',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/bathroom.png">
                    <span>Bathroom</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Kitchen"
                    onclick="selectRoomType('Kitchen',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/kitchen.png">
                    <span>Kitchen</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Dining Room"
                    onclick="selectRoomType('Dining Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/dinig room.png">
                    <span>Dining Room</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Attic"
                    onclick="selectRoomType('Attic',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/attic.png">
                    <span>Attic</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Study Room"
                    onclick="selectRoomType('Study Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/study room.png">
                    <span>Study Room</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Home Office"
                    onclick="selectRoomType('Home Office',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home office.png">
                    <span>Home Office</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Family Room"
                    onclick="selectRoomType('Family Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/family room.png">
                    <span>Family Room</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Formal Dining Room"
                    onclick="selectRoomType('Formal Dining Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/formal dining room.png">
                    <span>Formal Dining Room</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Kids Room"
                    onclick="selectRoomType('Kids Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/kids room.png">
                    <span>Kids Room</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Balcony"
                    onclick="selectRoomType('Balcony',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/balcony.png">
                    <span>Balcony</span>
                </div>
                <div class="gs-select-room-style-single" data-room-type="Gaming Room"
                    onclick="selectRoomType('Gaming Room',0)">
                    <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/gaming room.png">
                    <span>Gaming Room</span>
                </div>
                @if ($userActivePlan == 'free')
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Meeting Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/meeting room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Meeting Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Workshop">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/workshop.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Workshop</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Fitness Gym">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/fitness gym.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Fitness Gym</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Coffee Shop">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/coffee shop.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Coffee Shop</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Clothing Store">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/clothing store.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Clothing Store</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Restaurant">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/interior/room types/restaurant.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Restaurant</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Office">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/OFFICE.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Office</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Coworking Space">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/coworking space.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Coworking Space</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Hotel Lobby">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/hotel lobby.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Hotel Lobby</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Hotel Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/hotel room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Hotel Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Hotel Bathroom">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/hotel bathroom.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Hotel Bathroom</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Exhibition Space">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/exhibition space.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Exhibition Space</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Onsen">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/onsen.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Onsen</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Working Space">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/working space.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Working Space</span>
                    </div>
                @else
                    <div class="gs-select-room-style-single" data-room-type="Workshop"
                        onclick="selectRoomType('Workshop',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/workshop.png">
                        <span>Workshop</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Meeting Room"
                        onclick="selectRoomType('Meeting Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/meeting room.png">
                        <span>Meeting Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Fitness Gym"
                        onclick="selectRoomType('Fitness Gym',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/fitness gym.png">
                        <span>Fitness Gym</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Coffee Shop"
                        onclick="selectRoomType('Coffee Shop',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/coffee shop.png">
                        <span>Coffee Shop</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Clothing Store"
                        onclick="selectRoomType('Clothing Store',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/clothing store.png">
                        <span>Clothing Store</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Restaurant"
                        onclick="selectRoomType('Restaurant',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/restaurant.png">
                        <span>Restaurant</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Office"
                        onclick="selectRoomType('Office',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/OFFICE.png">
                        <span>Office</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Coworking Space"
                        onclick="selectRoomType('Coworking Space',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/coworking space.png">
                        <span>Coworking Space</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="hotel Lobby"
                        onclick="selectRoomType('hotel Lobby',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/hotel lobby.png">
                        <span>Hotel Lobby</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Hotel Room"
                        onclick="selectRoomType('Hotel Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/hotel room.png">
                        <span>Hotel Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Hotel Bathroom"
                        onclick="selectRoomType('Hotel Bathroom',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/hotel bathroom.png">
                        <span>Hotel Bathroom</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Exhibition Space"
                        onclick="selectRoomType('Exhibition Space',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/exhibition space.png">
                        <span>Exhibition Space</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Onsen"
                        onclick="selectRoomType('Onsen',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/onsen.png">
                        <span>Onsen</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Working Space"
                        onclick="selectRoomType('Working Space',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/working space.png">
                        <span>Working Space</span>
                    </div>
                @endif
                @if($precisionUser == true)
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Wine Cellar">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/wine cellar.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Wine Cellar</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Rooftop Terrace">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/rooftop terrace.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Rooftop Terrace</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Sunroom">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/sunroom.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Sunroom</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Home Spa">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home spa.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Home Spa</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Mudroom">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/mudroom.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Mudroom</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Craft Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/craft-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Craft Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Dressing Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/dressing-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Dressing Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Guest Bedroom">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/guest-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Guest Bedroom</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Home Bar">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home-bar.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Home Bar</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Library">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/library.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Library</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Art Studio">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/art-studio.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Art Studio</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Yoga Studio">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/yoga-studio.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Yoga Studio</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Photo Studio">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/photo-studio.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Photo Studio</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Multimedia Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/multimedia-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Multimedia Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Auditorium">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/auditorium.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Auditorium</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Medical Exam Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/medical-exam-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Medical Exam Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Reception Area">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/reception-area.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Reception Area</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Music Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/music-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Music Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Science Laboratory">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/science-laboratory.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Science Laboratory</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_feature_modal" data-room-type="Home Theater">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home-theater.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Home Theater</span>
                    </div>
                @else
                    <div class="gs-select-room-style-single" data-room-type="Wine Cellar"
                        onclick="selectRoomType('Wine Cellar',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/wine cellar.png">
                        <span>Wine Cellar</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Rooftop Terrace"
                        onclick="selectRoomType('Rooftop Terrace',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/rooftop terrace.png">
                        <span>Rooftop Terrace</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Sunroom"
                        onclick="selectRoomType('Sunroom',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/sunroom.png">
                        <span>Sunroom</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Home Spa"
                        onclick="selectRoomType('Home Spa',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home spa.png">
                        <span>Home Spa</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Mudroom"
                        onclick="selectRoomType('Mudroom',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/mudroom.png">
                        <span>Mudroom</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Craft Room"
                        onclick="selectRoomType('Craft Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/craft-room.png">
                        <span>Craft Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Dressing Room"
                        onclick="selectRoomType('Dressing Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/dressing-room.png">
                        <span>Dressing Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Guest Bedroom"
                        onclick="selectRoomType('Guest Bedroom',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/guest-room.png">
                        <span>Guest Bedroom</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Home Bar"
                        onclick="selectRoomType('Home Bar',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home-bar.png">
                        <span>Home Bar</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Library"
                        onclick="selectRoomType('Library',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/library.png">
                        <span>Library</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Art Studio"
                        onclick="selectRoomType('Art Studio',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/art-studio.png">
                        <span>Art Studio</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Yoga Studio"
                        onclick="selectRoomType('Yoga Studio',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/yoga-studio.png">
                        <span>Yoga Studio</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Photo Studio"
                        onclick="selectRoomType('Photo Studio',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/photo-studio.png">
                        <span>Photo Studio</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Multimedia Room"
                        onclick="selectRoomType('Multimedia Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/multimedia-room.png">
                        <span>Multimedia Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Auditorium"
                        onclick="selectRoomType('Auditorium',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/auditorium.png">
                        <span>Auditorium</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Medical Exam Room"
                        onclick="selectRoomType('Medical Exam Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/medical-exam-room.png">
                        <span>Medical Exam Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Reception Area"
                        onclick="selectRoomType('Reception Area',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/reception-area.png">
                        <span>Reception Area</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Music Room"
                        onclick="selectRoomType('Music Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/music-room.png">
                        <span>Music Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Science Laboratory"
                        onclick="selectRoomType('Science Laboratory',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/science-laboratory.png">
                        <span>Science Laboratory</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Home Theater"
                        onclick="selectRoomType('Home Theater',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home-theater.png">
                        <span>Home Theater</span>
                    </div>
                @endif
                @if($userActivePlan == 'free' || empty($crossShellPlan) || !in_array('Extra Rooms', $crossShellPlan))
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Wedding Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/wedding-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Wedding Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Laundry Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/laundry-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Laundry Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Outdoor Kitchen">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/outdoor-kitchen.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Outdoor Kitchen</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Utility Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/utility-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Utility Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Pet Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/pet-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Pet Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Home Gym">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home-gym.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Home Gym</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Lounge">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/lounge.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Lounge</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Walk in Closet">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/walk-in-closet.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Walk in Closet</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Playroom">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/playroom.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Playroom</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Reading Nook">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/reading-nook.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Reading Nook</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Sauna">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/sauna.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Sauna</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Man Cave">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/man-cave.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Man Cave</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Foyer">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/foyer.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Foyer</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Greenhouse">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/greenhouse.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Greenhouse</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="She Shed">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/she-shed.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>She Shed</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Conservatory">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/conservatory.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Conservatory</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Nursery">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/nursery.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Nursery</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Prayer Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/prayer-room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Prayer Room</span>
                    </div>
                    <div class="gs-select-room-style-single premium_feature_types paid_roomtype_feature_modal" data-room-type="Open Kitchen Living Room">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/open kitchen living room.png">
                        <img class="premium_lock_icons" src="https://homedesigns-ai.b-cdn.net/web2/images/gs-prompt-lock-icon.svg">
                        <span>Open Kitchen Living Room</span>
                    </div>
                @else
                    <div class="gs-select-room-style-single" data-room-type="Wedding Room"
                        onclick="selectRoomType('Wedding Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/wedding-room.png">
                        <span>Wedding Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Laundry Room"
                        onclick="selectRoomType('Laundry Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/laundry-room.png">
                        <span>Laundry Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Outdoor Kitchen"
                        onclick="selectRoomType('Outdoor Kitchen',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/outdoor-kitchen.png">
                        <span>Outdoor Kitchen</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Utility Room"
                        onclick="selectRoomType('Utility Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/utility-room.png">
                        <span>Utility Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Pet Room"
                        onclick="selectRoomType('Pet Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/pet-room.png">
                        <span>Pet Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Home Gym"
                        onclick="selectRoomType('Home Gym',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/home-gym.png">
                        <span>Home Gym</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Lounge"
                        onclick="selectRoomType('Lounge',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/lounge.png">
                        <span>Lounge</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Walk in Closet"
                        onclick="selectRoomType('Walk in Closet',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/walk-in-closet.png">
                        <span>Walk in Closet</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Playroom"
                        onclick="selectRoomType('Playroom',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/playroom.png">
                        <span>Playroom</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Reading Nook"
                        onclick="selectRoomType('Reading Nook',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/reading-nook.png">
                        <span>Reading Nook</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Sauna"
                        onclick="selectRoomType('Sauna',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/sauna.png">
                        <span>Sauna</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Man Cave"
                        onclick="selectRoomType('Man Cave',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/man-cave.png">
                        <span>Man Cave</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Foyer"
                        onclick="selectRoomType('Foyer',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/foyer.png">
                        <span>Foyer</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Greenhouse"
                        onclick="selectRoomType('Greenhouse',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/greenhouse.png">
                        <span>Greenhouse</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="She Shed"
                        onclick="selectRoomType('She Shed',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/she-shed.png">
                        <span>She Shed</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Conservatory"
                        onclick="selectRoomType('Conservatory',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/conservatory.png">
                        <span>Conservatory</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Nursery"
                        onclick="selectRoomType('Nursery',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/nursery.png">
                        <span>Nursery</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Prayer Room"
                        onclick="selectRoomType('Prayer Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/prayer-room.png">
                        <span>Prayer Room</span>
                    </div>
                    <div class="gs-select-room-style-single" data-room-type="Open Kitchen Living Room"
                        onclick="selectRoomType('Open Kitchen Living Room',0)">
                        <img src="https://homedesigns-ai.b-cdn.net/web2/images/interior/room types/open kitchen living room.png">
                        <span>Open Kitchen Living Room</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
