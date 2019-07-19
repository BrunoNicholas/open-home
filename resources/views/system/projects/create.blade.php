@extends('layouts.site')
@section('title') Add New Projects @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Add New Projects | {{ config('app.name') }} </h3>
	        <p>Create and add new project to {{ config('app.name') }}!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}"> <i class="fa fa-tree"></i> Departments</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}"> <i class="fa fa-box"></i> Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> New Projects </li>
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
        <div class="col-md-9 padding">
            <div class="panel box-v4">
                <div class="panel-body">
                    <form action="{{ route('projects.store') }}" enctype="multipart/form-data" method="POST" class="tab-wizard wizard-circle">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                                
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- Step 1 -->
                        <h6 class="text-center" style="width: 100%;">Category Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Names">Project Name :</label>
                                        <input type="text" name="name" class="form-control" id="Names" placeholder="Fellowship Project Name" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Add Image :</label>
                                        <input type="file" id="image" class="form-control" name="description_image" accept=".jpg, .png, .jpeg">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start-date">Start Date :</label>
                                        <input type="date" value="{{ date('Y-m-d') }}" class="custom-input form-control" id="start-date" name="start_date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end-date">End Date :</label>
                                        <input type="date" class="custom-input form-control" id="end-date" name="end_date">
                                    </div>
                                </div>
                                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Project Description :</label>
                                        <textarea name="description" placeholder="Project description here!" class="form-control" id="desc"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="period">Estimated Period :</label>
                                            <input name="estimated_period" placeholder="Estimated period of action!" class="form-control" id="period">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="depts">Department in Charge :</label>
                                            <select name="department" class="custom-select form-control" id="depts">
                                                <option value="1">Select Department</option>
                                                @foreach($departments as $depart)
                                                    <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Project Status :</label>
                                        <input type="radio" name="status" value="Approved"> Approved
                                        <input type="radio" name="status" value="Pending" checked> Pending
                                        <input type="radio" name="status" value="Active"> Active
                                        <input type="radio" name="status" value="Done"> Done
                                    </div>
                                </div>
                            </div>

                        </section>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('projects.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                            <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Add Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection