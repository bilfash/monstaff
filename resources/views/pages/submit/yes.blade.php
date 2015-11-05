@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Penilaian Staff</h3>
                            </div>
                            <div class="box-body">
                                <?php $hp = 1; ?>
                                @foreach($questions as $item) 
                                @if($item->question->role == 1)
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <div class="col-sm-12">
                                            <label for="inputEmail3" class="control-label">{{$item->question->title}}</label>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11">
                                            <p><?php echo htmlspecialchars_decode($item->question->content)?></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        @if($item->question->type == 1)
                                        <input type="number"  class="form-control" name="score[{{$item->question->id}}]" required>
                                        @else
                                        <input type="text"  class="form-control" name="score[{{$item->question->id}}]" required>
                                        @endif
                                        <p class="help-block">{{ $item->question->helptext }}</p>
                                    </div>
                                </div> <br> <hr> <br>
                                @endif
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
        </div>
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop
