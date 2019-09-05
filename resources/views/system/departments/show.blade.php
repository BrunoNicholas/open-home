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
        <div class="row" style="margin: 1%;">
            <div class="col-md-8">
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
            <div class="col-md-4 text-center">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="panel-title">  Department Operations <br> <small><span>{{ $department->references->count() }} References</span></small></h4>
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
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block" onclick="return confirm('You are about to delete this department!\nThis is not reversible!')"> Delete </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12" style="padding: 5%;">
                                <button type="button" class="btn btn-info btn-round btn-block" data-toggle="modal" data-target="#exampleModal">Add Reference</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('references.store',$department->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Add Reference to the {{ $department->name }} 
                                                        <button type="button" class="close float-right pull-right" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row text-left">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Reference Topic</label>
                                                                <input type="text" name="topic" placeholder="Enter the topic of this reference" class="form-control" required autofocus>
                                                            </div>
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="department_id" value="{{ $department->id }}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Add item (Link to visuals, websites and more)</label>
                                                                <input type="text" name="item" placeholder="Enter the link to necessary information" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Upload Content</label>
                                                                <input type="file" name="attachment" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Add item (Link to visuals, websites and more)</label>
                                                                <textarea name="description" placeholder="Enter the details for the description above" class="form-control"></textarea>
                                                            </div>
                                                            <input type="hidden" name="status" value="pending">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add Reference</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="panel-title">  Department Reference Information </h4>
                        <hr>
                        <div class="row text-center">
                            



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection