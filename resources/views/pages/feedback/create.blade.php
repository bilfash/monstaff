@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1></h1>
</section>
<section class="content">
    <div class="row">
    	<div class="col-xs-12">
	    	<div class="box">
	    		 <form action="" method="post" class="form-horizontal">
	            <div class="box-header">
	                <h3 class="box-title"> Feedback </h3>
	                <!-- tools box -->
	            </div><!-- /.box-header -->
	            <div class="box-body pad">
	            	<p>
	            		Berikan kritik, saran maupun unek-unek tentang HMTC. Kerahasiaan feedback ini hanya bisa dibaca oleh Wakahima Internal saja.
	            	</p>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            	<input type="hidden" name="userid" value="{{Auth::id()}}">
	                <textarea name="content" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	            </div>
	            <div class="box-footer">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </div><!-- /.box-footer -->
            	</form>
	        </div>
    	</div>
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    	$(function () {
	        //bootstrap WYSIHTML5 - text editor
	        $(".textarea").wysihtml5();
	      });
    </script>
@stop
