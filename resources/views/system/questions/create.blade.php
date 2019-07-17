@extends('layouts.site')
@section('title') Ask Questions @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Ask A Question | {{ config('app.name') }} </h3>
	        <p> Ask a public or private question!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('questions.index') }}"> <i class="fa fa-question"></i> Questions </a></li> 
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Ask Question </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
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
                    <form action="{{ route('questions.store') }}" method="POST" class="tab-wizard wizard-circle">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <!-- Step 1 -->
                        <br>
                        <h6 class="text-center">Category Info</h6>
                        <br>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Question Topic :</label>
                                        <input type="text" name="topic" class="form-control" id="Names" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Project :</label>
                                        <select class="custom-select form-control" id="role1" name="project">
                                            <option value="">Specific Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}" title="{{ $project->description }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Department :</label>
                                        <select class="custom-select form-control" id="role1" name="department">
                                            <option value="">Reference A Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" title="{{ $department->description }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="asked_by" value="{{ Auth::user()->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Question Details :</label>
                                        <textarea name="description" placeholder="Question details here!" class="form-control" id="phoneNumber1" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('questions.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                            <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Add Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection