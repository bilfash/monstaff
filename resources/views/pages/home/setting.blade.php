@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>General Setting</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post" role="form">
	        	<div class="form-group">
	              	<label for="" class="col-sm-6 control-label">Notifikasi Hari Libur</label>
	              	<div class="col-sm-3">
	                	<input type="text" class="form-control text-center" pattern="[0-3][0-9]-[0-1][0-9]" name="holiday" value="10-12" required>
	              	</div>
                	<p class="help-block"><br><br>&nbsp;&nbsp;*format pengisian harus adalah "dd-mm". contoh : 01-02 untuk 1 februari</p>
	            </div>
                <div class="form-group">
                    <label for="" class="col-sm-6 control-label">Default Reservenumber</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control text-center" name="reserve" value="100" required>
                    </div>
                    <p class="help-block"><br><br>&nbsp;&nbsp;*digunakan untuk generate auto reserve number</p>
                </div>
                {!! csrf_field() !!}<br><br><br>
                <button class="btn btn-success "><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan</button>
            </form>
        </div>
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop