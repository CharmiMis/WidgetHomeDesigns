<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'GPU_SERVER_HOST' => env('GPU_SERVER_HOST', ''),
    'FASTSPRING_USER' => env('FASTSPRING_USER', ''),
    'CLICK_BANK_USER' => env('CLICK_BANK_USER', ''),
    'API_GPU_SERVER_HOST' => env('API_GPU_SERVER_HOST', ''),
    'API_BRONZE_CREDIT' => env('API_BRONZE_CREDIT', ''),
    'API_SILVER_CREDIT' => env('API_SILVER_CREDIT', ''),
    'API_GOLD_CREDIT' => env('API_GOLD_CREDIT', ''),
    'API_SME_CREDIT' => env('API_SME_CREDIT', ''),
    'API_SME_NEW_CREDIT' => env('API_SME_NEW_CREDIT', ''),
    'API_SME_500_API_PER_MONTH_CREDIT' => env('API_SME_500_API_PER_MONTH_CREDIT', 500),
    'API_SME_1000_API_PER_MONTH_CREDIT' => env('API_SME_1000_API_PER_MONTH_CREDIT', 1000),
    'API_SME_3000_API_PER_MONTH_CREDIT' => env('API_SME_3000_API_PER_MONTH_CREDIT', 3000),
    'API_SME_10000_API_PER_MONTH_CREDIT' => env('API_SME_10000_API_PER_MONTH_CREDIT', 10000),
    'GPU_SERVER_HOST_INIT' => env('GPU_SERVER_HOST_INIT'),
    'GPU_SECOND_SERVER_HOST_INIT' => env('GPU_SECOND_SERVER_HOST_INIT'),
    'GPU_SECOND_SERVER_HOST' => env('GPU_SECOND_SERVER_HOST'),
    'GPU_SERVER_HOST_SEG' => env('GPU_SERVER_HOST_SEG'),
    'GOOGLE_SERP_API' => env('GOOGLE_SERP_API'),
    'OPENAI_SECRET_KEY' => env('OPENAI_SECRET_KEY'),
    'GPU_SERVERLESS_BEAUTIFUL_REDESIGN' => env('GPU_SERVERLESS_BEAUTIFUL_REDESIGN'),
    'GPU_SERVERLESS_SEGMENTATION' => env('GPU_SERVERLESS_SEGMENTATION'),
    'GPU_SERVERLESS_PRECISION' => env('GPU_SERVERLESS_PRECISION'),
    'GPU_SERVERLESS_CREATIVE_REDESIGN' => env('GPU_SERVERLESS_CREATIVE_REDESIGN'),
    'GPU_SERVERLESS_COLOR_AND_TEXTURE' => env('GPU_SERVERLESS_COLOR_AND_TEXTURE'),
    'GPU_SERVERLESS_SKY_COLOR' => env('GPU_SERVERLESS_SKY_COLOR'),
    'GPU_SERVERLESS_SKETCH_TO_RENDER' => env('GPU_SERVERLESS_SKETCH_TO_RENDER'),
    'GPU_SERVERLESS_HD_GENERATE' => env('GPU_SERVERLESS_HD_GENERATE'),
    'GPU_SERVERLESS_DECOR_STAGING' => env('GPU_SERVERLESS_DECOR_STAGING'),
    'GPU_SERVERLESS_FURNITURE_REMOVAL' => env('GPU_SERVERLESS_FURNITURE_REMOVAL'),
    'GPU_SERVERLESS_FILL_SPACE' => env('GPU_SERVERLESS_FILL_SPACE'),
    'GPU_SERVERLESS_FURNITURE_FINDER' => env('GPU_SERVERLESS_FURNITURE_FINDER'),
    'GPU_SERVERLESS_STYLE_TRANSFER' => env('GPU_SERVERLESS_STYLE_TRANSFER'),
    'GPU_SERVERLESS_STYLE_TRANSFER2' => env('GPU_SERVERLESS_STYLE_TRANSFER2'),
    'GPU_SERVERLESS_COLLEGE_TO_RENDER_BEAUTIFUL' => env('GPU_SERVERLESS_COLLEGE_TO_RENDER_BEAUTIFUL'),
    'GPU_SERVERLESS_COLLEGE_TO_RENDER_CREATIVE' => env('GPU_SERVERLESS_COLLEGE_TO_RENDER_CREATIVE'),
    'GPU_SERVERLESS_COLOR_SWAP_2' => env('GPU_SERVERLESS_COLOR_SWAP_2'),
    'GPU_SERVERLESS_DESIGN_TRANSFER' => env('GPU_SERVERLESS_DESIGN_TRANSFER'),
    'GPU_SERVERLESS_FLOOR_EDITOR' => env('GPU_SERVERLESS_FLOOR_EDITOR'),
    'GPU_SERVERLESS_COLLEGE_TO_RENDER' => env('GPU_SERVERLESS_COLLEGE_TO_RENDER'),
    'GPU_SERVERLESS_ROOM_COMPOSER_STATIC_FURNITURE' => env('GPU_SERVERLESS_ROOM_COMPOSER_STATIC_FURNITURE'),
    'GPU_SERVERLESS_ROOM_COMPOSER_DYNAMIC_ROOM' => env('GPU_SERVERLESS_ROOM_COMPOSER_DYNAMIC_ROOM'),
    'RUNPOD_SERVERLESS_TOKEN' => env('RUNPOD_SERVERLESS_TOKEN'),
    'GPU_SERVERLESS_CONVINENT_REDESIGN' => env('GPU_SERVERLESS_CONVINENT_REDESIGN'),
    'GPU_SERVERLESS_TEXT_TO_DESIGN_FASTER' => env('GPU_SERVERLESS_TEXT_TO_DESIGN_FASTER'),
    'GPU_SERVERLESS_TEXT_TO_DESIGN_SLOWER' => env('GPU_SERVERLESS_TEXT_TO_DESIGN_SLOWER'),

    'GPU_SERVERLESS_BEAUTIFUL_REDESIGN_API' => env('GPU_SERVERLESS_BEAUTIFUL_REDESIGN_API'),
    'GPU_API_SERVERLESS_PRECISION' => env('GPU_SERVERLESS_PRECISION_API'),
    'GPU_API_SERVERLESS_CREATIVE_REDESIGN' => env('GPU_SERVERLESS_CREATIVE_REDESIGN_API'),
    'GPU_API_SERVERLESS_SKY_COLOR' => env('GPU_SERVERLESS_SKY_COLOR_API'),
    'GPU_API_SERVERLESS_SKETCH_TO_RENDER' => env('GPU_SERVERLESS_SKETCH_TO_RENDER_API'),
    'GPU_API_SERVERLESS_HD_GENERATE' => env('GPU_SERVERLESS_HD_GENERATE_API'),
    'GPU_API_SERVERLESS_DECOR_STAGING' => env('GPU_SERVERLESS_DECOR_STAGING_API'),
    'GPU_API_SERVERLESS_COLOR_AND_TEXTURE' => env('GPU_SERVERLESS_COLOR_AND_TEXTURE_API'),
    'GPU_API_SERVERLESS_STYLE_TRANSFER' => env('GPU_API_SERVERLESS_STYLE_TRANSFER'),
    'GPU_API_SERVERLESS_FILL_SPACE' => env('GPU_SERVERLESS_FILL_SPACE_API'),
    'GPU_API_SERVERLESS_FURNITURE_REMOVAL' => env('GPU_SERVERLESS_FURNITURE_REMOVAL_API'),
    'GPU_API_SERVERLESS_FURNITURE_FINDER' => env('GPU_SERVERLESS_FURNITURE_FINDER_API'),
    'GPU_SERVERLESS_PAINT_VISUALIZER_API' => env('GPU_SERVERLESS_PAINT_VISUALIZER_API'),
    'GPU_SERVERLESS_DESIGN_TRANSFER_API' => env('GPU_SERVERLESS_DESIGN_TRANSFER_API'),
    "GPU_SERVERLESS_GET_OBJECTS_FROM_IMAGE" => env('GPU_SERVERLESS_GET_OBJECTS_FROM_IMAGE'),
    'GPU_SERVERLESS_ROOM_COMPOSER_DYNAMIC_ROOM_API' => env('GPU_SERVERLESS_ROOM_COMPOSER_DYNAMIC_ROOM_API'),
    'GPU_SERVERLESS_ROOM_COMPOSER_STATIC_FURNITURE_API' => env('GPU_SERVERLESS_ROOM_COMPOSER_STATIC_FURNITURE_API'),
    'GPU_SERVERLESS_CONVINENT_REDESIGN_API' => env('GPU_SERVERLESS_CONVINENT_REDESIGN_API'),
    'GPU_SERVERLESS_FLOOR_EDITOR_API' => env('GPU_SERVERLESS_FLOOR_EDITOR_API'),
    'GPU_SERVERLESS_CONVINENT_REDESIGN_API_QUEUE_STATUS' => env('GPU_SERVERLESS_CONVINENT_REDESIGN_API_QUEUE_STATUS'),
    'GPU_SERVERLESS_FLOOR_EDITOR_API_QUEUE_STATUS' => env('GPU_SERVERLESS_FLOOR_EDITOR_API_QUEUE_STATUS'),
    'GPU_SERVERLESS_DYNAMIC_ROOM_API_QUEUE_STATUS' => env('GPU_SERVERLESS_DYNAMIC_ROOM_API_QUEUE_STATUS'),
    'GPU_SERVERLESS_STATIC_FURNITURE_API_QUEUE_STATUS' => env('GPU_SERVERLESS_STATIC_FURNITURE_API_QUEUE_STATUS'),
    'GPU_SERVERLESS_VIRTUAL_STAGING_API' => env('GPU_SERVERLESS_VIRTUAL_STAGING_API'),

    'GPU_SERVERLESS_FAIL_SKY_COLOR' => env('GPU_SERVERLESS_FAIL_SKY_COLOR'),
    'GPU_SERVERLESS_BACKGROUND_REMOVAL' => env('GPU_SERVERLESS_BACKGROUND_REMOVAL'),
    'GPU_SERVERLESS_FLUX_REDESIGN' => env('GPU_SERVERLESS_FLUX_REDESIGN'),
    'CUSTOM_ENTERPRISE_PLAN' => env('CUSTOM_ENTERPRISE_PLAN'),
    'CREDIT_50_PER_REMAIN' => env('CREDIT_50_PER_REMAIN'),
    'CREDIT_10_PER_REMAIN' => env('CREDIT_10_PER_REMAIN'),
    'CREDIT_0_PER_REMAIN' => env('CREDIT_0_PER_REMAIN'),
    'googleBucketName' => 'generativeartbucket',

    'custom_script_version' => 4.45, // Set your version number here
    'in_paint_v2_version' => 4.33, // Set your version number here
    'script_js_version' => 3.65, // Set your version number here
    'style_css_version' => 4.15, // Set your version number here
    'user_dash_css_version' => 3.50, // Set your version number here
    'main_style_css_version' => 3.50, // Set your version number here
    'new_style_css_version' => 2.14, // Set your version number here
    'custom_js_web2' => 1.29, // Set your version number here
    'custom_scriptWidget_version' => 1.24, // Set your version number here
    'in_paintWidget_v2_version' => 2.03, // Set your version number here
    'widgetstyle_css_version' =>  1.21,
    'api_version' => env("API_VERSION", 'v2'), // API versioning
    'test_api_token_usage' => 100,
    'JWT_SECRET_KEY' => env('JWT_SECRET_KEY'),

    'RUNPODS' => [
        [
            'id' => 1,
            'runpod_type' => 1,
            'name' => 'first_runpod',
        ],
        [
            'id' => 2,
            'runpod_type' => 1,
            'name' => 'second_runpod',
        ],
        [
            'id' => 3,
            'runpod_type' => 2,
            'name' => 'first_runpod',
        ],
        [
            'id' => 4,
            'runpod_type' => 2,
            'name' => 'second_runpod',
        ],
        // Add more runpods if needed
    ],

    'ROOM_TYPES' => [
        'living room' => 'living room',
        'bedroom' => 'bedroom',
        'bathroom' => 'bathroom',
        'kitchen' => 'kitchen',
        'dining room' => 'dining room',
        'attic' => 'attic',
        'study room' => 'study room',
        'home office' => 'home office',
        'family room' => 'family room',
        'formal dining room' => 'formal dining room',
        'home theater' => 'home theater',
        'kids room' => 'kids room',
        'balcony' => 'balcony',
        'gaming room' => 'gaming room',
        'meeting room' => 'meeting room',
        'workshop' => 'workshop',
        'fitness gym' => 'fitness gym',
        'coffee shop' => 'coffee shop',
        'clothing store' => 'clothing store',
        'restaurant' => 'restaurant',
        'office' => 'office',
        'coworking space' => 'coworking space',
        'hotel lobby' => 'hotel lobby',
        'hotel room' => 'hotel room',
        'hotel bathroom' => 'hotel bathroom',
        'exhibition space' => 'exhibition space',
        'onsen' => 'onsen',
        'working space' => 'working space',
        'wine cellar' => 'wine cellar',
        'rooftop terrace' => 'rooftop terrace',
        'sunroom' => 'sunroom',
        'home spa' => 'home spa',
        'mudroom' => 'mudroom',
        'craft room' => 'craft room',
        'dressing room' => 'dressing room',
        'guest bedroom' => 'guest bedroom',
        'home bar' => 'home bar',
        'library' => 'library',
        'art studio' => 'art studio',
        'yoga studio' => 'yoga studio',
        'photo studio' => 'photo studio',
        'multimedia room' => 'multimedia room',
        'auditorium' => 'auditorium',
        'medical exam room' => 'medical exam room',
        'reception area' => 'reception area',
        'music room' => 'music room',
        'science laboratory' => 'science laboratory',
        'wedding room' => 'wedding room',
        'laundry room' => 'laundry room',
        'outdoor kitchen' => 'outdoor kitchen',
        'utility room' => 'utility room',
        'pet room' => 'pet room',
        'home gym' => 'home gym',
        'lounge' => 'lounge',
        'walk in closet' => 'walk in closet',
        'playroom' => 'playroom',
        'reading nook' => 'reading nook',
        'sauna' => 'sauna',
        'man cave' => 'man cave',
        'foyer' => 'foyer',
        'greenhouse' => 'greenhouse',
        'she shed' => 'she shed',
        'conservatory' => 'conservatory',
        'nursery' => 'nursery',
        'prayer room' => 'prayer room',
        'open kitchen living room' => 'Open Kitchen Living Room',
    ],

    'HOUSE_ANGLE' => [
        'Side of House' => 'Side of House',
        'Front of House' => 'Front of House',
        'Back of House' => 'Back of House',
    ],
    'GARDEN_TYPE' => [
        'Backyard' => 'Backyard',
        'Patio' => 'patio',
        'Terrace' => 'Terrace',
        'Front Yard' => 'Front Yard',
        'Garden' => 'garden',
        'Courtyard' => 'Courtyard',
        'Pool Area' => 'Pool Area',
        'Porch' => 'Porch',
        'Playground' => 'Playground',
    ],

    'INTERIOR_DESIGN_STYLE' => [
        'no style' => 'no style',
        'eclectic' => 'eclectic',
        'modern' => 'modern',
        'contemporary' => 'contemporary',
        'transitional' => 'transitional',
        'scandinavian' => 'scandinavian',
        'mediterranean' => 'mediterranean',
        'ikea' => 'ikea',
        'industrial' => 'industrial',
        'kids room' => 'kids room',
        'shabby chic' => 'shabby chic',
        'coastal' => 'coastal',
        'bauhaus' => 'bauhaus',
        'bohemian' => 'bohemian',
        'traditional' => 'traditional',
        'rustic' => 'rustic',
        'minimalism' => 'minimalism',
        'japandi' => 'japandi',
        'japanese design' => 'japanese design',
        'modern arabic' => 'modern arabic',
        'traditional arabic' => 'traditional arabic',
        'bali' => 'bali',
        'tropical' => 'tropical',
        'asian decor' => 'asian decor',
        'zen' => 'zen',
        'hollywood regency' => 'hollywood regency',
        'hollywood glam' => 'hollywood glam',
        'minimalist' => 'minimalist',
        'christmas' => 'christmas',
        'futuristic' => 'futuristic',
        'luxurious' => 'luxurious',
        'midcentury modern' => 'midcentury modern',
        'biophilic' => 'biophilic',
        'cottage core' => 'cottage core',
        'french country' => 'french country',
        'art deco' => 'art deco',
        'art nouveau' => 'art nouveau',
        'south western' => 'south western',
        'modern farm house' => 'modern farm house',
        'moroccan' => 'moroccan',
        'gothic' => 'gothic',
        'victorian' => 'victorian',
        'steampunk' => 'steampunk',
        'urban modern' => 'urban modern',
        'desert modernism' => 'desert modernism',
        'colonial' => 'colonial',
        'brutalist' => 'brutalist',
        'nordic noir' => 'nordic noir',
        'postmodern' => 'postmodern',
        'psychedelic' => 'psychedelic',
        'cosmic chic' => 'cosmic chic',
        'mexican hacienda' => 'mexican hacienda',
        'coastal modern' => 'coastal modern',
        'eco friendly' => 'eco friendly',
        'pop art' => 'pop art',
        'vintage glam' => 'vintage glam',
        'candy land' => 'candy land',
        'airbnb' => 'airbnb',
        'glam rock' => 'glam rock',
        'barbie' => 'barbie',
        'doodle' => 'doodle',
        'sketch' => 'sketch',
        'maximalist' => 'maximalist',
        'professional' => 'professional',
        'halloween' => 'halloween',
        'retro' => 'retro',
        'romantic' => 'romantic',
        'safari' => 'safari',
        'tuscan' => 'tuscan',
        'nautical' => 'nautical',
        'craftman' => 'craftman',
        'farmhouse chic' => 'farmhouse chic',
        'prairie' => 'prairie',
        'cubism' => 'cubism',
        'quiet luxury' => 'quiet luxury',
        'baroque' => 'baroque',
    ],
    'EXTERIOR_DESIGN_STYLE' => [
        'no style' => 'No Style - Image Improvment Only',
        'modern' => 'modern',
        'mediterranean' => 'mediterranean',
        'international' => 'international',
        'moody colors' => 'moody colors',
        'wood accents' => 'wood accents',
        'bohemian' => 'bohemian',
        'industrial' => 'industrial',
        'retreat' => 'retreat',
        'elegant' => 'elegant',
        'painted brick' => 'painted brick',
        'red brick' => 'red brick',
        'modern blend' => 'modern blend',
        'stone clad' => 'stone clad',
        'glass house' => 'glass house',
        'ranch' => 'ranch',
        'modern farm house' => 'modern farm house',
        'portuguese' => 'portuguese',
        'traditional' => 'traditional',
        'craftsman' => 'craftsman',
        'tudor' => 'tudor',
        'prairie' => 'prairie',
        'chalet' => 'chalet',
        'colonial' => 'colonial',
        'dutch colonial' => 'dutch colonial',
        'georgian' => 'georgian',
        'green' => 'green',
        'contemporary' => 'contemporary',
        'christmas' => 'christmas',
        'cottage' => 'cottage',
        'farmhouse' => 'farmhouse',
        'french country' => 'french country',
        'futuristic' => 'futuristic',
        'gothic' => 'gothic',
        'greek revival' => 'greek revival',
        'mansion' => 'mansion',
        'townhouse' => 'townhouse',
        'victorian' => 'victorian',
        'corporate building' => 'corporate building',
        'baroque' => 'baroque',
    ],
    'GARDEN_DESIGN_STYLE' => [
        'no style' => 'No Style - Image Improvment Only',
        'modern' => 'modern',
        'city' => 'city',
        'contemporary' => 'contemporary',
        'luxury' => 'luxury',
        'apartment' => 'apartment',
        'small' => 'small',
        'vegetable' => 'vegetable',
        'low budget' => 'low budget',
        'beach' => 'beach',
        'wedding' => 'wedding',
        'rural' => 'rural',
        'mediterranean' => 'mediterranean',
        'restaurant' => 'restaurant',
        'formal' => 'formal',
        'american' => 'american',
        'english' => 'english',
        'traditional' => 'traditional',
        'cottage' => 'cottage',
        'meditation' => 'meditation',
        'coastal' => 'coastal',
        'tropical' => 'tropical',
        'christmas' => 'christmas',
    ],
    'WEATHER_TYPE' => [
        'Sunshine Color',
        'Clear Sky',
        'Rainy',
        'Cloudy',
        'Windy',
        'Dawn',
        'Dusk',
        'Twilight',
        'Sunny',
        'Night',
    ],

    'INTERIOR_COLORS' => [
        'White',
        'Off White',
        'Cream',
        'Ivory',
        'Beige',
        'Light Gray',
        'Medium Gray',
        'Charcoal',
        'Black',
        'Taupe',
        'Light Brown',
        'Chocolate Brown',
        'Espresso',
        'Navy Blue',
        'Sky Blue',
        'Pale Blue',
        'Teal',
        'Turquoise',
        'Sage Green',
        'Olive Green',
        'Forest Green',
        'Mint Green',
        'Pale Yellow',
        'Mustard Yellow',
        'Soft Pink',
        'Blush Pink',
        'Coral',
        'Peach',
        'Terracotta',
        'Burgundy',
        'Deep Red',
        'Lavender',
        'Lilac',
        'Plum',
        'Mauve',
        'Gold',
        'Silver',
        'Bronze',
        'Copper',
        'Rust',
        'Slate Blue',
        'Seafoam Green',
        'Warm White',
        'Canary Yellow',
        'Dusty Rose',
        'Burnt Orange',
        'Chartreuse',
        'Denim Blue',
        'Periwinkle',
        'Charcoal Brown'
    ],

    'INTERIOR_METERIALS' => [
        'Fabrics' => [
            'Cotton',
            'Linen',
            'Silk',
            'Velvet',
            'Wool',
            'Leather',
            'Suede',
            'Tweed',
            'Chenille',
            'Jacquard',
            'Satin',
            'Polyester',
            'Nylon',
            'Rayon',
            'Cashmere',
        ],
        'Glass' => [
            'Clear',
            'Frosted',
            'Stained',
            'Tempered',
            'Laminated',
            'Shattered',
            'Patterned',
            'Textured',
            'Seeded',
            'Colored',
            'Mirrored',
            'Etched',
            'Smoked',
            'Beveled',
            'Lead Crystal',
            'Obscured',
        ],
        'Wood' => [
            'Oak',
            'Maple',
            'Cherry',
            'Walnut',
            'Pine',
            'Teak',
            'Mahogany',
            'Bamboo',
            'Birch',
            'Rosewood',
            'Ash',
            'Cedar',
            'Hickory',
            'Alder',
            'Ebony',
        ],
        'Stone' => [
            'Marble',
            'Granite',
            'Bricks',
            'Red Bricks',
            'Limestone',
            'Slate',
            'Travertine',
            'Sandstone',
            'Quartz',
            'Onyx',
            'Basalt',
            'Terrazzo',
            'Soapstone',
            'Quartzite',
            'Dolomite',
            'Gneiss',
            'Bluestone',
        ],
        'Metal' => [
            'Steel',
            'Aluminum',
            'Brass',
            'Wrought Iron',
            'Stainless Steel',
            'Chrome',
            'Gold',
            'Silver',
            'Copper',
            'Bronze',
            'Titanium',
            'Zinc',
            'Nickel',
            'Lead',
            'Pewter',
        ],
        'Ceramics and Porcelain' => [
            'Earthenware',
            'Stoneware',
            'Porcelain',
            'Terracotta',
            'Vitreous China',
            'Bone China',
            'Glazed',
            'Matte',
            'Polished',
            'Textured',
            'Mosaic',
            'Hand-painted',
            'Crackle',
            'Metallic',
            'Luster',
        ],
        'Plastics and Polymers' => [
            'Acrylic',
            'Polyethylene',
            'PVC',
            'Polycarbonate',
            'Polypropylene',
            'ABS',
            'Epoxy',
            'Silicone',
            'Vinyl',
            'Melamine',
            'Phenolic',
            'Urethane',
            'Fiberglass',
            'Nylon',
            'Acetate',
        ],
        'Paper and Cardboard' => [
            'Wallpaper',
            'Cardboard',
            'Kraft',
            'Parchment',
            'Foil embossed',
            'Textured',
            'Handmade paper',
            'Recycled paper',
            'Flocked paper',
            'Metallic paper',
            'Vellum',
            'Linen paper',
            'Watercolor paper',
            'Matte',
            'Glossy',
        ],
        'Natural Fibers' => [
            'Jute',
            'Hemp',
            'Sisal',
            'Coir',
            'Bamboo fiber',
            'Wool',
            'Cotton',
            'Linen',
            'Silk',
            'Cashmere',
            'Mohair',
            'Alpaca',
            'Seagrass',
            'Ramie',
            'Abaca',
        ],
        'Composite Materials' => [
            'Concrete',
            'Plywood',
            'MDF',
            'Particleboard',
            'Fiberglass',
            'Corian',
            'Quartz composite',
            'Terrazzo',
            'Engineered stone',
            'Laminate',
            'Vinyl composite tile',
            'Resin',
            'Acrylic composite',
            'Carbon fiber',
            'Glass fiber reinforced concrete',
        ],
    ],

    'EXTERIOR_METERIALS' => [
        'Facade' => [
            'Brick',
            'Natural Stone',
            'Granite',
            'Fieldstone',
            'Limestone',
            'Sandstone',
            'Stucco',
            'Wood',
            'Vinyl',
            'Fiber cement',
            'Metal',
            'Glass',
        ],
        'Roofing' => [
            'Asphalt shingles',
            'Metal roofing',
            'Clay tiles',
            'Concrete tiles',
            'Slate tiles',
            'Wooden shakes or shingles',
            'Solar tiles',
            'Roof Tiles',
        ],
        'Decking and Walkways' => [
            'Composite decking',
            'Natural stone pavers',
            'Concrete pavers',
            'Brick pavers',
            'Treated lumber',
            'Teak',
            'Redwood decking',
            'Pea Gravel',
            'Anthracite Grey Deck',
            'Crushed Granite',
        ],
        'Outdoor Fixtures and Accents' => [
            'Wrought iron',
            'Stainless steel',
            'Copper',
            'Natural stone',
            'Ceramic tiles',
        ],
    ],

    'GARDEN_METERIALS' => [
        'Ground Cover Materials' => [
            'Mulch',
            'Wood Chips',
            'Grass',
            'Clover',
            'Moss',
            'Lawn',
            'Pebbles',
            'River rocks',
            'Ground cover plants',
            'thyme',
            'Sedum',
            'Artificial grass',
            'Decomposed granite',
        ],
        'Planters and Edging' => [
            'Corten steel',
            'Stone',
            'Fruit Trees',
            'Berry Bushes',
            'Plants',
            'Flowers',
            'Concrete',
            'Natural Stone',
            'Recycled plastic',
            'Bamboo',
        ],
        'Outdoor Furniture and Decor' => [
            'Teak',
            'Wrought iron',
            'Rattan',
            'Fire Pits',
            'Concrete',
            'Ceramic',
            'Brick',
        ],
        'Water Features and Structures' => [
            'Natural stone',
            'Fiberglass',
            'Copper',
            'Wood',
            'Glass',
        ],
        'Lighting' => [
            'LED lights',
            'Solar-powered lights',
            'Low-voltage halogen',
            'Fiber optics',
        ],
    ],

    'MODE_TYPE' => [
        'beautiful redesign',
        'creative redesign',
        'sketch to render',
        'new redesign',
    ],

    'object_list' => array(
        0 => "wall",
        1 => "building",
        2 => "sky",
        3 => "floor",
        4 => "tree",
        5 => "ceiling",
        6 => "road, route",
        7 => "bed",
        8 => "window ",
        9 => "grass",
        10 => "cabinet",
        11 => "sidewalk, pavement",
        12 => "person",
        13 => "earth, ground",
        14 => "door",
        15 => "table",
        16 => "mountain, mount",
        17 => "plant",
        18 => "curtain",
        19 => "chair",
        20 => "car",
        21 => "water",
        22 => "painting, picture",
        23 => "sofa",
        24 => "shelf",
        25 => "house",
        26 => "sea",
        27 => "mirror",
        28 => "rug",
        29 => "field",
        30 => "armchair",
        31 => "seat",
        32 => "fence",
        33 => "desk",
        34 => "rock, stone",
        35 => "wardrobe, closet, press",
        36 => "lamp",
        37 => "tub",
        38 => "rail",
        39 => "cushion",
        40 => "base, pedestal, stand",
        41 => "box",
        42 => "column, pillar",
        43 => "signboard, sign",
        44 => "chest of drawers, chest, bureau, dresser",
        45 => "counter",
        46 => "sand",
        47 => "sink",
        48 => "skyscraper",
        49 => "fireplace",
        50 => "refrigerator, icebox",
        51 => "grandstand, covered stand",
        52 => "path",
        53 => "stairs",
        54 => "runway",
        55 => "case, display case, showcase, vitrine",
        56 => "pool table, billiard table, snooker table",
        57 => "pillow",
        58 => "screen door, screen",
        59 => "stairway, staircase",
        60 => "river",
        61 => "bridge, span",
        62 => "bookcase",
        63 => "blind, screen",
        64 => "coffee table",
        65 => "toilet, can, commode, crapper, pot, potty, stool, throne",
        66 => "flower",
        67 => "book",
        68 => "hill",
        69 => "bench",
        70 => "countertop",
        71 => "stove",
        72 => "palm, palm tree",
        73 => "kitchen island",
        74 => "computer",
        75 => "swivel chair",
        76 => "boat",
        77 => "bar",
        78 => "arcade machine",
        79 => "hovel, hut, hutch, shack, shanty",
        80 => "bus",
        81 => "towel",
        82 => "light",
        83 => "truck",
        84 => "tower",
        85 => "chandelier",
        86 => "awning, sunshade, sunblind",
        87 => "street lamp",
        88 => "booth",
        89 => "tv",
        90 => "plane",
        91 => "dirt track",
        92 => "clothes",
        93 => "pole",
        94 => "land, ground, soil",
        95 => "bannister, banister, balustrade, balusters, handrail",
        96 => "escalator, moving staircase, moving stairway",
        97 => "ottoman, pouf, pouffe, puff, hassock",
        98 => "bottle",
        99 => "buffet, counter, sideboard",
        100 => "poster, posting, placard, notice, bill, card",
        101 => "stage",
        102 => "van",
        103 => "ship",
        104 => "fountain",
        105 => "conveyer belt, conveyor belt, conveyer, conveyor, transporter",
        106 => "canopy",
        107 => "washer, automatic washer, washing machine",
        108 => "plaything, toy",
        109 => "pool",
        110 => "stool",
        111 => "barrel, cask",
        112 => "basket, handbasket",
        113 => "falls",
        114 => "tent",
        115 => "bag",
        116 => "minibike, motorbike",
        117 => "cradle",
        118 => "oven",
        119 => "ball",
        120 => "food, solid food",
        121 => "step, stair",
        122 => "tank, storage tank",
        123 => "trade name",
        124 => "microwave",
        125 => "pot",
        126 => "animal",
        127 => "bicycle",
        128 => "lake",
        129 => "dishwasher",
        130 => "screen",
        131 => "blanket, cover",
        132 => "sculpture",
        133 => "hood, exhaust hood",
        134 => "sconce",
        135 => "vase",
        136 => "traffic light",
        137 => "tray",
        138 => "trash can",
        139 => "fan",
        140 => "pier",
        141 => "crt screen",
        142 => "plate",
        143 => "monitor",
        144 => "bulletin board",
        145 => "shower",
        146 => "radiator",
        147 => "glass, drinking glass",
        148 => "clock",
        149 => "flag"
    ),

    'CountryCurrencyCodes' => [
        'AD' => 'EUR', // Andorra Euro
        'AE' => 'AED', // United Arab Emirates Dirham
        'AF' => 'AFN', // Afghanistan Afghani
        'AG' => 'XCD', // Antigua and Barbuda East Caribbean Dollar
        'AI' => 'XCD', // Anguilla East Caribbean Dollar
        'AL' => 'ALL', // Albania Lek
        'AM' => 'AMD', // Armenia Dram
        'AO' => 'AOA', // Angola Kwanza
        'AQ' => '',     // Antarctica (No specific currency)
        'AR' => 'ARS', // Argentina Argentine Peso
        'AS' => 'USD', // American Samoa US Dollar
        'AT' => 'EUR', // Austria Euro
        'AU' => 'AUD', // Australia Australian Dollar
        'AW' => 'AWG', // Aruba Aruban Florin
        'AX' => 'EUR', // Åland Islands Euro
        'AZ' => 'AZN', // Azerbaijan Azerbaijan Manat
        'BA' => 'BAM', // Bosnia and Herzegovina Convertible Mark
        'BB' => 'BBD', // Barbados Barbados Dollar
        'BD' => 'BDT', // Bangladesh Taka
        'BE' => 'EUR', // Belgium Euro
        'BF' => 'XOF', // Burkina Faso CFA Franc BCEAO
        'BG' => 'BGN', // Bulgaria Bulgarian Lev
        'BH' => 'BHD', // Bahrain Bahraini Dinar
        'BI' => 'BIF', // Burundi Burundi Franc
        'BJ' => 'XOF', // Benin CFA Franc BCEAO
        'BL' => 'EUR', // Saint Barthélemy Euro
        'BM' => 'BMD', // Bermuda Bermudian Dollar
        'BN' => 'BND', // Brunei Darussalam Brunei Dollar
        'BO' => 'BOB', // Bolivia Boliviano
        'BQ' => 'USD', // Bonaire, Sint Eustatius and Saba US Dollar
        'BR' => 'BRL', // Brazil Brazilian Real
        'BS' => 'BSD', // Bahamas Bahamian Dollar
        'BT' => 'BTN', // Bhutan Ngultrum
        'BV' => 'NOK', // Bouvet Island Norwegian Krone
        'BW' => 'BWP', // Botswana Pula
        'BY' => 'BYN', // Belarus Belarusian Ruble
        'BZ' => 'BZD', // Belize Belize Dollar
        'CA' => 'CAD', // Canada Canadian Dollar
        'CC' => 'AUD', // Cocos (Keeling) Islands Australian Dollar
        'CD' => 'CDF', // Congo Congolese Franc
        'CF' => 'XAF', // Central African Republic CFA Franc BEAC
        'CG' => 'XAF', // Congo CFA Franc BEAC
        'CH' => 'CHF', // Switzerland Swiss Franc
        'CI' => 'XOF', // Côte d'Ivoire CFA Franc BCEAO
        'CK' => 'NZD', // Cook Islands New Zealand Dollar
        'CL' => 'CLP', // Chile Chilean Peso
        'CM' => 'XAF', // Cameroon CFA Franc BEAC
        'CN' => 'CNY', // China Yuan Renminbi
        'CO' => 'COP', // Colombia Colombian Peso
        'CR' => 'CRC', // Costa Rica Costa Rican Colon
        'CU' => 'CUP', // Cuba Cuban Peso
        'CV' => 'CVE', // Cape Verde Cape Verde Escudo
        'CW' => 'ANG', // Curaçao Netherlands Antillean Guilder
        'CX' => 'AUD', // Christmas Island Australian Dollar
        'CY' => 'EUR', // Cyprus Euro
        'CZ' => 'CZK', // Czech Republic Czech Koruna
        'DE' => 'EUR', // Germany Euro
        'DJ' => 'DJF', // Djibouti Djibouti Franc
        'DK' => 'DKK', // Denmark Danish Krone
        'DM' => 'XCD', // Dominica East Caribbean Dollar
        'DO' => 'DOP', // Dominican Republic Dominican Peso
        'DZ' => 'DZD', // Algeria Algerian Dinar
        'EC' => 'USD', // Ecuador US Dollar
        'EE' => 'EUR', // Estonia Euro
        'EG' => 'EGP', // Egypt Egyptian Pound
        'EH' => 'MAD', // Western Sahara Moroccan Dirham
        'ER' => 'ERN', // Eritrea Nakfa
        'ES' => 'EUR', // Spain Euro
        'ET' => 'ETB', // Ethiopia Ethiopian Birr
        'FI' => 'EUR', // Finland Euro
        'FJ' => 'FJD', // Fiji Fiji Dollar
        'FK' => 'FKP', // Falkland Islands (Malvinas) Falkland Islands Pound
        'FM' => 'USD', // Micronesia US Dollar
        'FO' => 'DKK', // Faroe Islands Danish Krone
        'FR' => 'EUR', // France Euro
        'GA' => 'XAF', // Gabon CFA Franc BEAC
        'GB' => 'GBP', // United Kingdom Pound Sterling
        'GD' => 'XCD', // Grenada East Caribbean Dollar
        'GE' => 'GEL', // Georgia Lari
        'GF' => 'EUR', // French Guiana Euro
        'GG' => 'GBP', // Guernsey Pound Sterling
        'GH' => 'GHS', // Ghana Ghana Cedi
        'GI' => 'GIP', // Gibraltar Gibraltar Pound
        'GL' => 'DKK', // Greenland Danish Krone
        'GM' => 'GMD', // Gambia Dalasi
        'GN' => 'GNF', // Guinea Guinea Franc
        'GP' => 'EUR', // Guadeloupe Euro
        'GQ' => 'XAF', // Equatorial Guinea CFA Franc BEAC
        'GR' => 'EUR', // Greece Euro
        'GS' => 'GBP', // South Georgia and the South Sandwich Islands Pound Sterling
        'GT' => 'GTQ', // Guatemala Quetzal
        'GU' => 'USD', // Guam US Dollar
        'GW' => 'XOF', // Guinea-Bissau CFA Franc BCEAO
        'GY' => 'GYD', // Guyana Guyana Dollar
        'HK' => 'HKD', // Hong Kong Dollar
        'HM' => 'AUD', // Heard Island and McDonald Islands Australian Dollar
        'HN' => 'HNL', // Honduras Lempira
        'HR' => 'HRK', // Croatia Kuna
        'HT' => 'HTG', // Haiti Gourde
        'HU' => 'HUF', // Hungary Forint
        'ID' => 'IDR', // Indonesia Rupiah
        'IE' => 'EUR', // Ireland Euro
        'IL' => 'ILS', // Israel Israeli Shekel
        'IM' => 'GBP', // Isle of Man Pound Sterling
        'IN' => 'INR', // India Indian Rupee
        'IO' => 'USD', // British Indian Ocean Territory US Dollar
        'IQ' => 'IQD', // Iraq Iraqi Dinar
        'IR' => 'IRR', // Iran Rial
        'IS' => 'ISK', // Iceland Icelandic Krona
        'IT' => 'EUR', // Italy Euro
        'JE' => 'GBP', // Jersey Pound Sterling
        'JM' => 'JMD', // Jamaica Jamaican Dollar
        'JO' => 'JOD', // Jordan Jordanian Dinar
        'JP' => 'JPY', // Japan Yen
        'KE' => 'KES', // Kenya Kenyan Shilling
        'KG' => 'KGS', // Kyrgyzstan Som
        'KH' => 'KHR', // Cambodia Riel
        'KI' => 'AUD', // Kiribati Australian Dollar
        'KM' => 'KMF', // Comoros Comoro Franc
        'KN' => 'XCD', // Saint Kitts and Nevis East Caribbean Dollar
        'KP' => 'KPW', // Korea (North) North Korean Won
        'KR' => 'KRW', // Korea (South) South Korean Won
        'KW' => 'KWD', // Kuwait Kuwaiti Dinar
        'KY' => 'KYD', // Cayman Islands Cayman Islands Dollar
        'KZ' => 'KZT', // Kazakhstan Tenge
        'LA' => 'LAK', // Laos Kip
        'LB' => 'LBP', // Lebanon Lebanese Pound
        'LC' => 'XCD', // Saint Lucia East Caribbean Dollar
        'LI' => 'CHF', // Liechtenstein Swiss Franc
        'LK' => 'LKR', // Sri Lanka Sri Lanka Rupee
        'LR' => 'LRD', // Liberia Liberian Dollar
        'LS' => 'LSL', // Lesotho Loti
        'LT' => 'EUR', // Lithuania Euro
        'LU' => 'EUR', // Luxembourg Euro
        'LV' => 'EUR', // Latvia Euro
        'LY' => 'LYD', // Libya Libyan Dinar
        'MA' => 'MAD', // Morocco Moroccan Dirham
        'MC' => 'EUR', // Monaco Euro
        'MD' => 'MDL', // Moldova Leu
        'ME' => 'EUR', // Montenegro Euro
        'MF' => 'EUR', // Saint Martin (French part) Euro
        'MG' => 'MGA', // Madagascar Malagasy Ariary
        'MH' => 'USD', // Marshall Islands US Dollar
        'MK' => 'MKD', // Macedonia Denar
        'ML' => 'XOF', // Mali CFA Franc BCEAO
        'MM' => 'MMK', // Myanmar (Burma) Kyat
        'MN' => 'MNT', // Mongolia Tugrik
        'MO' => 'MOP', // Macau Pataca
        'MP' => 'USD', // Northern Mariana Islands US Dollar
        'MQ' => 'EUR', // Martinique Euro
        'MR' => 'MRU', // Mauritania Ouguiya
        'MS' => 'XCD', // Montserrat East Caribbean Dollar
        'MT' => 'EUR', // Malta Euro
        'MU' => 'MUR', // Mauritius Mauritius Rupee
        'MV' => 'MVR', // Maldives Rufiyaa
        'MW' => 'MWK', // Malawi Malawi Kwacha
        'MX' => 'MXN', // Mexico Mexican Peso
        'MY' => 'MYR', // Malaysia Malaysian Ringgit
        'MZ' => 'MZN', // Mozambique Mozambique Metical
        'NA' => 'NAD', // Namibia Namibia Dollar
        'NC' => 'XPF', // New Caledonia CFP Franc
        'NE' => 'XOF', // Niger CFA Franc BCEAO
        'NF' => 'AUD', // Norfolk Island Australian Dollar
        'NG' => 'NGN', // Nigeria Naira
        'NI' => 'NIO', // Nicaragua Cordoba Oro
        'NL' => 'EUR', // Netherlands Euro
        'NO' => 'NOK', // Norway Norwegian Krone
        'NP' => 'NPR', // Nepal Nepalese Rupee
        'NR' => 'AUD', // Nauru Australian Dollar
        'NU' => 'NZD', // Niue New Zealand Dollar
        'NZ' => 'NZD', // New Zealand New Zealand Dollar
        'OM' => 'OMR', // Oman Rial Omani
        'PA' => 'PAB', // Panama Balboa
        'PE' => 'PEN', // Peru Sol
        'PF' => 'XPF', // French Polynesia CFP Franc
        'PG' => 'PGK', // Papua New Guinea Kina
        'PH' => 'PHP', // Philippines Philippine Peso
        'PK' => 'PKR', // Pakistan Pakistan Rupee
        'PL' => 'PLN', // Poland Zloty
        'PM' => 'EUR', // Saint Pierre and Miquelon Euro
        'PN' => 'NZD', // Pitcairn Islands New Zealand Dollar
        'PR' => 'USD', // Puerto Rico US Dollar
        'PS' => 'ILS', // Palestinian Territories Israeli Shekel
        'PT' => 'EUR', // Portugal Euro
        'PW' => 'USD', // Palau US Dollar
        'PY' => 'PYG', // Paraguay Guarani
        'QA' => 'QAR', // Qatar Qatari Rial
        'RE' => 'EUR', // Réunion Euro
        'RO' => 'RON', // Romania Romanian Leu
        'RS' => 'RSD', // Serbia Serbian Dinar
        'RU' => 'RUB', // Russia Russian Ruble
        'RW' => 'RWF', // Rwanda Rwanda Franc
        'SA' => 'SAR', // Saudi Arabia Saudi Riyal
        'SB' => 'SBD', // Solomon Islands Solomon Islands Dollar
        'SC' => 'SCR', // Seychelles Seychelles Rupee
        'SD' => 'SDG', // Sudan Sudanese Pound
        'SE' => 'SEK', // Sweden Swedish Krona
        'SG' => 'SGD', // Singapore Singapore Dollar
        'SH' => 'SHP', // Saint Helena Pound Sterling
        'SI' => 'EUR', // Slovenia Euro
        'SJ' => 'NOK', // Svalbard and Jan Mayen Norwegian Krone
        'SK' => 'EUR', // Slovakia Euro
        'SL' => 'SLL', // Sierra Leone Leone
        'SM' => 'EUR', // San Marino Euro
        'SN' => 'XOF', // Senegal CFA Franc BCEAO
        'SO' => 'SOS', // Somalia Somali Shilling
        'SR' => 'SRD', // Suriname Surinam Dollar
        'SS' => 'SSP', // South Sudan South Sudanese Pound
        'ST' => 'STN', // Sao Tome and Principe Dobra
        'SV' => 'USD', // El Salvador US Dollar
        'SX' => 'ANG', // Sint Maarten (Dutch part) Netherlands Antillean Guilder
        'SY' => 'SYP', // Syria Syrian Pound
        'SZ' => 'SZL', // Eswatini Lilangeni
        'TC' => 'USD', // Turks and Caicos Islands US Dollar
        'TD' => 'XAF', // Chad CFA Franc BEAC
        'TF' => 'EUR', // French Southern Territories Euro
        'TG' => 'XOF', // Togo CFA Franc BCEAO
        'TH' => 'THB', // Thailand Baht
        'TJ' => 'TJS', // Tajikistan Somoni
        'TK' => 'NZD', // Tokelau New Zealand Dollar
        'TL' => 'USD', // Timor-Leste US Dollar
        'TM' => 'TMT', // Turkmenistan Turkmenistan Manat
        'TN' => 'TND', // Tunisia Tunisian Dinar
        'TO' => 'TOP', // Tonga Pa'anga
        'TR' => 'TRY', // Turkey Turkish Lira
        'TT' => 'TTD', // Trinidad and Tobago Trinidad and Tobago Dollar
        'TV' => 'AUD', // Tuvalu Australian Dollar
        'TW' => 'TWD', // Taiwan New Taiwan Dollar
        'TZ' => 'TZS', // Tanzania Tanzanian Shilling
        'UA' => 'UAH', // Ukraine Hryvnia
        'UG' => 'UGX', // Uganda Uganda Shilling
        'UM' => 'USD', // United States Minor Outlying Islands US Dollar
        'US' => 'USD', // United States US Dollar
        'UY' => 'UYU', // Uruguay Peso Uruguayo
        'UZ' => 'UZS', // Uzbekistan Uzbekistan Sum
        'VA' => 'EUR', // Vatican City Euro
        'VC' => 'XCD', // Saint Vincent and the Grenadines East Caribbean Dollar
        'VE' => 'VES', // Venezuela Bolívar Soberano
        'VG' => 'USD', // British Virgin Islands US Dollar
        'VI' => 'USD', // U.S. Virgin Islands US Dollar
        'VN' => 'VND', // Vietnam Dong
        'VU' => 'VUV', // Vanuatu Vatu
        'WF' => 'XPF', // Wallis and Futuna CFP Franc
        'WS' => 'WST', // Samoa Tala
        'YE' => 'YER', // Yemen Yemeni Rial
        'YT' => 'EUR', // Mayotte Euro
        'ZA' => 'ZAR', // South Africa Rand
        'ZM' => 'ZMW', // Zambia Zambian Kwacha
        'ZW' => 'ZWL', // Zimbabwe Zimbabwe Dollar
    ],

    'CurrencySymbols' => [
        'AED' => 'د.إ', // United Arab Emirates Dirham
        'AFN' => '؋', // Afghan Afghani
        'ALL' => 'L', // Albanian Lek
        'AMD' => '֏', // Armenian Dram
        'ANG' => 'ƒ', // Netherlands Antillean Guilder
        'AOA' => 'Kz', // Angolan Kwanza
        'ARS' => '$', // Argentine Peso
        'AUD' => '$', // Australian Dollar
        'AWG' => 'ƒ', // Aruban Florin
        'AZN' => '₼', // Azerbaijani Manat
        'BAM' => 'КМ', // Bosnia-Herzegovina Convertible Mark
        'BBD' => '$', // Barbadian Dollar
        'BDT' => '৳', // Bangladeshi Taka
        'BGN' => 'лв', // Bulgarian Lev
        'BHD' => '.د.ب', // Bahraini Dinar
        'BIF' => 'FBu', // Burundian Franc
        'BMD' => '$', // Bermudian Dollar
        'BND' => '$', // Brunei Dollar
        'BOB' => 'Bs.', // Bolivian Boliviano
        'BRL' => 'R$', // Brazilian Real
        'BSD' => '$', // Bahamian Dollar
        'BTN' => 'Nu.', // Bhutanese Ngultrum
        'BWP' => 'P', // Botswana Pula
        'BYN' => 'Br', // Belarusian Ruble
        'BZD' => '$', // Belize Dollar
        'CAD' => '$', // Canadian Dollar
        'CDF' => 'FC', // Congolese Franc
        'CHF' => 'CHF', // Swiss Franc
        'CLP' => '$', // Chilean Peso
        'CNY' => '¥', // Chinese Yuan
        'COP' => '$', // Colombian Peso
        'CRC' => '₡', // Costa Rican Colón
        'CUP' => '₱', // Cuban Peso
        'CVE' => '$', // Cape Verdean Escudo
        'CZK' => 'Kč', // Czech Koruna
        'DJF' => 'Fdj', // Djiboutian Franc
        'DKK' => 'kr', // Danish Krone
        'DOP' => 'RD$', // Dominican Peso
        'DZD' => 'د.ج', // Algerian Dinar
        'EGP' => 'E£', // Egyptian Pound
        'ERN' => 'Nfk', // Eritrean Nakfa
        'ETB' => 'Br', // Ethiopian Birr
        'EUR' => '€', // Euro
        'FJD' => '$', // Fijian Dollar
        'FKP' => '£', // Falkland Islands Pound
        'FOK' => 'kr', // Faroese Króna
        'GBP' => '£', // British Pound Sterling
        'GEL' => '₾', // Georgian Lari
        'GGP' => '£', // Guernsey Pound
        'GHS' => '₵', // Ghanaian Cedi
        'GIP' => '£', // Gibraltar Pound
        'GMD' => 'D', // Gambian Dalasi
        'GNF' => 'FG', // Guinean Franc
        'GTQ' => 'Q', // Guatemalan Quetzal
        'GYD' => '$', // Guyanaese Dollar
        'HKD' => '$', // Hong Kong Dollar
        'HNL' => 'L', // Honduran Lempira
        'HRK' => 'kn', // Croatian Kuna
        'HTG' => 'G', // Haitian Gourde
        'HUF' => 'Ft', // Hungarian Forint
        'IDR' => 'Rp', // Indonesian Rupiah
        'ILS' => '₪', // Israeli New Shekel
        'IMP' => '£', // Isle of Man Pound
        'INR' => '₹', // Indian Rupee
        'IQD' => 'ع.د', // Iraqi Dinar
        'IRR' => '﷼', // Iranian Rial
        'ISK' => 'kr', // Icelandic Króna
        'JEP' => '£', // Jersey Pound
        'JMD' => '$', // Jamaican Dollar
        'JOD' => 'JD', // Jordanian Dinar
        'JPY' => '¥', // Japanese Yen
        'KES' => 'KSh', // Kenyan Shilling
        'KGS' => 'лв', // Kyrgystani Som
        'KHR' => '៛', // Cambodian Riel
        'KID' => '$', // Kiribati Dollar
        'KMF' => 'CF', // Comorian Franc
        'KRW' => '₩', // South Korean Won
        'KWD' => 'KD', // Kuwaiti Dinar
        'KYD' => '$', // Cayman Islands Dollar
        'KZT' => '₸', // Kazakhstani Tenge
        'LAK' => '₭', // Laotian Kip
        'LBP' => 'ل.ل', // Lebanese Pound
        'LKR' => '₨', // Sri Lankan Rupee
        'LRD' => '$', // Liberian Dollar
        'LSL' => 'L', // Lesotho Loti
        'LYD' => 'ل.د', // Libyan Dinar
        'MAD' => 'د.م.', // Moroccan Dirham
        'MDL' => 'L', // Moldovan Leu
        'MGA' => 'Ar', // Malagasy Ariary
        'MKD' => 'ден', // Macedonian Denar
        'MMK' => 'Ks', // Myanma Kyat
        'MNT' => '₮', // Mongolian Tugrik
        'MOP' => 'MOP$', // Macanese Pataca
        'MRU' => 'UM', // Mauritanian Ouguiya
        'MUR' => '₨', // Mauritian Rupee
        'MVR' => 'Rf', // Maldivian Rufiyaa
        'MWK' => 'MK', // Malawian Kwacha
        'MXN' => '$', // Mexican Peso
        'MYR' => 'RM', // Malaysian Ringgit
        'MZN' => 'MT', // Mozambican Metical
        'NAD' => '$', // Namibian Dollar
        'NGN' => '₦', // Nigerian Naira
        'NIO' => 'C$', // Nicaraguan Córdoba
        'NOK' => 'kr', // Norwegian Krone
        'NPR' => '₨', // Nepalese Rupee
        'NZD' => '$', // New Zealand Dollar
        'OMR' => 'ر.ع.', // Omani Rial
        'PAB' => 'B/.', // Panamanian Balboa
        'PEN' => 'S/', // Peruvian Nuevo Sol
        'PGK' => 'K', // Papua New Guinean Kina
        'PHP' => '₱', // Philippine Peso
        'PKR' => '₨', // Pakistani Rupee
        'PLN' => 'zł', // Polish Zloty
        'PYG' => '₲', // Paraguayan Guarani
        'QAR' => 'ر.ق', // Qatari Riyal
        'RON' => 'lei', // Romanian Leu
        'RSD' => 'дин.', // Serbian Dinar
        'RUB' => '₽', // Russian Ruble
        'RWF' => 'FRw', // Rwandan Franc
        'SAR' => 'ر.س', // Saudi Riyal
        'SBD' => '$', // Solomon Islands Dollar
        'SCR' => '₨', // Seychellois Rupee
        'SDG' => 'SDG', // Sudanese Pound
        'SEK' => 'kr', // Swedish Krona
        'SGD' => '$', // Singapore Dollar
        'SHP' => '£', // Saint Helena Pound
        'SLL' => 'Le', // Sierra Leonean Leone
        'SOS' => 'Sh', // Somali Shilling
        'SRD' => '$', // Surinamese Dollar
        'SSP' => '£', // South Sudanese Pound
        'STN' => 'Db', // São Tomé and Príncipe Dobra
        'SYP' => 'ل.س', // Syrian Pound
        'SZL' => 'E', // Swazi Lilangeni
        'THB' => '฿', // Thai Baht
        'TJS' => 'ЅМ', // Tajikistani Somoni
        'TMT' => 'T', // Turkmenistani Manat
        'TND' => 'د.ت', // Tunisian Dinar
        'TOP' => 'T$', // Tongan Pa'anga
        'TRY' => '₺', // Turkish Lira
        'TTD' => 'TT$', // Trinidad and Tobago Dollar
        'TVD' => '$', // Tuvaluan Dollar
        'TWD' => 'NT$', // New Taiwan Dollar
        'TZS' => 'TSh', // Tanzanian Shilling
        'UAH' => '₴', // Ukrainian Hryvnia
        'UGX' => 'USh', // Ugandan Shilling
        'USD' => '$', // United States Dollar
        'UYU' => '$U', // Uruguayan Peso
        'UZS' => 'лв', // Uzbekistan Som
        'VES' => 'Bs', // Venezuelan Bolívar Soberano
        'VND' => '₫', // Vietnamese Dong
        'VUV' => 'VT', // Vanuatu Vatu
        'WST' => 'WS$', // Samoan Tala
        'XAF' => 'FCFA', // CFA Franc BEAC
        'XCD' => 'EC$', // East Caribbean Dollar
        'XDR' => 'SDR', // Special Drawing Rights
        'XOF' => 'CFA', // CFA Franc BCEAO
        'XPF' => '₣', // CFP Franc
        'YER' => '﷼', // Yemeni Rial
        'ZAR' => 'R', // South African Rand
        'ZMW' => 'ZK', // Zambian Kwacha
        'ZWL' => 'Z$', // Zimbabwean Dollar
    ],


    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),
    'accessible_features' => [
        'redesign',
        'precision',
        'fill_spaces',
        'decor_staging',
        'colors_and_textures',
        'furniture_removal',
        'sky_colors',
        'sketch_to_render',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
