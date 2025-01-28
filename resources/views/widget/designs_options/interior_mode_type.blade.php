<option>{{ trans('garden_mode.beautiful_redesign') }}</option>
@if (
    $userActivePlan == 'homedesignsai-individual' ||
        $userActivePlan == 'homedesignsai-pro' ||
        $userActivePlan == 'pro-yearly' ||
        $userActivePlan == 'homedesignsai-individual-2' ||
        $userActivePlan == 'homedesignsai-pro-2' ||
        $precisionUser == false)
    <option>{{ trans('garden_mode.creative_redesign') }}</option>
@else
    <option class="paid_feature_modal">{{ trans('garden_mode.creative_redesign') }}&nbsp;&#xf023;</option>
@endif

@if ($userActivePlan == 'homedesignsai-pro' || 
        $userActivePlan == 'pro-yearly' ||
        $userActivePlan == 'homedesignsai-pro-2' ||
        $precisionUser == false)
    <option value="Sketch to Render">{{ trans('garden_mode.sketch_to_render') }}</option>
@else
    <option class="paid_feature_modal">{{ trans('garden_mode.sketch_to_render') }}&nbsp;&#xf023;</option>
@endif

<option>{{ trans('garden_mode.fill_the_room') }}</option>
