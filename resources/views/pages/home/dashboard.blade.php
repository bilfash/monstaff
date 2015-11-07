@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')
<section class="content-header">
    <h1 align='center'>Selamat datang di E-Surat ITS</h1>
</section>

<section class="content">
<script>
$(document).ready(function(){
	@if($select== true)
		var month = {{$month}}
		var year = {{$year}}
	@else ($selct == false)
		var d = new Date();
		var month = d.getMonth()+1;
		var year = d.getFullYear();
	@endif
	
	if (month == 01){
		$("#labelbln").html("Januari");
	}
	else if (month == 02){
		$("#labelbln").html("Pebruari");
	}
	else if (month == 03){
		$("#labelbln").html("Maret");
	}
	else if (month == 04){
		$("#labelbln").html("April");
	}
	else if (month == 05){
		$("#labelbln").html("Mei");
	}
	else if (month == 06){
		$("#labelbln").html("Juni");
	}
	else if (month == 07){
		$("#labelbln").html("Juli");
	}
	else if (month == 08){
		$("#labelbln").html('Agustus');
	}
	else if (month == 09){
		$("#labelbln").html("September");
	}
	else if (month == 10){
		$("#labelbln").html("Oktober");
	}
	else if (month == 11){
		$("#labelbln").html("Nopember");
	}
	else {
		$("#labelbln").html("Desember");
	}
	$('#labelth').html(year);
});

$(document).ready(function(){
    $("#pilih").click(function(){
    	var month = $('#selectbln').val()-1;
    	var monthlist = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
    	$("#labelbln").html(monthlist.slice(month, month+1));
    	$('#labelth').html($('#selectth').val());
    	//alert(month);
        //$("p").hide();
    });
});
</script>

@if(isset($notif))
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-warning"></i>Hari Libur</h4>
	Mohon mengisi Hari Libur Rutin untuk tahun <?php echo date("Y")+1 ?>, untuk mengisi silahkan klik <a href="{{URL::to('holiday')}}">disini</a>
</div>
@endif

<div class="box-header with-border">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
				<div class="box-header with-border">
						<h3 class="box-title">
						    Statistik Surat Keluar dan Masuk Bulan <label id='labelbln'>labelbln</label> - <label id='labelth'>labelth</label></p></p>
						</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"></button>
						<button class="btn btn-box-tool" data-widget="remove"></button>	
					</div>
				</div>
				<div class="box-body">
				<div class="chart" style="width: 100%">
				<canvas id="barChart" height="340" width="458" style="width: 458px; height: 388px;"></canvas>
					
				</div>
			
			<form action="" method="post" role="form">
			<div class="form-group">
			<select class="selecter form-control" id='selectbln' name='selectbln'>
				<option value=''>- Bulan -</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>Nopember</option>
				<option value='12'>Desember</option>
			</select>
			</div>

			<div class="form-group">
			<select class="selecter form-control" id='selectth' name='selectth'>
				<option value=''>- Tahun -</option>
				<option value='2010'>2010</option>
				<option value='2011'>2011</option>
				<option value='2012'>2012</option>
				<option value='2013'>2013</option>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
			</select>
			</div>
			{!! csrf_field() !!}
			<button class="btn btn-success" id='pilih'>Pilih</button>
			</div>
			</div>
			</form>
		</div>
		<div class="col-md-6">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">
            	Statistik Surat Keluar Masuk Tahun <label id='labelth1'>-</label> 
            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
				</button>
				<button class="btn btn-box-tool" data-widget="remove">
	            <i class="fa fa-times">
	            </i>
        </button>
    </div>
	</div>

	<div class="box-body">
	    	<div class="chartTh" style="width: 100%">
				<canvas id="ChartTh" height="400" width="458" style="width: 458px; height: 388px;"></canvas>
			</div>

	        <div class="form-group">
			<select class="selecter form-control" id='selectth' name='selectth'>
				<option value=''>- Tahun -</option>
				<option value='2010'>2010</option>
				<option value='2011'>2011</option>
				<option value='2012'>2012</option>
				<option value='2013'>2013</option>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
			</select>
			</div>

			{!! csrf_field() !!}
			<button class="btn btn-success" id='pilih'>Pilih</button>
	    </div>
		</div>
	</div>
	</div>
</div>

<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barChartData = {
	
	labels : [@foreach($ins as $item)
		   "{{substr ($item->date, -2, 2)}}",
			@endforeach],
	
	datasets : [
				{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [@foreach($ins as $item)
					   {{$item->totalin}},
						@endforeach]
				},
				{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [@foreach($outs as $item)
					   {{$item->totalout}},
						@endforeach]
				}
			   ]

				}

	var chartThData = {
	labels : [@foreach($insTh as $item)
		   "{{$item->month}}",
			@endforeach],
			datasets : [
			{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data : [@foreach($insTh as $item)
				   {{$item->totalinth}},
					@endforeach]
			},
			{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,0.8)",
			highlightFill : "rgba(151,187,205,0.75)",
			highlightStroke : "rgba(151,187,205,1)",
			data : [@foreach($outsTh as $item)
				   {{$item->totaloutth}},
					@endforeach]
			}
			]

			}
						
			window.onload = function(){
				var ctx = document.getElementById("barChart").getContext("2d");
				window.myBar = new Chart(ctx).Bar(barChartData, {
				responsive : true
				});

				var ctr = document.getElementById("ChartTh").getContext("2d");
				window.myBar = new Chart(ctr).Bar(chartThData, {
				responsive : true
				});
			}
</script>


</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop