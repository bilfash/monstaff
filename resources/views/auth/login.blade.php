<!DOCTYPE html>
<html>
<head>
  @include('includes.head-general')
  @yield('custom_head')
</head>
<body class="hold-transition login-page">
    @include('partials.flash-overlay-modal')
    <div class="login-box">
    	<br>
      	<div class="login-logo" style="margin-bottom:-10px;">
        	<a href="#">Mon<b>staff</b> HMTC</a>
      	</div><!-- /.login-logo -->
      	<div class="text-center">
	        <p>Institut Teknologi Sepuluh Nopember</p>
	    </div>
    	<br>
      	<div class="login-box-body">
        	<p class="login-box-msg">Sign in to start your session</p>
        	<form action="" method="post">
          		<div class="form-group has-feedback">
            		<input type="text" class="form-control" placeholder="Username" name="username">
            		<span class="glyphicon glyphicon-user form-control-feedback"></span>
          		</div>
          		<div class="form-group has-feedback">
            		<input type="password" class="form-control" placeholder="Password" name="password">
            		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          		</div>
          		<br>
          		<div class="row">
            		<div class="col-xs-8">
            		</div><!-- /.col -->
	            	<div class="col-xs-4">
	              		<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
	              	</div>
              	</div>
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	</form>
    		<br>
        	<p class="text-right"> Developed by :<br>Professional Development Department<br>HMTC Optimasi</p>
		</div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
</body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#flash-overlay-modal').modal();
        });
    </script>
</html>

