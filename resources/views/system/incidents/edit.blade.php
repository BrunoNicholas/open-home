@extends('layouts.site')
@section('title') Edit Incidents @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Edit Incidents | {{ config('app.name') }} </h3>
	        <p> Edit a created incident. </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('incidents.index') }}"> <i class="fa fa-user-plus"></i> Incidents </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Edit Incidents </li>
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
                    <h4 class="card-title"> Edit an incident | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    <form action="{{ route('incidents.update', $incident->id) }}" method="POST" class="tab-wizard wizard-circle">
                        @csrf
                        {{ method_field('PATCH') }}
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h6 style="width: 100%; text-align: center;">Main Content</h6>
                        <section>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="topic1">Topic <span class="text-danger">*</span> :</label>
                                        <input type="text" name="title" value="{{ $incident->title }}" class="form-control" id="topic1" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category1">Category <span class="text-danger">*</span> :</label>
                                        <select name="category" class="form-control" id="category1">
                                            <option value="{{ $incident->category }}"> Select to change Category</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Domestic Violence">Domestic Violence</option>
                                            <option value="Child Violence">Child Violence</option>
                                            <option value="Torture">Torture</option>
                                            <option value="Other">Other</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc">Description <span class="text-danger">*</span> :</label>
                                        <textarea name="description" class="form-control" id="desc" placeholder="Enter the details to help understand the incident more!">{{ $incident->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="map1">Location <span class="text-danger">*</span> :</label>
                                        <div class="form-control" id="map1"> </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6 style="width: 100%; text-align: center;">Other</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="decisions1">Attachment (Photo / Video) </label>
                                        <input type="file" class="form-control" name="attachement" style="border: none; ">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6 style="width: 100%; text-align: center;">Final</h6>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('incidents.index') }}" class="btn btn-round btn-info">Discard</a>
                            <button type="submit" class="btn btn-round btn-success">Submit Incident</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection