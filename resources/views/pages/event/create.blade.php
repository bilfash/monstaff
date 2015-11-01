@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Event</h1>
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
                        <input type="hidden" name="enabled" value="0">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Nama Event</label>
                            <div class="col-sm-7">
                                <input type="text" name="name" class="form-control" placeholder="Nama Event" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Start</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                            <div class="input-group">
                              <input id="datepicker1" type="text" class="form-control pull-right" id="reservationtime" name='start'>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">End</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                            <div class="input-group">
                              <input id="datepicker2" type="text" class="form-control pull-right" id="reservationtime" name='end'>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Question</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                              <select class="form-control select2" multiple="multiple" data-placeholder="You may select this later" style="width: 100%;" name='questions[]' >
                              @foreach($questions as $q)
                                <option style="width: 100%;" value='{{ $q->id }}'>
                                    {{ $q->title }}
                                </option>
                              @endforeach
                            </select>
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
                                <th class="col-md-1">#</th>
                                <th >Nama Event</th>
                                <th class="col-md-1">Dibuat Oleh </th>
                                <?php $i = 1;?>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><a href="{{ URL::to('event/detail/' . $item->id) }}" title=""> {{ $item->name }}</a></td>
                                <td>{{$item->assignedby}}</td>
                                <!--  TODO -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
      $(function(){

        //Initialize Select2 Elements
        $(".select2").select2();

        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      });
    </script>
@stop
