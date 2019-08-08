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
        <div class="col-md-8 padding-0">
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
                            <input type="hidden" name="user_id" value="{{ $incident->user_id }}">
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
                                        <input type="text" name="location" class="form-control" value="{{ $incident->location }}" placeholder="Click the two buttons to get location">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6 style="width: 100%; text-align: center;">Other</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="decisions1">Change Image (Photo / Video) </label>
                                        <input type="file" class="form-control" name="attachement" style="border: none; ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="radio" name="status" value="approved" id="st1" @if ($incident->status == 'approved')
                                            checked 
                                        @endif> <label for="st1">Approved</label>
                                        <input type="radio" name="status" value="investigation" id="st2" @if ($incident->status == 'investigation')
                                            checked 
                                        @endif> <label for="st2">Investigation</label>
                                        <input type="radio" name="status" value="rejected" id="st3" @if ($incident->status == 'rejected')
                                            checked 
                                        @endif> <label for="st3">Rejected</label>
                                        <input type="radio" name="status" value="pending" id="st4" @if ($incident->status == 'pending')
                                            checked 
                                        @endif> <label for="st4">Pending</label>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6 style="width: 100%; text-align: center;">Final</h6>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('incidents.index') }}" class="btn btn-round btn-info" style="min-width: 200px;">Discard</a>
                            <button type="submit" class="btn btn-round btn-success" style="min-width: 200px;">Update Incident</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="panel-title">  Incident Operations</h4>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('incidents.index') }}" class="btn btn-primary btn-rounded btn-block" style="margin: 10px;"> Back </a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('incidents.destroy', $incident->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="tools" style="margin: 10px;">
                                            <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                                onclick="return confirm('You are about to delete this incident!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <hr>
                        </div>
                        <div class="col-md-12">
                            <h5 class="card-title">Comments Update</h5>
                            <div class="row" style="height: 350px; overflow-y: auto;">
                                <?php $i=0; ?>
                                @foreach($incident->comments as $comm)
                                    <div class="panel">
                                        <div class="panel-body" style="border: thin solid #e5e5e5;">
                                            <div class="col-md-12">
                                                <form action="{{ route('comments.update', ['incident',$incident->id,$comm->id]) }}" method="POST">
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
                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                            <input type="text" name="comment" value="{{ $comm->comment }}" class="form-control">
                                                        </div>
                                                        <input type="hidden" name="responder" value="{{ $comm->responder }}">
                                                        <input type="hidden" name="router" value="incidents.edit">
                                                        <div class="col-md-6 form-group">
                                                            <select class="custom-select form-control" name="status">
                                                                <option value="Approved">Approved</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Under Consideration">Under Consideration</option>
                                                                <option value="Rejected">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <a href="{{ route('comments.edit', ['incident',$incident->id,$comm->id]) }}" class="label label-info btn-xs btn-rounded">Detailed Edit</a>
                                                            <button type="submit" class="btn btn-primary btn-xs btn-round" style="min-width: 100px;">Update Comment</button>
                                                            @if($comm->status == 'Approved')
                                                                <span class="label label-success btn-xs btn-rounded">{{ $comm->status }}</span>
                                                            @elseif($comm->status == 'Pending')
                                                                <span class="label label-primary btn-xs btn-rounded">{{ $comm->status }}</span>
                                                            @elseif($comm->status == 'Rejected')
                                                                <span class="label label-danger btn-xs btn-rounded">{{ $comm->status }}</span>
                                                            @else
                                                                <span class="label label-warning btn-xs btn-rounded">{{ $comm->status }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                                <form method="POST" action="{{ route('comments.destroy', ['incident',$incident->id,$comm->id]) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="col-md-12 form-control" style="border: none;">
                                                        <input type="hidden" name="router" value="incidents.edit">
                                                        <input type="hidden" name="item_val" value="{{ $incident->id }}">
                                                        <button type="submit" class="btn btn-danger btn-round btn-xs" onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile" style="min-width: 150px;"> Delete Comment</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- {{ ++$i }} -->
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
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
        var x = document.getElementById("demo");

        function getLocation() {
          if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(showPosition); } 
          else { x.innerHTML = "Geolocation is not supported by this browser."; }
        }

        function showPosition(position) {
          x.innerHTML = position.coords.latitude + ' ' + position.coords.longitude;
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDm092t3Kz-SgMCDPib5_cD2GNBnHYnnus"></script>
@endsection