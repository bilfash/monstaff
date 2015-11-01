@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Beri Penilaian</h1>
</section>
<section class="content">
    <div class="row">
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-hover table-bordered" id="table-score">
                        <thead>
                            <tr>
                                <th class="col-md-1">No.</th>
                                <th class="col-md-2">User</th>
                                <th >
                                  Event
                                </th>
                                <th class="col-md-2"> Skor </th>
                                <th class="col-md-1 text-center">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td><a href="{{ URL::to('user/detail/' . $item->user->id ) }}" title="">{{ $item->user->name }}</a></td>
                                <td>
                                  {{$item->event->title}}
                                </td>
                                <td class="text-center">{{ $item->score->score==null ? $item->score->score : 'Belum Dinilai' }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$i}}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Nilai?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ? <br><br><br> klik "Ok!!" untuk konfirmasi
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a href="{{ URL::to('score/delete/' . $item->id) }}">
                                                    <button type="button" class="btn btn-primary">Ok!!</button>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

<script score="text/javascript">
    $(document).ready(function(){
        $(function() {
            $('#table-score').dataTable();
            $('#flash-overlay-modal').modal();
        });
    });
</script>
@stop
