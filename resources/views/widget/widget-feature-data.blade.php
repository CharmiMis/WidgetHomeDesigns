{{-- resources/views/widget/widget-management.blade.php --}}
<div class="ai-tool-wrapper">
    <div class="ai-tool-wrapper  demo-class">
        <div class="ai-tool-right">
            <ul class="feature-buttons">
                @foreach (json_decode($widgetData->accessible_features) as $feature)
                    <li>
                        <button class="feature-button @if ($loop->first) active @endif"
                            data-feature="{{ $feature }}"
                            data-feature-url="{{ route('widget.showFeature', ['feature' => $feature]) }}">
                            {{ ucwords(str_replace('_', ' ', $feature)) }}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="feature-content">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadRenders(0);
        $('#custom_instruction0').show();

        function loadFeatureContent(url) {
            console.log("Loading feature content from URL:", url);
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    console.log("Content loaded:", data);
                    $('.feature-content').html(data);
                },
                error: function(xhr, status, error) {
                    console.log("Failed to load content:", status, error);
                    $('.feature-content').html(
                        '<p>Failed to load content. It is under process</p>');
                }
            });
        }

        $(document).on('click', '.feature-button', function() {
            console.log("Button clicked:", $(this).data('feature'));
            $('.feature-button').removeClass('active');
            $(this).addClass('active');

            var url = $(this).data('feature-url');
            loadFeatureContent(url);
        });

        // Ensure the active button click is triggered
        console.log("Triggering click on active button");
        $('.feature-button.active').trigger('click');
    });

    async function loadRenders(sec) {
        var modevalue = $('#modeValueForPage').val();
        this.multipleDownloadImg = [];
        $(`.delete_favourite_buttons`).addClass('hidden');
        $(`.ai-upload-latest-top`).css('display', 'none');
        get_designs.design_type = sec;

        if (user && isPrivate === false) {
            get_designs.type = 'private';
        } else {
            get_designs.type = 'public';
        }

        var response = await getRedesignGeneratedDesigns();
    }
</script>

<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/webWidget/css/style.css?v=3.28">
<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/webWidget/css/responsive.css">
