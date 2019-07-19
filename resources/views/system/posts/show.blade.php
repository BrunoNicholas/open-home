@extends('layouts.site')
@section('title') Post Details @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	    <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Post Details | {{ config('app.name') }} </h3>
	        <p>View the Post details!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('settings') }}"> <i class="fa fa-gear"></i> User</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}"> <i class="fa fa-list"></i> Projects </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}"> <i class="fa fa-home"></i> Posts </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Post Details </li>
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
        <div class="row">
            <div class="col-md-8">
                <div class="panel box-v4">
                    <div class="panel-body">
                        <h4 class="card-title"><img src="{{ asset('files/profile/images/' . (App\User::where('id',$post->uploaded_by)->get()->first())->profile_image ) }}" alt="user image" style="width: 60px; border-radius: 50%;">  {{ (App\User::where('id',$post->uploaded_by)->get()->first())->name }} - {{ $post->topic }}</h4> 
                        <b>Post: </b> {{ $post->description }} <br> <b class="text-primary">{{ $post->created_at }} @role(['super-admin','admin','patron','chaiperson','cu-leader','editor']) <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-info btn-rounded">Edit Post</a @endrole></b>
                        <br>
                        @if($post->committe)
                        <hr>
                            <b>Committee</b> : {{ $post->committe }}
                        @endif
                        @if($post->department)
                            <b>Department</b> : {{ (App\Models\Department::where('id',$post->department)->get()->first())->name }}
                        @endif
                        @if($post->project)
                            <br>
                            <b>Project</b> : {{ $post->project }}
                        @endif
                        @if($post->responder)
                        <hr>
                            <b>Reponded to by:</b> <i>{{ (App\User::where('id',$post->responder)->get()->first())->name . ' - ' . (App\Models\Role::where('name',(App\User::where('id',$post->responder)->get()->first())->role)->get()->first())->display_name }}</i> <br>
                        @endif
                        @if($post->response)
                            <b>Response: </b> <i>
                                <textarea class="form-control" disabled style="background-color:#fff; heght: 500px;" rows="20">{{ $post->response }}</textarea>
                            </i> <br>
                            <b>Date Replied: </b> <i>{{ $post->updated_at }}</i> 
                        @endif
                    </div>
                </div>
                <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="card-title">Post Comments</h4>
                    <ul class="list-unstyled m-t-40">
                        <?php $i=0; ?>
                        @foreach($post->comments as $comment)
                            @if($comment->status == 'Approved' || $comment->responder == Auth::user()->id)
                                @if($i != 0) <hr> @endif
                                <!-- {{ ++$i }} -->
                                <li class="media">
                                    <img class="m-r-15" @if($comment->responder) src="{{ asset('files/profile/images/' . (App\User::where('id',$comment->responder)->get()->first())->profile_image) }}" @else src="{{ asset('files/profile/images/profile.jpg') }}" @endif width="60" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">@if($comment->responder) {{ (App\User::where('id',$comment->responder)->get()->first())->name }} @else Anonymous @endif </h5> 
                                        {{ $comment->comment }} <br>
                                        {{ $comment->created_at }}
                                        @if($comment->responder == Auth::user()->id)
                                            @if($comment->status == 'Approved')
                                                <span class="label label-success btn-xs btn-rounded">{{ $comment->status }}</span>
                                            @elseif($comment->status == 'Pending')
                                                <span class="label label-primary btn-xs btn-rounded">{{ $comment->status }}</span>
                                            @elseif($comment->status == 'Rejected')
                                                <span class="label label-danger btn-xs btn-rounded">{{ $comment->status }}</span>
                                            @else
                                                <span class="label label-warning btn-xs btn-rounded">{{ $comment->status }}</span>
                                            @endif
                                        @else
                                            @role(['super-admin','admin']) - 
                                                @if($comment->status == 'Approved')
                                                    <span class="label label-success btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @elseif($comment->status == 'Pending')
                                                    <span class="label label-primary btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @elseif($comment->status == 'Rejected')
                                                    <span class="label label-danger btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @else
                                                    <span class="label label-warning btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @endif 
                                            @endrole
                                        @endif
                                    </div>
                                </li>                                
                            @endif
                            @role(['super-admin','admin'])
                                @if($comment->status != 'Approved' && $comment->responder != Auth::user()->id)
                                    @if($i != 0) <hr> @endif
                                    <!-- {{ ++$i }} -->
                                    <li class="media">
                                        <img class="m-r-15" @if($comment->responder) src="{{ asset('files/profile/images/' . (App\User::where('id',$comment->responder)->get()->first())->profile_image) }}" @else src="{{ asset('files/profile/images/profile.jpg') }}" @endif width="60" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">@if($comment->responder) {{ (App\User::where('id',$comment->responder)->get()->first())->name }} @else Anonymous @endif </h5> 
                                            {{ $comment->comment }} <br>
                                            {{ $comment->created_at }} 
                                            @role(['super-admin','admin']) - 
                                                @if($comment->status == 'Approved')
                                                    <span class="label label-success btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @elseif($comment->status == 'Pending')
                                                    <span class="label label-primary btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @elseif($comment->status == 'Rejected')
                                                    <span class="label label-danger btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @else
                                                    <span class="label label-warning btn-xs btn-rounded">{{ $comment->status }}</span>
                                                @endif 
                                            @endrole
                                        </div>
                                    </li>
                                @endif
                            @endrole
                        @endforeach
                        @if(sizeof($post->comments) < 1) No Comments Yet! @endif
                    </ul>
                </div>
            </div>
            <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="m-b-20">Add comment</h4>
                    <form method="post" action="{{ route('comments.store', ['post',$post->id]) }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="responder" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="router" value="posts.show">
                        <input type="hidden" name="status" value="Pending">
                        <textarea id="mymce" name="comment" class="form-control" autofocus required></textarea>
                        <button type="submit" class="m-t-20 btn waves-effect waves-light btn-success">Reply</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 padding">
            <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="card-title"> <img src="{{ asset('asset/img/logomi.png') }}" style="max-width: 30px; border-radius: 50%;"> User Profile Operations</h4>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ asset('asset/img/logomi.png') }}" alt="user image" style="max-width: 98%; border-radius: 3px;">
                        </div>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 10px;">
                                <a href="{{ route('posts.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6" style="margin-top: 10px;">
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block" onclick="return confirm('You are about to delete this post!\nThis is not reversible!')" title="Delete Post"> Delete 
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection