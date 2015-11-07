@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Pertanyaan</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detail Pertanyaan</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                    @if ($item != null)
                    <a href="{{ URL::to('question/update/' . $item->id) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ URL::to('question/delete/' . $item->id) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                    @endif
                    <a href="{{ URL::to('question') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
                    <br><br>
                    @if ($item != null && $item->softDelete==null )
                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th class="col-md-3">Judul Pertanyaan</th>
                                <td>{{ $item->title }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Isi Pertanyaan</th>
                                <td><?php echo htmlspecialchars_decode($item->content) ?></td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Teks Pendukung / <i>Help Text</i></th>
                                <td>{{ $item->helptext }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">Ditujukan Untuk</th>
                                <td>
                                  <!--  TODO -->
                                  @if($item->role == 1) {{'PH'}}
                                    @elseif($item->role == 2) {{'Staff'}}
                                    @endif</td>
                            </tr>
                            <tr>
                                <th class="col-md-1">Enabled</th>
                                <td>{{ $item->enabled ? 'Ya' : 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
