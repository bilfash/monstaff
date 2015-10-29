<header class="main-header">
    <a href="{{ url('/') }}" class="logo" style="background-color:#070719;">
        <span class="logo-mini">HMTC</span>
        <span class="logo-lg">Mon<b>Staff</b> HMTC ITS</span>       
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu open">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <span class="hidden-xs">{{ Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <br>
                    <br>
                    <p>
                      {{ Auth::user()->name}}
                      <small>{{Auth::user()->position->name}}<br>{{Auth::user()->department->name}}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{URL::to('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
    </nav>
</header>