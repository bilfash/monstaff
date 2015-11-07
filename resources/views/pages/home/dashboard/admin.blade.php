@extends('layouts.general')
@section('content')
    @include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Dasbor</h1>
</section>
<section class="content">
@include('includes.message')
    <div class="row">
        
    </div>
</section>
@stop
@section('custom_foot')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#flash-overlay-modal').modal();
        });
    </script>
@stop