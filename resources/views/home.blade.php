@extends('layouts.site')
@section('title') Home @endsection
@section('styles')
<link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    	<script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
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
                    <a href="#tabs-demo6-area3" data-toggle="tab" title="bootsnipp goodies">
                       	<span class="round-tabs three">
                        	<i class="glyphicon glyphicon-gift"></i>
                      	</span> 
                    </a>
				</li>
				<li>
					<a href="#tabs-demo6-area4" data-toggle="tab" title="blah blah">
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
					<div id="map" style="width: 100%; height: 250px"></div>
					<br>
	                <p class="narrow text-center">
	                    {{ config('app.name') }} enables you and the general public of Uganda to stand against the high rates of violence of home, gender-based community, school and anywhere by creating awareness of such and cases to the authorities to take action to save many lives homes, families and the entire community.
	                </p>

	                <p class="text-center">
	                    <a href="" class="btn btn-success btn-round green"> Report to {{ config('app.name') }} 
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
	                	<a href="" class="btn btn-success btn-round green"> start using {{ config('app.name') }} <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
	                </p>
	            </div>
	            <div class="tab-pane fade" id="tabs-demo6-area4">
	                <h3 class="head text-center">Drop comments!</h3>
	                <p class="narrow text-center">
	                    Comments are key to our general cause. You can as well chose to communicate to others through the <a href="{{ route('messages.index','sent') }}">messages</a>.
					</p>
	                <p class="text-center">
	                    <a href="" class="btn btn-success btn-round green"> start using {{ config('app.name') }} <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
	                </p>
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
	                        <h3>0</h3> <p>Posts</p>
	                    </div>
                      	<div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                          	<h3>0</h3> <p>Comments</p>
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
    </script> {{--
    <script>
	    var map = L.map('map');

	    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
	      maxZoom: 18,
	      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
	        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
	        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	      id: 'mapbox.streets'
	    }).addTo(map);

	    // placeholders for the L.marker and L.circle representing user's current position and accuracy    
	    var current_position, current_accuracy;

	    function onLocationFound(e) {
		    // if position defined, then remove the existing position marker and accuracy circle from the map
		    if (current_position) {
		        map.removeLayer(current_position);
		        map.removeLayer(current_accuracy);
		    }

	      var radius = e.accuracy / 2;

	      current_position = L.marker(e.latlng).addTo(map)
	        .bindPopup("{{ Auth::user()->name }}, You are within " + radius + " meters from this point").openPopup();

	      current_accuracy = L.circle(e.latlng, radius).addTo(map);
	    }

	    function onLocationError(e) {
	      alert(e.message);
	    }

	    map.on('locationfound', onLocationFound);
	    map.on('locationerror', onLocationError);

	    // wrap map.locate in a function    
	    function locate() {
	      map.locate({setView: true, maxZoom: 16});
	    }

	    // call locate every 3 seconds... forever
	    setInterval(locate, 3000);
  	</script> --}}
@endsection