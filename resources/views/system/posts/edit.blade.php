@extends('layouts.site')
@section('title') Edit Post @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Edit Post Details | {{ config('app.name') }} </h3>
	        <p>Create new posts in {{ config('app.name') }}!</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('settings') }}"> <i class="fa fa-gear"></i> User</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}"> <i class="fa fa-list"></i> Projects </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}"> <i class="fa fa-home"></i> Posts </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Post </li>
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
        <div class="col-md-8 padding-0">
            <div class="panel box-v4">
                <div class="panel-body">
                    <form action="{{ route('posts.update',$post->id) }}" method="POST" class="tab-wizard wizard-circle">
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
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h6 style="width: 100%; text-align: center;">Main Content</h6>
                        <section>
                            <input type="hidden" name="uploaded_by" value="{{ $post->uploaded_by }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="topic1">Topic <span class="text-danger">*</span> :</label>
                                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="topic1" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category1">Attach Project <span class="text-danger">*</span> :</label>
                                        <select name="project_id" class="form-control" id="category1">
                                            <option value="{{ $post->project_id }}">Selct Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}" title="{{ $project->start_date . ' - ' . $project->end_date }}">{{ $project->name }} ( {{ $project->status }} )</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Description <span class="text-danger">*</span> :</label>
                                        <textarea name="description" class="form-control" id="desc" placeholder="Enter the details to help understand the post more!">{{ $post->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc">More Support Informatio <span class="text-danger">*</span> :</label>
                                        <textarea name="more" class="form-control" id="desc" placeholder="Help provide related information if any!">{{ $post->more }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date1">Post Date <span class="text-danger">*</span> :</label>
                                        <input type="date" name="post_date" class="form-control" id="date1" value="{{ $post->post_date }}"> 
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6 style="width: 100%; text-align: center;">More</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="map1">References <span class="text-danger">*</span> :</label>
                                        <textarea name="references" class="form-control" id="desc" placeholder="You can give references for the post as for validity and use of the communicated information!">{{ $post->references }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6 style="width: 100%; text-align: center;">Final</h6>
                        <div div class="col-md-12 text-center">
                            <a href="{{ route('posts.index') }}" class="btn btn-round btn-danger" onclick="return confirm('Are you sure you want to discard this post?\nThis will delete all it content!')">Leave Changes</a>
                            <button type="submit" class="btn btn-round btn-primary">Update Post</button>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="panel-title">  Post Operations</h4>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-rounded btn-block" style="margin: 10px;"> Back </a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        <div class="tools" style="margin: 10px;">
                                            <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                                onclick="return confirm('You are about to delete this post!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
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
                                @foreach($post->comments as $comm)
                                    <div class="panel">
                                        <div class="panel-body" style="border: thin solid #e5e5e5;">
                                            <div class="col-md-12">
                                                <form action="{{ route('comments.update', ['post',$post->id,$comm->id]) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                            <input type="text" name="comment" value="{{ $comm->comment }}" class="form-control">
                                                        </div>
                                                        <input type="hidden" name="responder" value="{{ $comm->responder }}">
                                                        <input type="hidden" name="router" value="posts.edit">
                                                        <div class="col-md-6 form-group">
                                                            <select class="custom-select form-control" name="status">
                                                                <option value="Approved">Approved</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Under Consideration">Under Consideration</option>
                                                                <option value="Rejected">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <a href="{{ route('comments.edit', ['post',$post->id,$comm->id]) }}" class="label label-info btn-xs btn-rounded">Detailed Edit</a>
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
                                                
                                                <form method="POST" action="{{ route('comments.destroy', ['post',$post->id,$comm->id]) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="col-md-12 form-control" style="border: none;">
                                                        <input type="hidden" name="router" value="posts.edit">
                                                        <input type="hidden" name="item_val" value="{{ $post->id }}">
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
@endsection