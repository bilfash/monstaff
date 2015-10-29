@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Departemen</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Buat Event</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Nama Event</label>
                            <div class="col-sm-7">
                                <input type="text" name="name" class="form-control" placeholder="Nama Event" required>
                                <input type="hidden" name="enabled" value="1">
                                <input type="hidden" name="start" value="1">
                                <input type="hidden" name="end" value="1">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Rentang Waktu</label>
                          <div class=' col-sm-7'>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="reservationtime" name='rentang'>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.box -->
        <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">List Event</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Nama Event</th>
                                <th class="text-center">Start</th>
                                <th class="text-center">End</th>
                                <th class="text-center">Dibuat Oleh</th>
                                <?php $i = 1;?>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->start}}</td>
                                <td>{{$item->end}}</td>
                                <td>{{$item->assignedby}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.box -->
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop
