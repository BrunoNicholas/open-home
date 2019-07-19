@extends('layouts.site')
@section('title') Project Details @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> 
            @if($project->description_image)
                <img src="{{ asset('files/projects/images/'. $project->description_image) }}"  alt="project image" style="max-width: 30px; border-radius: 50%;">
            @else
                <img src="{{ asset('app/images/favicon.png') }}" alt="project image" style="max-width: 30px; border-radius: 50%;">
            @endif Project Details | {{ config('app.name') }} </h3>
	        <p>View {{ config('app.name') }} project details!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}"> <i class="fa fa-tree"></i> Departments</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}"> <i class="fa fa-box"></i> Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Project Details </li>
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
        <div class="col-md-8 padding">
            <div class="panel box-v4">
                <div class="panel-body">    
                    @if($project->name)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Project name : </label>
                        </div>
                        <div class="col-md-9">
                            {{ $project->name }}
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->department)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Department in charge : </label>
                        </div>
                        <div class="col-md-9">
                            {{ App\Models\Department::where('id',$project->department)->get()->first()->name }} | {{ config('app.name') }} Board
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->description)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Project description : </label>
                        </div>
                        <div class="col-md-9">
                            {{ $project->description }}
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->estimated_period)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Operationaltime : </label>
                        </div>
                        <div class="col-md-9">
                            {{ $project->estimated_period }}
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->start_date)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Starting date : </label>
                        </div>
                        <div class="col-md-9">
                            {{ $project->start_date }}
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->end_date)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Ending date : </label>
                        </div>
                        <div class="col-md-9">
                            {{ $project->end_date }}
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->created_by)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Created by : </label>
                        </div>
                        <div class="col-md-9">
                            {{ App\User::where('id',$project->created_by)->get()->first()->name . ' | ' . App\Models\Role::where('name',App\User::where('id',$project->created_by)->get()->first()->role)->get()->first()->display_name }}
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if($project->status)
                    <div class="row">
                        <div class="col-md-3">
                            <label> Project status : </label>
                        </div>
                        <div class="col-md-9">
                            {{ $project->status }}
                        </div>
                    </div>
                    @endif


                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="panel-title"> 
                        @if($project->description_image)
                            <img src="{{ asset('files/projects/images/'. $project->description_image) }}" style="max-width: 30px; border-radius: 50%;"> 
                        @else
                            <img src="{{ asset('app/images/favicon.png') }}" style="max-width: 30px; border-radius: 50%;">
                        @endif
                        Project Details | {{ config('app.name') }}
                    </h4>
                    <div class="row text-center">
                        <div class="col-md-12">
                            @if($project->description_image)
                                <img src="{{ asset('files/projects/images/'.$project->description_image) }}" alt="project image" style="border-radius: 3px;">
                            @else
                                <img src="{{ asset('app/images/favicon.png') }}" alt="project image" style="border-radius: 3px;">
                            @endif
                        </div>
                        @role(['super-admin','admin'])
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('projects.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="tools">
                                            <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                                onclick="return confirm('You are about to delete this project!\nThis is not reversible!')" title="This will delete this entire project"> Delete </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endrole
                        <hr>
                        <div class="col-md-12" style="margin-bottom: 5px;">
                            <div class="form-control">
                                Created By: <a href="{{ route('users.show',$project->created_by) }}"> {{ App\User::where('id',$project->created_by)->get()->first()->name }} </a>
                            </div>
                        </div>
                        <hr>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info btn-sm btn-rounded btn-block">Edit Project</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('projects.index') }}" class="btn btn-success btn-sm btn-rounded btn-block">Back</a>
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