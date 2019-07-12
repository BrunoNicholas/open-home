@extends('layouts.site')
@section('title') Add Role @endsection
@section('styles') @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Add Role | {{ config('app.name') }} </h3>
	        <p> Add a new user role or privilege </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> <i class="fa fa-user-plus"></i> User Roles </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Add Role </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
@include('layouts.includes.notifications')
<!-- /end of description section -->
<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-8 padding-0">
            <div class="panel box-v4">
                <div class="panel-body padding">
                    <h4 class="card-title">Add New Role | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    <form action="{{ route('roles.store') }}" method="POST" class="tab-wizard wizard-circle">
                        
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
                        <hr>
                        <h6 class="text-center" style="text-transform: uppercase;">Required Information</h6>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Names">Database Name <span class="text-danger">*</span> :</label>
                                        <input type="text" name="name" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="display">Display Name :</label>
                                        <input type="text" name="display_name" class="form-control" id="display" placeholder="Role display name"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="display">Description :</label>
                                        <textarea name="description" class="form-control" id="display" placeholder="Role description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="display">Attach Permissions :</label>
                                        <div class="row">
                                            <div class="col-md-4"> </div>
                                            <div class="col-md-8" style="max-height: 300px; overflow-y: auto;">
                                                @foreach($permissions as $permission)
                                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permckbx"> <label for="permckbx">{{ $permission->display_name }} </label> <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-success">Add User Role</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection