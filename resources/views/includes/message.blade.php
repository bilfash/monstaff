@if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }} alert-dismissable">
        <i class="fa fa-{{ Session::get('message_type') }}"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('message') }}
    </div>
@endif