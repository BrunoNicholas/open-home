@extends('layouts.site')
@section('title') Update question Questions @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Update Question | {{ config('app.name') }} </h3>
	        <p> Update a question's details!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('questions.index') }}"> <i class="fa fa-question"></i> Questions </a></li> 
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Edit Question </li>
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
                    <form action="{{ route('questions.update', $question->id) }}" method="POST" class="tab-wizard wizard-circle">
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
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <!-- Step 1 -->
                        <br>
                        <h6 class="text-center">Category Info</h6>
                        <br>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Names">Question Topic :</label>
                                        <input type="text" name="topic" value="{{ $question->topic }}" class="form-control" id="Names" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Project :</label>
                                        <select class="custom-select form-control" id="role1" name="project" id="Project11">
                                            @if($question->project)<option value="{{ $question->project }}">{{ (App\Models\Project::where('id',$project->id)->get()->first())->name }}</option>@endif
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}" title="{{ $project->description }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailAddress1">Department :</label>
                                        <select class="custom-select form-control" id="role1" name="department" id="Department11">
                                            <option value="{{ $question->department }}">Reference A Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" title="{{ $department->description }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="asked_by" value="{{ Auth::user()->id }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Question Details :</label>
                                        <textarea name="description" placeholder="Question details here!" class="form-control" id="phoneNumber1">{{ $question->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Status11">Status :</label>
                                        <select class="custom-select form-control" id="role1" name="status" id="Status11">
                                            <option value="{{ $question->status }}">Select Status</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Under Consideration">Under Consideration</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <br>
                        <h6 class="text-center">Admin Section</h6>
                        <br>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="User">Admin Response :</label>
                                        <select class="custom-select form-control" id="role1" name="responder">
                                            <option value="{{ $question->responder }}">Change Responder</option>
                                            @foreach($users as $user)
                                                @if($user->role != 'user')
                                                <option value="{{ $user->id }}" title="{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}">{{ $user->name . ' - ' . (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="response1">Response :</label>
                                        <textarea name="response" placeholder="Question details here!" class="form-control" id="response1">{{ $question->response }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('questions.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                            <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Update Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="panel-title">  Question Operations</h4>
                    <div class="table-responsive">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('questions.index') }}" class="btn btn-primary btn-rounded btn-block" style="margin: 10px;"> Back </a>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @foreach ($errors->all() as $error)
                                                <p class="alert alert-danger">{{ $error }}</p>
                                            @endforeach

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <div class="tools" style="margin: 10px;">
                                                <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                                    onclick="return confirm('You are about to delete this question!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <hr>
                            </div>
                            <div class="col-md-12">
                                <h5 class="card-title">Comments Update</h5>
                                <div class="row" style="height: 350px; overflow-y: auto;">
                                    <?php $i=0; ?>
                                    @foreach($question->comments as $comm)
                                        <div class="panel">
                                            <div class="panel-body" style="border: thin solid #e5e5e5;">
                                                <div class="col-md-12">
                                                    <form action="{{ route('comments.update', ['question',$question->id,$comm->id]) }}" method="POST">
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
                                                        <div class="row">
                                                            <div class="col-md-6 form-group">
                                                                <input type="text" name="comment" value="{{ $comm->comment }}" class="form-control">
                                                            </div>
                                                            <input type="hidden" name="responder" value="{{ $comm->responder }}">
                                                            <input type="hidden" name="router" value="questions.edit">
                                                            <div class="col-md-6 form-group">
                                                                <select class="custom-select form-control" name="status">
                                                                    <option value="Approved">Approved</option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Under Consideration">Under Consideration</option>
                                                                    <option value="Rejected">Rejected</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <a href="{{ route('comments.edit', ['question',$question->id,$comm->id]) }}" class="label label-info btn-xs btn-rounded">Detailed Edit</a>
                                                                <button type="submit" class="btn btn-primary btn-xs btn-round" style="min-width: 100px;">Update Comment</button>
                                                                @if($comm->status == 'Approved')
                                                                    <span class="label label-success btn-xs btn-rounded">{{ $comm->status }}</span>
                                                                @elseif($comm->status == 'Pending')
                                                                    <span class="label label-primary btn-xs btn-rounded">{{ $comm->status }}</span>
                                                                @elseif($comm->status == 'Rejected')
                                                                    <span class="label label-danger btn-xs btn-rounded">{{ $comm->status }}</span>
                                                                @else
                                                                    <span class="label label-warning btn-xs btn-rounded">{{ $comm->status }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                    <form method="POST" action="{{ route('comments.destroy', ['question',$question->id,$comm->id]) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <div class="col-md-12 form-control" style="border: none;">
                                                            <input type="hidden" name="router" value="questions.edit">
                                                            <input type="hidden" name="item_val" value="{{ $question->id }}">
                                                            <button type="submit" class="btn btn-danger btn-round btn-xs" onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile" style="min-width: 150px;"> Delete Comment</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- {{ ++$i }} -->
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
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