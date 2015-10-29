@extends('layouts.general')
@section('content')
<section class="content-header">
    <h1>Login Sebagai Dosen</h1>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-bordered" id="table-lecturer">
                        <thead>
                            <tr>
                                <th class="col-md-1">No.</th>
                                <th class="col-md-4">Nama Dosen</th>
                                <th class="col-md-3">NIP</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data['items'] as $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td><a href="{{ URL::to('lecturer/detail/' . $item->id) }}" title="">{{ $item->name }}</a></td>
                                <td>{{ $item->nip }}</td>
                                <td>
                                    <a href="{{ url('login/user/' . $item->user->id) }}" class="btn btn-success" title="Login sebagai {{ $item->name }}"><i class="fa fa-unlock-alt"> </i> Login</a>
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

<script type="text/javascript">
    $(document).ready(function(){
        $(function() {
            $('#table-lecturer').dataTable();
            $('#table-lecturer_filter input').focus();
        });
    });
</script>
@stop