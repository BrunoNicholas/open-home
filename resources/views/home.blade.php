@extends('layouts.site')
@section('title') Home @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Home | {{ config('app.name') }} </h3>
	        <p>Your Place Of Peace, Education &amp; Rescue!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Dashboard </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>

<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-8 padding-0">
            <div class="col-md-12">
                <div class="panel box-v4">
                    <div class="panel-heading bg-white border-none">
                      <h4><span class="icon-notebook icons"></span> Agenda</h4>
                    </div>
                    <div class="panel-body padding-0">
                        <div class="col-md-12 col-xs-12 col-md-12 padding-0 box-v4-alert">
                            <h2>Checking Your Server!</h2>
                            <p>Daily Check on Server status, mostly looking at servers with alerts/warnings</p>
                            <b><span class="icon-clock icons"></span> Today at 15:00</b>
                            <hr>
                            <div class="">
	                          <i>Content Here!</i>
	                        </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12 padding-0">
	            <div class="panel box-v2">
	                  <div class="panel-heading padding-0">
	                    <img src="{{ asset('asset/img/bg2.jpg') }}" class="box-v2-cover img-responsive"/>
	                    <div class="box-v2-detail">
	                      <img src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" class="img-responsive"/>
	                      <h4> {{ Auth::user()->name }} | {{ config('app.name') }} </h4>
	                    </div>
	                  </div>
	                  <div class="panel-body">
	                    <div class="col-md-12 padding-0 text-center">
	                      <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
	                          <h3>2.000</h3>
	                          <p>Post</p>
	                      </div>
	                      <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
	                          <h3>2.232</h3>
	                          <p>share</p>
	                      </div>
	                      <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
	                          <h3>4.320</h3>
	                          <p>photos</p>
	                      </div>
	                    </div>
	                  </div>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection