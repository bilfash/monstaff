@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<!-- TODO
  - CONTENT
  - SCORE (PERSENTASE)
  - ROLE DI PERTANYAAN
 -->
<section class="content-header">
    <h1>Event</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update event</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Nama event</label>
                            <div class="col-sm-7">
                                <input type="text" name="name" class="form-control" value="{{ $lala->name }}" placeholder="Nama event" required>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Start</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                            <div class="input-group">
                              <input type="date" class="form-control pull-right"value="{{ $lala->start }}" id="reservationtime" name='start'>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">End</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                            <div class="input-group">
                              <input type="date" class="form-control pull-right" value="{{ $lala->end }}" id="reservationtime" name='end'>
                            </div><!-- /.input group -->
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Enabled</label>
                            <div class="col-sm-7">
                                <select class="selecter form-control" name="enabled">
                                    <option value="1" @if ($lala->enabled == '1') {{ 'selected' }} @endif >Ya</option>
                                    <option value="0" @if ($lala->enabled == '0') {{ 'selected' }} @endif >Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Question</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                              <select class="form-control select2" multiple="multiple" data-placeholder="You may select this later" style="width: 100%;" name='questions[]' value='$lala->pivots->id'>
                              @foreach($questions as $q)
                                <option style="width: 100%;" value='{{$q->id}}'
                                  @if( in_array( $q->id, (array)$lala->question))
                                    selected='true'
                                  @endif
                                  >
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
                    <h3 class="box-title text-center">List Pertanyaan Sebelumnya</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Judul Pertanyaan</th>
                                <?php $i = 1;?>
                            </tr>
                            @foreach($lala->question as $pivot)
                            <tr>
                                <th class="col-md-1">{{ $i++ }}</th>
                                <td ><a href="{{ URL::to('question/detail/' . $pivot->id) }}" title="">{{ $pivot->title }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title text-center">List Pertanyaan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Judul Pertanyaan</th>
                                <?php $i = 1;?>
                            </tr>
                            @foreach($questions as $pivot)
                            <tr>
                                <th class="col-md-1">{{ $i++ }}</th>
                                <td ><a href="{{ URL::to('question/detail/' . $pivot->id) }}" title="">{{ $pivot->title }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div><!-- /.box -->
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
      $(function(){

        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      });
    </script>
@stop
