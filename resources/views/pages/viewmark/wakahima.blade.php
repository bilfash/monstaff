@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Departemen</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post" class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Event</label>
                        <div class="col-sm-7">
                            <select onchange="this.form.submit()" class="form-control" name="event">
                                <option>-</option>
                                @foreach($events as $event)
                                    <option  value="{{$event->id}}" >{{$event->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
        </div>
    </div>
    <br>
    @if($staffs != null)
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
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($staffs as $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td> <a href="{{URL::to('mark').'/'.$id.'/'.$item->user->id}}"> {{ $item->user->username }}</a></td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->department->name }}</td>
                                <td class="text-center">{{ $item->score</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
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