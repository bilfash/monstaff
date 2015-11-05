@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Departemen</h1>
</section>
<section class="content">
    <div class="row">
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Nilai</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-hover table-bordered" id="table-department">
                        <thead>
                            <tr>
                                <th class="col-md-1">No.</th>
                                <th>Penilaian</th>
                                <th>Periode</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $item->event->name }}</td>
                                <td>{{ substr($item->event->start,0,10) }} - {{ substr($item->event->end,0,10) }}</td>
                                <td class="text-center">{{ $item->score }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script department="text/javascript">
    $(document).ready(function(){
        $(function() {
            $('#table-department').dataTable();
            $('#flash-overlay-modal').modal();
        });
    });
</script>
@stop