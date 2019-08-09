@extends('layouts.site')
@section('title') Edit User @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Edit User Profile | {{ config('app.name') }} </h3>
	        <p> Edit {{ $user->name }}'s account profile! ( {{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }} )</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> <i class="fa fa-users"></i> System Users </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user"></i> Edit User Profile </li>
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
                <div class="panel-body padding">
                    <h4 class="card-title">Add New User Profile | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="tab-wizard wizard-circle">
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
                        <h6>Personal Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Full Names <span class="text-danger">*</span> :</label>
                                        <input type="text" name="name"  value="{{ $user->name }}" class="form-control" id="Names" autofocus required> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Email Address <span class="text-danger">*</span> :</label>
                                        <input type="email" name="email"  value="{{ $user->email }}" class="form-control" id="emailAddress1" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Phone Number :</label>
                                        <input type="tel" name="telephone" value="{{ $user->telephone }}" class="form-control" id="phoneNumber1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender1">Select Gender :</label>
                                        <select class="custom-select form-control" id="gender1" name="gender">
                                            <option value="{{ $user->gender }}">Select to change gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date1">Date of Birth :</label>
                                        <input type="date" class="form-control" value="{{ $user->date_of_birth }}" name="date_of_birth" id="date1"> 
                                    </div>
                                </div>
                            </div>
                        </section>
                        <input type="hidden" name="password" value="{{ bcrypt('dollar') }}">
                        <!-- Step 2 -->
                        <h6>System Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jobTitle1">Occupation :</label>
                                        <input type="text" name="occupation" value="{{ $user->occupation }}" class="form-control" id="jobTitle1"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location1s">Location :</label>
                                        <input type="text" name="location" value="{{ $user->location }}" class="form-control" id="location1s"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality1">Nationality :</label>
                                        <input type="text" name="nationality" value="{{ $user->nationality }}" class="form-control" id="nationality1"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location5">Marriage Status :</label>
                                        <select name="maritual_status" class="form-control" id="location5">
                                            <option value="{{ $user->maritual_status }}">Select marital status</option>
                                            <option value="Sinage">Sinage</option>
                                            <option value="Courting">Courting</option>
                                            <option value="Married">Married</option>
                                            <option value="Devorced">Devorced</option>
                                            <option value="Confidential">Confidential</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6>Final Step</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="decisions1">User Bio</label>
                                        <textarea name="bio" id="decisions1" name="bio" rows="4" class="form-control">{{ $user->bio }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Account Status :</label>
                                        <div class="c-inputs-stacked">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio1" name="status" value="Active" class="custom-control-input" @if ($user->status == "Active")
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio1">Active </label>

                                                <input type="radio" id="customRadio2" name="status" value="Busy" class="custom-control-input" @if ($user->status == "Busy")
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio2">Busy</label>

                                                <input type="radio" id="customRadio3" name="status" value="Inactive" class="custom-control-input" @if ($user->status == "Inactive")
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio3">Inactive</label>

                                                <input type="radio" id="customRadio4" name="status" value="Blocked" class="custom-control-input" @if ($user->status == "Blocked")
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio4">Blocked</label>

                                                <input type="radio" id="customRadio5" name="status" value="Away" class="custom-control-input" @if ($user->status == "Away")
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio5">Away</label>

                                                <input type="radio" id="customRadio6" name="status" value="Pending" class="custom-control-input" @if ($user->status == "Pending")
                                                    checked 
                                                @endif>
                                                <label class="custom-control-label" for="customRadio6">Pending</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role1">System Role :</label>
                                        <select class="custom-select form-control" id="role1" name="role" required>
                                            <option value="{{ $user->role }}">Select to change system privilege</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" title="{{ $role->description }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-rounded btn-info"><i class="fa fa-user"></i> Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection