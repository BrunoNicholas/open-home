@extends('layouts.site')
@section('title') Administrator @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Administrator Page | {{ config('app.name') }} </h3>
	        <p> Manage all users, roles and operations on the system! </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user-plus"></i> Administrator </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>

<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-9 padding-0">
            <div class="panel box-v4">
                <div class="panel-body padding-0">
                    <!-- <h4 class="card-title m-b-40">User Management And Administration</h4> -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active"> 
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true">
                                <span class="hidden-sm-up"><i class="fa fa-users"></i></span> 
                                <span class="hidden-xs-down">Users</span>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" id="roles-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="roles" aria-expanded="true">
                                <span class="hidden-sm-up"><i class="fa fa-gear"></i></span> 
                                <span class="hidden-xs-down">User Roles</span>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" id="accounts-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="accounts" aria-expanded="true">
                                <span class="hidden-sm-up"><i class="fa fa-tree"></i></span> 
                                <span class="hidden-xs-down">Departments</span>
                            </a> 
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="hidden-sm-up"><i class="fa fa-list"></i></span> 
                                <span class="hidden-xs-down"> ... </span>
                            </a>
                            <div class="dropdown-menu" style="padding: 5px;">
                                <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">
                                    ...
                                </a>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade in active" id="home5" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-success text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>User Names</th>
                                            <th>System Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <?php $i=0; ?> -->
                                    <tbody>
                                        @foreach($users as $user)
                                            @if($i < 5)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td> <img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 25px; border-radius: 40%;">  {{ $user->name }}</td>
                                                <td>{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}</td>
                                                <td class="text-center">
                                                    @if($user->status == 'Active')
                                                        <span class="btn-xs btn-rounded label label-success">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Away')
                                                        <span class="btn-xs btn-rounded label label-warning">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Busy')
                                                        <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Blocked')
                                                        <span class="btn-xs btn-rounded label label-primary">{{ $user->status }}</span>
                                                    @elseif($user->status == 'Inactive')
                                                        <span class="btn-xs btn-rounded label label-info">{{ $user->status }}</span>
                                                    @else
                                                        <span class="btn-xs btn-rounded label label-default">{{ $user->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" style="min-width: 150px;">
                                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-info" style="border-radius: 50%;" title="User Details"><i class="fa fa-info-circle"></i></a>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-primary" style="border-radius: 50%;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-block btn-success"> <i class="fa fa-users"></i> All Users </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-block btn-info"> <i class="fa fa-plus"></i> Add New </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="roles-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Role Name</th>
                                            <th>Display Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <?php $a=0; ?> -->
                                    <tbody>
                                        @foreach($roles as $role)
                                            @if($a < 5)
                                                <tr>
                                                    <td>{{ ++$a }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->display_name }}</td>
                                                    <td style="max-width: 150px;">{{ $role->description }}</td>
                                                    <td style="min-width: 150px;">
                                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-md text-info" title="Role Details"><i class="fa fa-info-circle"></i></a>
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-md text-primary"><i class="fa fa-edit" title="Edit Role Details"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-block btn-danger"> <i class="fa fa-lock"></i> All Users </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-block btn-primary"> <i class="fa fa-plus"></i> Add New </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <?php $p=0; ?> -->
                                    <tbody>
                                        @foreach($departments as $department)
                                            @if($p < 5)
                                                <tr>
                                                    <td class="text-center">{{ ++$p }}</td>
                                                    <td style="min-width: 150px;">{{ $department->name }}</td>
                                                    <td style="max-width: 160px;">{{ $department->description }}</td>
                                                    <td>
                                                        @if($department->status == 'Active')
                                                            <span class="btn-xs btn-rounded label label-success">{{ $department->status }}</span>
                                                        @elseif($department->status == 'Suspended')
                                                            <span class="btn-xs btn-rounded label label-warning">{{ $department->status }}</span>
                                                        @elseif($department->status == 'Blocked')
                                                            <span class="btn-xs btn-rounded label label-primary">{{ $department->status }}</span>
                                                        @elseif($department->status == 'Removed')
                                                            <span class="btn-xs btn-rounded label label-info">{{ $department->status }}</span>
                                                        @else
                                                            <span class="btn-xs btn-rounded label label-default">{{ $department->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="min-width: 150px;">
                                                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-md text-info" title="Role Details"><i class="fa fa-info-circle"></i></a>
                                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-md text-primary"><i class="fa fa-edit" title="Edit Role Details"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">
                            <p>More Activity</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection