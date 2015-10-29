<ul class="sidebar-menu">
    @if (Auth::check())
        <li>
            <a href="{{ URL::to('') }}">
                <i class="fa fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
    @endif

    @if($role == 1)
        
        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Departemen</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('department') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Manage
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('department/create') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Create
                    </a>
                </li>
            </ul>
        </li>

    @elseif ($role == 2)
        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>{{ Question }}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('question') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Manage
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('question/create') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Create
                    </a>
                </li>
            </ul>
        </li>

    @else 

        <li class="treeview" >
            <a href="{{ URL::to('feedback') }}">
                <i class="fa fa-folder"></i>
                <span>{{ Departemen }}</span>
            </a>
        </li>

    @endif
</ul>
