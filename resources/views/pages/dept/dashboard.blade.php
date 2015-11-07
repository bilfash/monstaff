@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1></h1>
</section>
<section class="content">
    <div class="row">
    	@if(isset($items))
	    	<div class="col-xs-12">
	    		<div class="alert alert-info alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		            <h4><i class="icon fa fa-info"></i>Saatnya Pengisian PA Staff!!</h4>
		            Silahkan mengisi PA Staff {{$items->name}} <a href="{{URL::to('submit').'/'.$items->id}}">Klik disini</a>
	          	</div>
	    	</div>
    	@endif
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop
