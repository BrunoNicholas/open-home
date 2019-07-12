@extends('layouts.site')
@section('title') System Users @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/datatables.bootstrap.min.css') }}"/>
@endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> System Users | {{ config('app.name') }} </h3>
	        <p> Manage all system users! <a href="{{ route('users.create') }}" class="btn btn-xs btn-info btn rounded" title="Add New User"><i class="fa-user-plus fa"></i></a> </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-users"></i> System Users </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
<!-- /end of description section -->
<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-12 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Privillege</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-md text-info" title="User Details"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-md text-primary"><i class="fa fa-edit" title="Edit User Profile"></i></a>
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