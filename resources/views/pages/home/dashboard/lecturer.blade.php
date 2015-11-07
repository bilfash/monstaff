@extends('layouts.general')
@section('content')
    @include('partials.flash-overlay-modal')
<section class="content-header">
    <h1>Dasbor Dosen</h1>
</section>
<section class="content">
@include('includes.message')
    <div class="row">
        <div class="col-md-8">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="box box-success">
        				<div class="box-header">
        					<i class="fa fa-book"></i><h3 class="box-title">Bimbingan Tugas Akhir</h3>
        					<div class="pull-right box-tools">
        						<a href="{{ URL::to('final_project') }}" class="btn btn-success">Selengkapnya</a>
        					</div>
        				</div>
        				<div class="box-body">
        					<table class="table table-hover">
        						<thead>
	        						<th>No</th>
	        						<th>NRP</th>
	        						<th>Nama</th>
	        						<th>Judul</th>
	        						<th>Status</th>
	        						<th>Target Selesai</th>
	        					</thead>
	        					<tbody>
	        						<?php $i=1; ?>
	        						@foreach($data['final_projects'] as $final_project)
	        						<tr>
	        							<td>{{ $i++ }}</td>
	        							<td>{{ $final_project->student->nim }}</td>
	        							<td>{{ $final_project->student->name }}</td>
	        							<td>{{ $final_project->title }}</td>
	        							<td>
	        								@if($final_project->finish_date == NULL)
	        									{{ 'Belum Selesai' }}
	        								@else
	        									{{ 'Selesai' }}
	        								@endif
	        							</td>
	        							<td>{{ $final_project->finish_date_target }}</td>
	        						</tr>
	        						@endforeach
	        					</tbody>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="box box-primary">
        				<div class="box-header">
        					<i class="fa fa-inbox"></i><h3 class="box-title">Mahasiswa Sit In</h3>
        					<div class="pull-right box-tools">
        						<a href="{{ URL::to('sit_in') }}" class="btn btn-primary">Selengkapnya</a>
        					</div>
        				</div>
        				<div class="box-body">
        					<table class="table table-hover">
        						<thead>
	        						<th>No</th>
	        						<th>NRP</th>
	        						<th>Nama</th>
	        						<th>Status</th>
	        						<th>Waktu</th>
	        					</thead>
	        					<tbody>
	        						<?php $i=1; ?>
	        						@foreach($data['sit_ins'] as $sit_in)
	        						<tr>
	        							<td>{{ $i++ }}</td>
	        							<td>{{ $sit_in->student->nim }}</td>
	        							<td>{{ $sit_in->student->name }}</td>
	        							<td>{{ $sit_in->sitInStatus->name }}</td>
	        							<td>{{ $sit_in->created_at }}</td>
	        						</tr>
	        						@endforeach
	        					</tbody>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="col-md-4">
        	<div class="box box-warning">
				<div class="box-header">
					<i class="fa fa-info-circle"></i><h3 class="box-title">Pemberitahuan</h3>
				</div>
				<div class="box-body">
					<?php $i=0; ?>
					@foreach($data['notifications'] as $notification)
					<div class="item">
						<a href="#" class="name">
                            {{ $notification->code }}
                        </a>
						<p class="message">
							{{ $notification->message }}
						</p>
					</div>
					<?php 
						$i++;
						if($i >= 3)
						{
							break;
						}
					?>
					@endforeach
				</div>
			</div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-info">
				<div class="box-header">
					<i class="fa fa-rocket"></i><h3 class="box-title">Jadwal Sidang Mahasiswa Bimbingan</h3>
					<div class="pull-right box-tools">
						<a href="{{ URL::to('meeting/manage') }}" class="btn btn-info">Selengkapnya</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-hover">
		    			<thead>
		    				<th>No</th>
		    				<th>Nama</th>
		    				<th>Jenis Sidang</th>
		    				<th>Tanggal</th>
		    				<th>Mulai</th>
		    				<th>Selesai</th>
		    				<th>Ruangan</th>
		    				<th>Penguji</th>
		    			</thead>
		    			<tbody>
		    				<?php $i=1; ?>
		    				@foreach($data['pembimbing_meetings'] as $meeting)
		    				<tr>
		    					<td>{{ $i++ }}</td>
		    					<td>{{ $meeting->finalProject->student->name }}</td>
		    					<td>{{ $meeting->meetingType->name }}</td>
		    					<td>{{ $meeting->date_held }}</td>
		    					<td>{{ $meeting->meetingSession->start_hour }}</td>
		    					<td>{{ $meeting->meetingSession->finish_hour }}</td>
		    					<td>
		    					@if($meeting->room)
		    						{{ $meeting->room->code }}
		    					@else
		    						-
		    					@endif
		    					</td>
		    					<td>
		    						<?php
		    							$numberOfPenguji = $meeting->lecturers->count();
		    							$j=0;
		    						?>
		    						@foreach($meeting->lecturers as $lecturer)
		    							{{ $lecturer->name }}
		    							@if($j++ < $numberOfPenguji )
		    								{{ ',' }}
		    							@endif
		    						@endforeach
		    					</td>
		    				</tr>
		    				@endforeach
		    			</tbody>
		    		</table>	
				</div>
			</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-danger">
				<div class="box-header">
					<i class="fa fa-plane"></i><h3 class="box-title">Jadwal Menguji Sidang</h3>
					<div class="pull-right box-tools">
						<a href="{{ URL::to('meeting/lecturer') }}" class="btn btn-danger">Selengkapnya</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-hover">
		    			<thead>
		    				<th>No</th>
		    				<th>Nama</th>
		    				<th>Jenis Sidang</th>
		    				<th>Tanggal</th>
		    				<th>Mulai</th>
		    				<th>Selesai</th>
		    				<th>Ruangan</th>
		    				<th>Penguji</th>
		    			</thead>
		    			<tbody>
		    				<?php $i=1; ?>
		    				@foreach($data['penguji_meetings'] as $meeting)
		    				<tr>
		    					<td>{{ $i++ }}</td>
		    					<td>{{ $meeting->finalProject->student->name }}</td>
		    					<td>{{ $meeting->meetingType->name }}</td>
		    					<td>{{ $meeting->date_held }}</td>
		    					<td>{{ $meeting->meetingSession->start_hour }}</td>
		    					<td>{{ $meeting->meetingSession->finish_hour }}</td>
		    					<td>{{ $meeting->room->code }}</td>
		    					<td>
		    						<?php
		    							$numberOfPenguji = $meeting->lecturers->count();
		    							$j=0;
		    						?>
		    						@foreach($meeting->lecturers as $lecturer)
		    							{{ $lecturer->name }}
		    							@if($j++ < $numberOfPenguji )
		    								{{ ',' }}
		    							@endif
		    						@endforeach
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
@stop
@section('custom_foot')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#flash-overlay-modal').modal();
        });
    </script>
@stop