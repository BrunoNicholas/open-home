@extends('layouts.site')
@section('title') Questions @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Questions | {{ config('app.name') }} </h3>
	        <p> Public &amp; private asked questions! <a href="{{ route('questions.create') }}" class="label label-info label-sm btn-round"> <i class="fa-plus fa"></i> Ask Question </a></p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-question"></i> Questions </li>
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
        <div class="col-md-9 padding">
            <div class="panel box-v4">
                <div class="panel-body">
                    <ul class="list-unstyled m-t-40" style="overflow-y: auto; max-height: 450px;">
                        <?php $i=0; ?>
                        @role(['user','guest'])
                            @if(sizeof(App\Models\Question::where('status', 'NOT', 'Approved')->get()) < 1)
                                <li class="media"> No Questions Found! </li>
                            @endif
                        @endrole
                        @if(sizeof($questions) < 1)
                            <p class="alert alert-danger">No questions found!</p>
                        @endif
                        @foreach($questions as $question)
                            @if($question->status == 'Approved' || $question->asked_by == Auth::user()->id)
                                <a href="{{ route('questions.show', $question->id) }}">
                                    <li class="media">
                                        <img class="m-r-15" src="{{ asset('files/profile/images/' . (App\User::where('id',$question->asked_by)->get()->first())->profile_image) }}" width="60" alt="User Image" style="border-radius: 50%;">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">{{ (App\User::where('id',$question->asked_by)->get()->first())->name }} @if($question->topic) - {{ $question->topic }} @endif</h5> 

                                            {{ $question->description }} <br>
                                            <i class="text-info">{{ $question->created_at }}</i>
                                            @if($question->asked_by == Auth::user()->id)
                                                @if($question->status == 'Approved')
                                                    <span class="label label-success btn-xs btn-rounded">{{ $question->status }}</span>
                                                @elseif($question->status == 'Pending')
                                                    <span class="label label-primary btn-xs btn-rounded">{{ $question->status }}</span>
                                                @elseif($question->status == 'Rejected')
                                                    <span class="label label-danger btn-xs btn-rounded">{{ $question->status }}</span>
                                                @else
                                                    <span class="label label-warning btn-xs btn-rounded">{{ $question->status }}</span>
                                                @endif
                                            @else
                                                @role(['super-admin','admin']) - 
                                                    @if($question->status == 'Approved')
                                                        <span class="label label-success btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @elseif($question->status == 'Pending')
                                                        <span class="label label-primary btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @elseif($question->status == 'Rejected')
                                                        <span class="label label-danger btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @else
                                                        <span class="label label-warning btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @endif 
                                                @endrole
                                            @endif
                                            <hr>
                                            @if($question->response ) <b>Response</b>: <textarea class="form-control" disabled style="background-color:#fff; max-height:400px; overflow-y:auto;">{{ $question->response }}</textarea> 
                                                <br>
                                                <i>~ {{ (App\User::where('id',$question->responder)->get()->first())->name }} ({{ (App\Models\Role::where('name',(App\User::where('id',$question->responder)->get()->first())->role)->get()->first())->display_name }}) - {{ $question->updated_at }}</i> 
                                                <br>
                                                <br>
                                            @endif
                                            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-xs btn-primary"> {{ $question->comments->count() }} Comments</a>
                                            @role(['super-admin','admin','patron','chaiperson','cu-leader','editor'])
                                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-xs btn-warning">Edit Question</a>
                                            @endrole
                                            <!-- <a href="{{ route('comments.create', ['question',$question->id]) }}" class="btn btn-xs btn-info disabled">Add Comment</a> -->
                                            @role(['super-admin','admin','patron','chaiperson','cu-leader','editor'])  -
                                                <span class="label label-info label-lg label-rounded">{{ $question->comments->where('status','Pending')->count() }} Pending Comments</span>
                                            @endrole
                                        </div>
                                    </li>
                                </a>
                                <hr>
                            @endif
                            @role(['super-admin','admin','patron','chaiperson','cu-leader','editor'])
                                @if($question->status != 'Approved' && $question->asked_by != Auth::user()->id)
                                    <a href="{{ route('questions.show', $question->id) }}">
                                        <li class="media">
                                            <img class="m-r-15" src="{{ asset('files/profile/images/' . (App\User::where('id',$question->asked_by)->get()->first())->profile_image) }}" width="60" alt="User Image" style="border-radius: 50%;">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">
                                                    {{ (App\User::where('id',$question->asked_by)->get()->first())->name }} @if($question->topic) - {{ $question->topic }} @endif
                                                </h5> 

                                                {{ $question->description }}
                                                <br>
                                                <i class="text-info">{{ $question->created_at }}</i>
                                                @role(['super-admin','admin','patron','chaiperson','cu-leader','editor'])  - 
                                                    @if($question->status == 'Approved')
                                                        <span class="label label-success btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @elseif($question->status == 'Pending')
                                                        <span class="label label-primary btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @elseif($question->status == 'Rejected')
                                                        <span class="label label-danger btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @else
                                                        <span class="label label-warning btn-xs btn-rounded">{{ $question->status }}</span>
                                                    @endif
                                                @endrole
                                                <hr>
                                                @if($question->response ) <b>Response</b>: <textarea class="form-control" disabled style="background-color:#fff; max-height:400px; overflow-y:auto;">{{ $question->response }}</textarea>
                                                    <br>
                                                    <i>~ {{ (App\User::where('id',$question->responder)->get()->first())->name }} ({{ (App\Models\Role::where('name',(App\User::where('id',$question->responder)->get()->first())->role)->get()->first())->display_name }}) - {{ $question->updated_at }}</i> 
                                                    <br>
                                                    <br>
                                                @endif
                                                <a href="{{ route('questions.show', $question->id) }}" class="btn btn-xs btn-primary"> {{ $question->comments->count() }} Comments</a>
                                                @role(['super-admin','admin','patron','chaiperson','cu-leader','editor'])
                                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-xs btn-warning">Edit Question</a>
                                                @endrole
                                                <!-- <a href="{{ route('comments.create', ['question',$question->id]) }}" class="btn btn-xs btn-info disabled">Add Comment</a> -->
                                                <span class="label label-info label-rounded">{{ $question->comments->where('status','Pending')->count() }} Pending Comments</span>
                                            </div>
                                        </li>
                                    </a>
                                    <hr>
                                @endif
                            @endrole
                            <!-- {{ ++$i }} -->
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="m-b-20">Ask A Fast Question</h4>
                    <form method="POST" action="{{ route('questions.store') }}">
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
                        <div class="row">
                            <div class="col-md-12">
                                <textarea id="mymce" class="form-control" name="description" placeholder="Your Question Here!" autofocus required></textarea>
                            </div>
                            <input type="hidden" name="asked_by" value="{{ Auth::user()->id }}">
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-12">
                                <button type="submit" class="m-t-20 btn waves-effect waves-light btn-success">Submit Question</button>
                                <a href="{{ route('questions.create') }}" class="m-t-20 btn waves-effect waves-light btn-info">Add Detailed</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection