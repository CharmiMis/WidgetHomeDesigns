<option value="very_low">{{ trans('garden_ai.very_low') }}</option>
<option value="low">{{ trans('garden_ai.low') }}</option>
<option selected="" value="mid">{{ trans('garden_ai.mid') }}</option>
@if ($userActivePlan == 'free' || $precisionUser == true)
<option class="paid_feature_modal">{{ trans('garden_ai.extreme') }} &nbsp;&#xf023; </option>
@else
<option value="extreme">{{ trans('garden_ai.extreme') }}</option>
@endif