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
                                <th>Question</th>
                                <th>Pengisi</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($marks as $mark)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $mark->question->title }}</td>
                                <td>@if($mark->question->role == 1) {{'PH'}}
                                    @elseif($mark->question->role == 2) {{'Staff'}}
                                    @endif</td>
                                <td class="text-center">{{ $mark->string }}</td>
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