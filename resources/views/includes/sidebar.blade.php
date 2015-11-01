<ul class="sidebar-menu">
    @if (Auth::check())
        <li>
            <a href="{{ URL::to('') }}">
                <i class="fa fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
    @endif

    <?php
        if(Auth::id() == 1){
            $role = 1;
        } else if(Auth::user()->department->name == 'Non Departemen'){
            $role = 2;
        } else {
            $role = 3;
        }
    ?>

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

        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Jabatan</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('position') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Manage
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('position/create') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Create
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('user') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Manage
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('user/create') }}">
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
                <span>Feedback</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('feedback') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Manage
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Event</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('event') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Manage
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('event/create') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Create
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Question</span>
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
        <li class="treeview" >
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Nilai</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('score') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Lihat Penilaian
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('mark/create') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Beri Nilai
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ URL::to('mark/answers') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Lihat Jawaban
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
