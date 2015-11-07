@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Jabatan</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Jabatan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Nama User</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" value="{{$item->name}}" class="form-control" placeholder="Nama" required>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" name="username" class="form-control" value="{{$item->username}}" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" name="password" class="form-control" placeholder="Password hanya bisa dirubah oleh user" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Departemen</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="deptid">
                                    <option>---</option>
                                    @foreach( $departments as $department)
                                        <option value="{{$department->id}}" @if ($item->deptid == $department->id) {{ 'selected' }} @endif>{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Jabatan</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="positionid">
                                    <option>---</option>
                                    @foreach( $positions as $position)
                                        <option value="{{$position->id}}" @if ($item->positionid == $position->id) {{ 'selected' }} @endif>{{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.box -->
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop