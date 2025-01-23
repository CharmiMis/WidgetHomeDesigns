<option value="very_low">{{ trans('exterior_ai.very_low') }}</option>
<option value="low">{{ trans('exterior_ai.low') }}</option>
<option selected="" value="mid">{{ trans('exterior_ai.mid') }}</option>
@if ($userActivePlan == 'free' || $precisionUser == true)
<option class="paid_feature_modal">{{ trans('exterior_ai.extreme') }} &nbsp;&#xf023;</option>
@else
<option value="extreme">{{ trans('exterior_ai.extreme') }}</option>
@endif