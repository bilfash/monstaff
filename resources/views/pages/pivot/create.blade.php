@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Pivot</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Pilih Event</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" class="form-horizontal">
                    <div class="box-body">
                        <input type="hidden" name="enabled" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Event</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                            <select class="form-control select2"  data-placeholder="Pilih Event..." style="width: 100%;" name='eventid'>
                              @foreach($events as $q)
                                <option value='{{ $q->id }}'>
                                    {{ $q->name }}
                                </option>
                              @endforeach

                            </select>

                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Question</label>
                          <!-- TODO ubah format -->
                          <div class=' col-sm-7'>
                              <select class="form-control select2" multiple="multiple" data-placeholder="Pilih Pertanyaan yang akan dimasukkan.." style="width: 100%;" name='questions' >
                              {{ Form::select('questions',
                              <?php echo '[';
                                    foreach($questions as $q){
                                      echo '"'.$q->id.'"=>"'.$q->value.'",';
                              }
                             echo ']';?>
                                , '',['class'=>'form-control select2'])
                              }}
                              <!-- @foreach($questions as $q)
                                <option style="width: 100%;" value='{{ $q->id }}'>
                                    {{ $q->title }}
                                </option>
                              @endforeach -->
                            </select>

                          </div>
                        </div>

                    <div class="box-footer">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                  </div><!-- /.box-footer -->
              </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
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
