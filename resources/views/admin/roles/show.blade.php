@extends('layouts.site')
@section('title') Role Details @endsection
@section('styles') @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Role Details | {{ config('app.name') }} </h3>
	        <p> View user role or privilege details </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> <i class="fa fa-user-plus"></i> User Roles </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Role Details </li>
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
        <div class="col-md-8">
            <div class="panel box-v4">
                <div class="panel-body padding">
                    <h4 class="card-title"> {{ $role->display_name }}'s Details | {{ config('app.name') }}</h4>
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
                                @if($role->name)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Database Names</td>
                                        <td class="text-danger">{{ $role->name }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($role->display_name)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Display Names</td>
                                        <td class="text-danger">{{ $role->display_name }}</td>
                                        <td>Required for display</td>
                                    </tr>
                                @endif
                                @if($role->description)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Description</td>
                                        <td class="text-danger">{{ $role->description }}</td>
                                        <td>Required for proper description</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel box-v4">
                <div class="panel-body ">
                    <h4 class="panel-title">  User Role Operations </h4>
                    <div class="table-responsive">
                        <div class="row text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-rounded btn-block" style="margin: 10px;"> Back </a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="tools" style="margin: 10px;">
                                            <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                                @if(Auth::user()->role != 'super-admin') disabled @endif onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection