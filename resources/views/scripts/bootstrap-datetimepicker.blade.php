@section('custom_head')
<script type="text/javascript" src="{{ URL::to('assets/js/moment.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/js/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(function() {
            $('.datetimepicker').datetimepicker({
                pickTime: false,
                language: 'id'
            });
        });
    });
</script>
@append