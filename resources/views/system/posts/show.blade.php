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
                                    @if($post->project_id)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>Refereced Project</td>
                                            <td>{{ $post->project_id }}</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if($post->title)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>Post Tile</td>
                                            <td>{{ $post->title }}</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if($post->description)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>Description</td>
                                            <td><textarea class="form-control">{{ $post->description }}</textarea></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if($post->more)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>More Details</td>
                                            <td><textarea class="form-control">{{ $post->more }}</textarea></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if($post->references)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>References</td>
                                            <td><textarea class="form-control">{{ $post->references }}</textarea></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if($post->uploaded_by)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>Author</td>
                                            <td>{{ App\User::where('id',$post->uploaded_by)->get()->first()->name }}</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4 padding">
                <div class="panel box-v4">
                    <div class="panel-body">
                        <h4 class="card-title"> <img src="{{ asset('asset/img/logomi.png') }}" style="max-width: 30px; border-radius: 50%;"> User Profile Operations</h4>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <img src="{{ asset('asset/img/logomi.png') }}" alt="user image" style="max-width: 98%; border-radius: 3px;">
                            </div>
                            @role(['super-admin','admin'])
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                                </div>
                                <div class="col-md-6">
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
</div>

@endsection