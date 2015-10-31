@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Event</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h2 >Detail Event</h2>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                    @if ($item != null)
                    <a href="{{ URL::to('event/update/' . $item->id) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ URL::to('event/delete/' . $item->id) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                    @endif
                    <a href="{{ URL::to('event') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
                    <a href="{{ URL::to('event/ '.$item->id.'/update/score') }}" class="btn btn-success" title="Tambah">Ubah Skor Pertanyaan</a>
                    <br><br>
                    @if ($item != null)
                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th class="col-md-3">Nama</th>
                                <td><strong>{{ $item->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Enabled</th>
                                <td>{{ $item->enabled ? 'Ya' : 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Start</th>
                                <td>{{ $item->start }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">End</th>
                                <td>{{ $item->end }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Banyak Pertanyaan</th>
                                <td> {{$item->question->count()}} </td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Ditambahkan Oleh</th>
                                <td> <!-- TODO --> </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    @if ($item->question != null)
                    <?php $i=1?>
                    <h4>Detail Pertanyaan</h4>
                    <table class="table">
                        <tbody>
                            @foreach($item->question as $pivot)
                            <tr>
                                <th class="col-md-1">{{ $i++ }}</th>
                                <td class="col-md-3"><a href="{{ URL::to('question/detail/' . $pivot->id) }}" title="">{{ $pivot->title }}</a></td>
                            </tr>
                            @endforeach
                    </table>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
