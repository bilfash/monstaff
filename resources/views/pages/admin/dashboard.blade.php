@extends('layouts.general')
@section('content')
@include('partials.flash-overlay-modal')

<section class="content-header">
    <h1>Dashboard</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$department}}</h3>
                    <p>Departemen</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-share-alt"></i>
                </div>
                <a href="{{ URL::to('department') }}" class="small-box-footer"><i class="ion-android-apps"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$position}}</h3>
                    <p>Jabatan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ URL::to('position') }}" class="small-box-footer"><i class="ion-android-apps"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$user}}</h3>
                    <p>User Aktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-happy-outline"></i>
                </div>
                <a href="{{ URL::to('user') }}" class="small-box-footer"><i class="ion-android-apps"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$user_disabled}}</h3>
                    <p>User Non-Aktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-sad-outline"></i>
                </div>
                <a href="{{ URL::to('user') }}" class="small-box-footer"><i class="ion-android-apps"></i></a>
            </div>
        </div><!-- ./col -->
    </div>
</section>


@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop