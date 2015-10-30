@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Jabatan</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detail Jabatan</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                    @if ($item != null)
                    <a href="{{ URL::to('position/update/' . $item->id) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ URL::to('position/delete/' . $item->id) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                    @endif
                    <a href="{{ URL::to('position') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
                    <br><br>
                    @if ($item != null)
                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th class="col-md-3">Nama</th>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <th>Enabled</th>
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
