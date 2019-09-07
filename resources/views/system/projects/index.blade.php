@extends('layouts.site')
@section('title') Projects @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Projects | {{ config('app.name') }} </h3>
	        <p>See the on going and other projects! @role(['super-admin','admin'])<a href="{{ route('projects.create') }}" class="label label-warning btn-round"> <i class="fa-plus fa"></i> New Project </a> @endrole</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}"> <i class="fa fa-tree"></i> Departments</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Projects </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
@include('layouts.includes.notifications')
<!-- /end of the page description section -->
<div class="col-md-12" style="padding:10px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-9 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <div class="row">
                        @if(sizeof($projects) < 1)
                            <p class="alert alert-danger">No project found!</p>
                        @endif
                        @foreach($projects as $project)
                            <div class="col-md-4">
                                <a href="{{ route('projects.show', $project->id) }}">
                                    <div class="panel  panel-hover">
                                        @if($project->description_image)
                                            <img class="panel-img-top img-responsive" src="{{ asset('files/projects/images/' . $project->description_image) }}" alt="Card image cap" style="height: 200px; width: auto;">
                                        @else
                                            <img class="panel-img-top img-responsive" src="{{ asset('asset/img/logomi.png') }}" alt="Card image cap" style="height: 200px; width: auto;">
                                        @endif
                                        <div class="panel-body">
                                            <div class="d-flex no-block align-items-center m-b-15">
                                                <span class="pull-left"><i class="ti-calendar"></i> {{ $project->start_date }} </span>
                                                <div class="ml-auto pull right">
                                                    <span><i class="ti-calendar"></i> {{ $project->end_date }} </span>
                                                </div>
                                            </div>
                                            <h3 class="font-normal text-center"> {{ $project->name }} </h3>
                                            <!-- <p class="m-b-0 m-t-10"> {{ $project->description }} </p> -->
                                            <button class="btn btn-success btn-round btn-xs waves-effect waves-light m-t-20 pull-left" style="margin: 1px;"> Details </button>
                                            <span class="label label-info label-round btn-xs waves-effect waves-light m-t-20 pull-left" style="margin: 1px;"> {{ $project->status }} </span>
                                            @role(['super-admin','admin','patron','chaiperson'])
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                     <button class="btn btn-danger btn-xs btn-round waves-effect waves-light m-t-20 pull-right" onclick="return confirm('Are you sure you want to delete this project?')" style="margin: 1px;"> Delete </button>
                                                </form>
                                            @endrole
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection