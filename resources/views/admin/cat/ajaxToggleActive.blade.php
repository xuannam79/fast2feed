
@if($presentStatus == 1)
<input type="checkbox" class="switch-input" onchange="return ajaxToggleActiveStatus({{ $id }}, 0)">
<span class="switch-label"></span>
<span class="switch-handle"></span>
@elseif($presentStatus == 0)
<input type="checkbox" class="switch-input" checked="true" onchange="return ajaxToggleActiveStatus({{ $id }}, 1)">
<span class="switch-label"></span>
<span class="switch-handle"></span>
@endif