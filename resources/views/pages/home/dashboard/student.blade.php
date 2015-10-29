@extends('layouts.general')
@section('content')
<section class="content-header">
    <h1>Dasbor</h1>
</section>
<section class="content">
@include('includes.message')
    <div class="row">
        <div class="col-md-8">
        	<div class="box box-info">
        		<div class="box-header">
        			<i class="fa fa-user"></i><h3 class="box-title">Profil Mahasiswa</h3>
        		</div>
        		<div class="box-body">
        			<div class="row">
	        			<div class="col-md-4">
	        				<img src="{{ URL::to(Auth::user()->img_path) }}" class="img-rounded img-responsive">
	        			</div>
	        			<div class="col-md-5">
	        				<h3>{{ $data['item']->user->name }}</h3>
	        				<h3>{{ $data['item']->nim }}</h3>
	        				<h4>{{ $data['item']->user->email }}</h4>
	        				<h4>{{ $data['item']->user->contact }}</h4>
	        				<h4>
	        				@if($data['item']->user->gender == 'L' || $data['item']->user->gender == 'l')
	        					{{ 'Laki-laki' }}
	        				@elseif($data['item']->user->gender == 'P' || $data['item']->user->gender == 'p')
	        					{{ 'Perempuan' }}
	        				@endif
	        				</h4>
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
</section>
@stop