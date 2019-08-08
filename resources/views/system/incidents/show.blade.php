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
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-list"></i> Incident Details </li>
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
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Attribute</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Relevance</th>
                                </tr>
                            </thead>
                            <?php $i=0; ?>
                            <tbody>
                                @if($incident->title)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Incident Title</td>
                                        <td>{{ $incident->title }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($incident->category)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Crime category</td>
                                        <td>{{ $incident->category }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($incident->description)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Crime description</td>
                                        <td>{{ $incident->description }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($incident->user_id)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Uploaded By</td>
                                        <td>{{ App\User::where('id',$incident->user_id)->first()->name }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($incident->location)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Captured location (Cordinates)</td>
                                        <td>{{ $incident->location }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($incident->attachement)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Crime file</td>
                                        <td>{{ $incident->attachement }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($incident->status)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>Status</td>
                                        <td>{{ $incident->status }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="card-title text-center"> Operations | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="row text-center">
                        <hr>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('incidents.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('incidents.destroy', $incident->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                            onclick="return confirm('You are about to delete this incident!\nThis is not reversible!')" title="Delete incident completely"> Delete </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')  @endsection