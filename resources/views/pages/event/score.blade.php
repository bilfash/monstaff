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
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Bobot Pertanyaan</h3>
                            </div>
                            <div class="box-body">
                                <?php $hp = 1; ?>
                                @foreach($items as $item) 
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-8 control-label">{{$item->question->title}}</label>
                                    <div class="col-sm-4">
                                        <input type="number"  class="form-control" name="score[{{$item->id}}]" value="{{$item->score}}" min="0" max="100">
                                    </div>
                                </div> <br> <br>
                                @endforeach
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                <button class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan</button>
                                <br>
                                <br>
                                <br>
                                </div><!-- /.box-body -->
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
      });
    </script>
@stop
