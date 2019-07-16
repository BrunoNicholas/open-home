@extends('layouts.site')
@section('title') Incident Details @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> View Incident Details | {{ config('app.name') }} </h3>
	        <p> Contribute to our cause by adding a  {{ config('app.name') }}. </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('incidents.index') }}"> <i class="fa fa-user-plus"></i> Incidents </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Incident Details </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as 
                        <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | 
                        {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }}
                    </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
@include('layouts.includes.notifications')
<!-- /end of description section -->
<div class="col-md-12" style="padding:10px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-9 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="card-title"> Incident Details | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')  @endsection