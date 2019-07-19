@extends('layouts.site')
@section('title') Add Department @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Create Department | {{ config('app.name') }} </h3>
	        <p> Add new department to {{ config('app.name') }}</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}"> <i class="fa fa-tree"></i> Departments </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-lock"></i> Add Department </li>
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
                    <form action="{{ route('departments.store') }}" method="POST" class="tab-wizard wizard-circle">
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

                        <h6 style="width: 100%; text-align: center;">Required Information</h6>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Department Name <span class="text-danger">*</span> : </label>
                                        <input type="text" name="name" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department1">Main Department (Optional) <span class="text-danger">*</span> :</label>
                                        <select name="parent_department" class="custom-select form-control" id="department1">
                                            <option value="">Select Parent Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Status :</label>
                                        <select name="status" class="custom-select form-control" id="phoneNumber1" required>
                                            <option value="Active">Active</option>
                                            <option value="Suspended">Suspended</option>
                                            <option value="Blocked">Blocked</option>
                                            <option value="Removed">Removed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description11">Description :</label>
                                        <textarea class="form-control" name="description" placeholder="Department description details" id="description11"></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success">Submit Department</button>
                        </div>
                    </form>                    

                </div>
            </div>
        </div>
    </div>
</div>





@endsection