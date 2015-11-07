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
                    <h3 class="box-title">Edit Pertanyaan Event</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                <form action="" method="post" role="form">
                    <script>
                    $(function () {
                        //Initialize Select2 Elements
                        $(".select2").select2();
                    });
                    var iter =1;
                    function myFunction() {
                        var value = $( "#pivot" ).val();
                        var text = $( "#pivot option:selected" ).text();
                        $( "#addpivot" ).append( '<div id=piv'+iter+'>    <div class="input-group">    <input type="text" class="form-control" readonly value="'+text+'">   <input type="hidden" name="pivot[]" readonly value="'+value+'">    <span class="input-group-btn">    <button class="btn btn-warning" type="button" value="'+iter+'" onclick="erasepiv('+iter+')">Hapus</button>    </span>    </div>    </div>' );
                        iter++;
                    }

                    function erasepiv(yeah) {
                        var that = '#piv'+yeah;
                        $( that ).remove();
                    }

                     function eraseXXX(yeah,yaho) {
                        var that = '#hp'+yeah;
                        $( that ).remove();
                        $( "#deletepiv" ).append( '<input type="hidden" name="delete[]" readonly value="'+yaho+'">' );
                    }
                    </script>
                    <div class="form-group">
                        <label for="">Pertanyaan</label>
                        <div class="input-group">
                            <select id="pivot" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="0"></option>
                            @foreach ($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->title }}</option>
                            @endforeach
                        </select>
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-sm" type="button" onclick="myFunction()">Tambah</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div>
                            <div class="box-body">
                                <div id="addpivot">    
                                    
                                </div>
                                <div id="deletepiv">    

                                </div>
                                <hr>
                                <?php $hp = 1; ?>
                                @foreach($items as $item)
                                <div id="hp{{$hp}}">   
                                    <div class="input-group">    
                                        <input type="text" class="form-control" readonly value="{{$item->question->title}}">   
                                        <span class="input-group-btn">    
                                            <button class="btn btn-warning" type="button" onclick="eraseXXX(<?php echo $hp++;?>,{{$item->id}})">Hapus</button>    
                                        </span>    
                                    </div>    
                                </div>
                                @endforeach
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan</button>
                </form>
            </div>
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
