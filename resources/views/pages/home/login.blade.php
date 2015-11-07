@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Login</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="box box-primary box-solid">
                <div class="box-header" style="cursor: move;">
                    <center>
                        <i class="fa fa-sign-in"></i>&nbsp;
                        <h3 class="box-title">Masuk ke E-Surat</h3>
                    </center>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" action="" method="post" class="col-md-12">
                                <div class="form-group has-feedback">
                                    <input type="text" placeholder="Username" class="form-control" name="username" required>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" placeholder="Password" class="form-control" name="password" requie>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-primary pull-right">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
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