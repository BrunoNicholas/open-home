@extends('layouts.site')
@section('title') Edit Projects @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Edit Projects | {{ config('app.name') }} </h3>
	        <p>Update {{ config('app.name') }} system project!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}"> <i class="fa fa-tree"></i> Departments</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}"> <i class="fa fa-box"></i> Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Projects </li>
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
                    <form action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" method="POST" class="tab-wizard wizard-circle">
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
                        <!-- Step 1 -->
                        <br>
                        <h6 class="text-center">Category Info</h6>
                        <br>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Names">Project Name : </label>
                                        <input type="text" name="name" class="form-control" id="Names" placeholder="Fellowship Project Name" autofocus required value="{{ $project->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Add Image : </label>
                                        <input type="file" id="image" class="form-control" name="description_image" accept=".jpg, .png, .jpeg">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="created_by" value="{{ $project->created_by }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start-date">Start Date : </label>
                                        <input type="date" class="custom-input form-control" id="start-date" name="start_date" required value="{{ $project->start_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end-date">End Date :</label>
                                        <input type="date" class="custom-input form-control" id="end-date" name="end_date" value="{{ $project->end_date }}">
                                    </div>
                                </div>
                                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Project Description :</label>
                                        <textarea name="description" placeholder="Project description here!" class="form-control" id="desc">{{ $project->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="period">Estimated Period :</label>
                                            <input name="estimated_period" placeholder="Estimated period of action!" class="form-control" id="period" value="{{ $project->estimated_period }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="depts">Department in Charge :</label>
                                            <select name="department" class="custom-select form-control" id="depts">
                                                <option value="{{ $project->department }}">Select Department</option>
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
                                        <input type="radio" name="status" value="Approved" 
                                        @if ($project->status == 'Approved')
                                            checked 
                                        @endif> Approved
                                        <input type="radio" name="status" value="Pending" 
                                        @if ($project->status == 'Pending')
                                            checked 
                                        @endif> Pending
                                        <input type="radio" name="status" value="Active" 
                                        @if ($project->status == 'Active')
                                            checked 
                                        @endif> Active
                                        <input type="radio" name="status" value="Done" 
                                        @if ($project->status == 'Done')
                                            checked 
                                        @endif> Done
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('projects.index') }}" class="btn btn-rounded btn-success" style="min-width: 150px;">Back</a>
                            <button type="submit" class="btn btn-rounded btn-info" style="min-width: 150px;">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection