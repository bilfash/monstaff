@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1></h1>
</section>
<section class="content">
    <div class="row">
    	<div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Proses</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Selesai</a></li>
                </ul>
                <div class="tab-content">
                    <!-- BELUM DINILAI -->
                    <div class="tab-pane active" id="tab_1">
                        <table class="table table-striped table-hover table-bordered" id="table-proses">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No.</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th class="col-md-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach ($staffs as $staff)
                                @if($flag[$staff->id])
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $staff->username }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td class="text-center">
                                    <a href="{{ URL::to('submit/'. $id .'/' . $staff->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span>Beri Nilai</a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- SUDAH -->
                    <div class="tab-pane" id="tab_2">
                        
                        <table class="table table-striped table-hover table-bordered" id="table-proses">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No.</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach ($staffs as $staff)
                                @if(!$flag[$staff->id])
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $staff->username }}</td>
                                    <td>{{ $staff->name }}</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
    	</div>
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
        $(document).ready(function(){
        $(function() {
            $('#table-proses').dataTable();
        });
    });
    </script>
@stop
