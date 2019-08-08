@extends('layouts.site')
@section('title') Home @endsection
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" 
    	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" 
    	crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" 
    	integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" 
    	crossorigin=""></script>
@endsection
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
                        <!-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-home"></i> Home </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
<?php $remove[] = "'"; $remove[] = '"'; $remove[] = "-";?>
<div class="col-md-12">
    <div class="col-md-8">
        <div class="col-md-12 tabs-area">
            <div class="liner"></div>
            <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
                <li class="active">
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="welcome">
                        <span class="round-tabs one"> <i class="glyphicon glyphicon-home"></i> </span> 
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area2" data-toggle="tab" title="profile">
                        <span class="round-tabs two">
                           <i class="glyphicon glyphicon-user"></i>
                        </span> 
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area3" data-toggle="tab" title="{{ config('app.name') }} goodies">
                       	<span class="round-tabs three">
                        	<i class="glyphicon glyphicon-gift"></i>
                      	</span> 
                    </a>
				</li>
				<li>
					<a href="#tabs-demo6-area4" data-toggle="tab" title="Communications">
                       	<span class="round-tabs four">
                         	<i class="glyphicon glyphicon-comment"></i>
                       	</span> 
                    </a>
                </li>
                <li>
                	<a href="#tabs-demo6-area5" data-toggle="tab" title="completed">
                    	<span class="round-tabs five">
                      		<i class="glyphicon glyphicon-ok"></i>
                      	</span> 
                    </a>
                </li>
	        </ul>
	        <div class="tab-content tab-content-v5">
	            <div class="tab-pane fade in active" id="tabs-demo6-area1">
					<h3 class="head text-center">Public Activity<sup>™</sup></h3>
					<div id="map" style="width: 100%; height: 300px"></div>
					<br>
	                <p class="narrow text-center">
	                    {{ config('app.name') }} enables you and the general public of Uganda to stand against the high rates of violence of home, gender-based community, school and anywhere by creating awareness of such and cases to the authorities to take action to save many lives homes, families and the entire community.
	                </p>
	                <p class="narrow text-center">
	                	The above map shows the submitted Incidents from different locations in the country.
	                </p>
	                <p class="text-center">
	                    <a href="{{ route('incidents.create') }}" class="btn btn-success btn-round green"> Report to {{ config('app.name') }} 
	                      	<span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
	                    </a>
	                </p>
	            </div>
	            <div class="tab-pane fade" id="tabs-demo6-area2">
	                <h3 class="head text-center">Your Progress &amp; Activity<sup>™</sup></h3>
	                <p class="narrow text-center"> Your identity is only visible to the users of {{ config('app.name') }} and will be kept confidential as possible.</p>
	                <p class="text-center">
	                    <a href="{{ route('profile') }}" class="btn btn-success btn-round green"> View your public profile
	                      	<span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
	                    </a>
	                </p>
	            </div>
	            <div class="tab-pane fade" id="tabs-demo6-area3">
	                <h3 class="head text-center">{{ config('app.name') }} Credits</h3>
	                <p class="narrow text-center">
	                    Here you will find your appreciation for taking part in helping out with the problems facing our community as regards to violence.
	                </p>
	                <p class="text-center">
	                	<a href="{{ route('settings') }}" class="btn btn-success btn-round green"> Your {{ config('app.name') }} settings <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
	                </p>
	            </div>
	            <div class="tab-pane fade" id="tabs-demo6-area4">
	                <h3 class="head text-center">Drop comments!</h3>
	                <p class="narrow text-center">
	                    Comments are key to our general cause. You can as well chose to communicate to others through the <a href="{{ route('messages.index','sent') }}">messages</a>.
					</p>
                	<div class="row text-center">
                		<div class="col-md-3">
                    		<a href="{{ route('posts.index') }}" class="btn btn-success btn-round green btn-block"> See All Posts <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                		</div>
                		<div class="col-md-4">
                    		<a href="{{ route('incidents.index') }}" class="btn btn-success btn-round green btn-block"> See Approved Incidents <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                		</div>
                		<div class="col-md-4">
                    		<a href="{{ route('questions.index') }}" class="btn btn-success btn-round green btn-block"> See Asked Questions <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                		</div>
                	</div>
	            </div>
	            <div class="tab-pane fade" id="tabs-demo6-area5" style="padding: 10px;">
	                <div class="text-center">
	                    <i class="img-intro icon-checkmark-circle"></i>
	                </div>
	                <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48250;">♥</span> {{ config('app.name') }}</h3>
	                <p class="narrow text-center">
	                    We are humble and we thank you for being with us and surporting our cause for {{ config('app.name') }}. <br><br>
	                    You have been with us since {{ Auth::user()->created_at }}. <br> Please share to the link another to save many. <br>
	                </p>
	            </div>
		        <div class="clearfix"></div>
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
	                        <h3>{{ App\Models\Post::where('uploaded_by',Auth::user()->id)->get()->count() }}</h3> <p>Posts</p>
	                    </div>
                      	<div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                          	<h3>{{ App\Models\Comment::where('responder',Auth::user()->id)->get()->count() }}</h3> <p>Comments</p>
                      	</div>
                      	<div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                          	<h3>0</h3> <p>Credits</p>
                      	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
	<script>

		var cities = L.layerGroup();

		regions = {{ str_replace( $remove, "", $gpsponts) }};

		@for ($i = 0; $i<$ptNum; $i++)
		L.marker(regions[{{ $i }}]).bindPopup('Reported Incident.').addTo(cities)@if($i<($ptNum-1)),
@else;
@endif
		@endfor

		var mbAttr = 'Map data &copy; {{ config('app.name') }}, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> ',
			mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
		var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
			streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
		var map = L.map('map', {
			center: [1.735574, 32.662354],
			zoom: 5.5,
			layers: [grayscale, cities]
		});
		var baseLayers = {
			"Grayscale": grayscale,
			"Streets": streets
		};
		var overlays = {
			"Cities": cities
		};
		L.control.layers(baseLayers, overlays).addTo(map);

	</script>
	{{--
	<script>
		// create current location
		var latit = 0; var longit = 0;

        // Creating map options
        var mapOptions = {
            center: [0.347596, 32.582520],
            zoom: 10
        }
         
        // Creating a map object
        var map = new L.map('map', mapOptions);
         
        // Creating a Layer object
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        // current location

        // Adding layer to the map
        map.addLayer(layer);
    </script> --}}
@endsection