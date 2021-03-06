@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Pertanyaan</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to('question/create') }}" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</a>
        </div>
    </div>
    <div class="row">
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Pertanyaan</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-hover table-bordered" id="table-question">
                        <thead>
                            <tr>
                                <th class="col-md-1">No.</th>
                                <th>Title</th>
                                <th class="col-md-2">Ditujukan Untuk</th>
                                <th class="col-md-1">Type</th>
                                <th class="col-md-1">Enable</th>
                                <th class="col-md-1 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($items as $item)
                            @if($item->softDelete==null)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td><a href="{{ URL::to('question/detail/' . $item->id) }}" title="">{{ $item->title }}</a></td>
                                <td>
                                  <!--  TODO -->
                                  @if($item->role == 1) {{'PH'}}
                                    @elseif($item->role == 2) {{'Staff'}}
                                    @endif
                                </td>
                                <td>
                                  @if($item->type==1)
                                    Kuantitatif
                                  @elseif($item->type==2)
                                    Deskriptif
                                  @endif
                                </td>

                                <td class="text-center">{{ $item->enabled ? 'Ya' : 'Tidak' }}</td>
                                <td class="text-center">
                                <a href="{{ URL::to('question/update/' . $item->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$i}}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Pertanyaan?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ? <br><br><br> klik "Ok!!" untuk konfirmasi
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a href="{{ URL::to('question/delete/' . $item->id) }}">
                                                    <button type="button" class="btn btn-primary">Ok!!</button>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to('question/create') }}" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</a>
        </div>
    </div>
</section>

<script question="text/javascript">
    $(document).ready(function(){
        $(function() {
            $('#table-question').dataTable();
            $('#flash-overlay-modal').modal();
        });
    });
</script>
@stop
