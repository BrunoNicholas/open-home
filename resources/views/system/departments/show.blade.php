@extends('layouts.site')
@section('title') View Department Details @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	    <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> View Department Details | {{ config('app.name') }} </h3>
	        <p> View the details of a system department! </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}"> <i class="fa fa-tree"></i> Departments </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-lock"></i> View Department Details </li>
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
        <div class="col-md-8 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Attribute</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Relevance</th>
                                </tr>
                            </thead>
                            <?php $i=0; ?>
                            <tbody>
                                @if($department->name)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Department Names</td>
                                        <td>{{ $department->name }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($department->parent_department)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Parent Department</td>
                                        <td>{{ $department->parent_department }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($department->description)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Description</td>
                                        <td style="max-width: 150px;">{{ $department->description }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($department->created_by)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Author</td>
                                        <td>{{ (App\User::where('id',$department->created_by)->get()->first())->name }}</td>
                                        <td>Required for accountability</td>
                                    </tr>
                                @endif
                                @if($department->status)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Status</td>
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
                                        <td>Required for validity</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 padding-0 text-center">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="panel-title">  Department Operations</h4>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <a href="{{ route('departments.index') }}" class="btn btn-primary btn-rounded btn-block" style=""> Back </a>
                        </div>
                        @role(['super-admin','admin'])
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('departments.destroy', $department->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="tools">
                                    <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                        @if(Auth::user()->role != 'super-admin') disabled @endif onclick="return confirm('You are about to delete this department!\nThis is not reversible!')"> Delete </button>
                                </div>
                            </form>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection