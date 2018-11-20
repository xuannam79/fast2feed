
@if($presentStatus == 1)
    <img src="/fast2feed/public/templates/admin/images/icon/deactive.gif" alt="" onClick="return ajaxToggleActiveStatus({{ $id }}, 0)" />
@elseif($presentStatus == 0)
    <img src="/fast2feed/public/templates/admin/images/icon/active.gif" alt="" onClick="return ajaxToggleActiveStatus({{ $id }}, 1)" />
@endif