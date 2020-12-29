@if(session()->has("success"))
<div class="alert alert-success bg-success text-white alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> {{session()->get("success")}}
</div>
@elseif(session()->has("error"))
<div class="alert alert-danger bg-danger text-white alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Oops!</strong> {{session()->get("error")}}
</div>
@endif