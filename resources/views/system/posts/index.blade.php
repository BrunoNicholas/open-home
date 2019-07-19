@extends('layouts.site')
@section('title') Posts @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Posts | {{ config('app.name') }} </h3>
	        <p>See the on going and other projects! <a href="{{ route('posts.create') }}" class="btn btn-xs btn-warning btn-round"><i class="fa fa-plus"></i> Add New</a> </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('settings') }}"> <i class="fa fa-gear"></i> User</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}"> <i class="fa fa-list"></i> Projects </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Posts </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
@include('layouts.includes.notifications')
<!-- /end of the page description section -->
<div class="col-md-12" style="padding:10px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-9 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <ul class="list-unstyled m-t-40" style="overflow-y: auto; max-height: 460px;">
                        <?php $i=0; ?>
                        @role(['user','guest'])
                            @if(sizeof(App\Models\Post::where('status', 'NOT', 'Approved')->get()) < 1)
                                <li class="media"> No Posts Found! </li>
                            @endif
                        @endrole
                        @if(sizeof($posts) < 1)
                            <p class="alert alert-danger">No posts found!</p>
                        @endif
                        @foreach($posts as $question)
                            @if($question->status == 'Approved' || $question->uploaded_by == Auth::user()->id)
                                <a href="{{ route('posts.show', $question->id) }}">
                                    <li class="media">
                                        <div class="row">
                                            <div class="col-md-2 text-center">
                                                <img class="m-r-15" src="{{ asset('files/profile/images/' . (App\User::where('id',$question->uploaded_by)->get()->first())->profile_image) }}" width="60" alt="User Image" style="border-radius: 50%;">
                                                <h5 class="mt-0 mb-1">{{ (App\User::where('id',$question->uploaded_by)->get()->first())->name }} @if($question->topic) - {{ $question->topic }} @endif</h5> 
                                            </div>
                                            <div class="col-md-10">
                                                <div class="media-body">
                                                    {{ $question->description }} <br>
                                                    <i class="text-info">{{ $question->created_at }}</i>
                                                    @if($question->uploaded_by == Auth::user()->id)
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
                                                    <a href="{{ route('posts.show', $question->id) }}" class="btn btn-xs btn-primary"> {{ $question->comments->count() }} Comments</a>
                                                    @role(['super-admin','admin','editor'])
                                                        <a href="{{ route('posts.edit', $question->id) }}" class="btn btn-xs btn-warning">Edit Post</a>
                                                    @endrole
                                                    <!-- <a href="{{ route('comments.create', ['question',$question->id]) }}" class="btn btn-xs btn-info disabled">Add Comment</a> -->
                                                    @role(['super-admin','admin','editor'])
                                                        @if($question->comments->where('status','Pending')->count()) - <span class="label label-info label-lg label-rounded">{{ $question->comments->where('status','Pending')->count() }} Pending Comments</span>@endif
                                                    @endrole
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <hr>
                            @endif
                            @role(['super-admin','admin','editor'])
                                @if($question->status != 'Approved' && $question->uploaded_by != Auth::user()->id)
                                    <a href="{{ route('posts.show', $question->id) }}">
                                        <li class="media">
                                            <div class="row">
                                                <div class="col-md-2 text-center">
                                                    <img class="m-r-15" src="{{ asset('files/profile/images/' . (App\User::where('id',$question->uploaded_by)->get()->first())->profile_image) }}" width="60" alt="User Image" style="border-radius: 50%;">
                                                    <h5 class="mt-0 mb-1">{{ (App\User::where('id',$question->uploaded_by)->get()->first())->name }} @if($question->topic) - {{ $question->topic }} @endif</h5> 
                                                </div>
                                                <div class="col-md-10">
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
                                                    @if($question->response ) <b>Response</b>: 
                                                    <textarea class="form-control" disabled style="background-color:#fff; max-height:400px; overflow-y:auto;">{{ $question->response }}</textarea>
                                                        <br>
                                                        <i>~ {{ (App\User::where('id',$question->responder)->get()->first())->name }} ({{ (App\Models\Role::where('name',(App\User::where('id',$question->responder)->get()->first())->role)->get()->first())->display_name }}) - {{ $question->updated_at }}</i> 
                                                        <br>
                                                        <br>
                                                    @endif
                                                    <a href="{{ route('posts.show', $question->id) }}" class="btn btn-xs btn-primary"> {{ $question->comments->count() }} Comments</a>
                                                    @role(['super-admin','admin','patron','chaiperson','cu-leader','editor'])
                                                        <a href="{{ route('posts.edit', $question->id) }}" class="btn btn-xs btn-warning">Edit Post</a>
                                                    @endrole
                                                    <!-- <a href="{{ route('comments.create', ['question',$question->id]) }}" class="btn btn-xs btn-info disabled">Add Comment</a> -->
                                                    @if($question->comments->where('status','Pending')->count()) - <span class="label label-info label-rounded">{{ $question->comments->where('status','Pending')->count() }} Pending Comments</span>@endif
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                    <hr>
                                @endif
                            @endrole
                            <!-- {{ ++$i }} -->
                        @endforeach
                    </ul>
                    <!-- {{--
                    <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0" style="border: thin solid;">
                            <thead>

                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($posts as $postit)
                                    <tr>
                                        <td style="min-width: 50px;">{{ ++$i }} <a href="{{ route('posts.edit',$postit->id) }}" title="Edit Post"><i class="fa-edit fa"></i></a></td>
                                        <td title="View post details"><a href="{{ route('posts.show', $postit->id) }}"> {{ $postit->title }} </a></td>
                                        <td title="View post details"><a href="{{ route('posts.show', $postit->id) }}"> @if(strlen($postit->description) > 40) {{ substr($postit->description, 0,40) . '...' }} @else {{ $postit->description }} @endif </a> </td>
                                        <td>@if($postit->references) @if(strlen($postit->references) > 40) {{ substr($postit->references, 0,40) . '...' }} @else {{ $postit->references }} @endif @endif</td>
                                        <td>@if($postit->post_date) {{ $postit->post_date }} @endif</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection