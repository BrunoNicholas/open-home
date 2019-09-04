@extends('layouts.site')
@section('title') Departments @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/datatables.bootstrap.min.css') }}"/>
@endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	    <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Departments | {{ config('app.name') }} </h3>
	        <p> Here are different departments under {{ config('app.name') }}! @role(['super-admin','admin']) <a href="{{ route('departments.create') }}" class="label label-primary label-xs btn-round"> <i class="fa-plus fa"></i> Add New </a> @endrole </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-tree"></i> Departments </li>
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
        <div class="col-md-12 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="datatables-example" class="table table-striped table-bordered display">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Main Department</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                           <!-- <tfoot>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Main Department</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <!-- <?php $i=0; ?> -->
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            @if($department->parent_department)
                                                {{ (App\Models\Department::where('id',$department->parent_department)->get()->first())->name }}
                                            @else
                                                <i class="text-info">No Parent</i>
                                            @endif
                                        </td>
                                        <td style="max-width: 150px;">{{ $department->description }}</td>
                                        <td>{{ (App\User::where('id',$department->created_by)->get()->first())->name }}</td>
                                        <td class="text-center">
                                            @if($department->status == 'Active')
                                                <span class="btn-xs btn-round label label-success">{{ $department->status }}</span>
                                            @elseif($department->status == 'Suspended')
                                                <span class="btn-xs btn-round label label-warning">{{ $department->status }}</span>
                                            @elseif($department->status == 'Blocked')
                                                <span class="btn-xs btn-round label label-primary">{{ $department->status }}</span>
                                            @elseif($department->status == 'Removed')
                                                <span class="btn-xs btn-round label label-info">{{ $department->status }}</span>
                                            @else
                                                <span class="btn-xs btn-round label label-default">{{ $department->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-xs btn-info" title="Department Details"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit" title="Edit Department Details"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('asset/js/plugins/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/datatables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datatables-example').DataTable();
        });
    </script>
@endsection
