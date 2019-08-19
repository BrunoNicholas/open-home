@extends('layouts.site')
@section('title') Your Comments @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Your Comments | {{ config('app.name') }} </h3>
	        <p> Your progress with {{ config('app.name') }}! </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('settings') }}"> <i class="fa fa-user-plus"></i> Settings </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-lock"></i> Comments </li>
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
        <div class="col-md-9 padding-0">
            <div class="panel box-v4">
                <div class="panel-body padding-0">
                    <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered display">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Review</th>
                                    <th>Comment</th>
                                    <th>Created By</th>
                                    <th>Source</th>
                                    <th>Actions</th>
                                </tr>
                            </thead><!-- <?php $i=0; ?> -->
                            <tbody>
                                @foreach($comments as $comment)
                                    @if($comment->incident_id)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td class="text-center">Incident</td>
                                            <td>{{ App\Models\Incident::where('id',$comment->incident_id)->first()->title }}</td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><a href="{{ route('incidents.show',$comment->incident_id) }}"><button title="View Incident Details!" class="btn btn-xs btn-info">Details</button></a></td>
                                            <td class="text-center">
                                                @if( Auth::user()->id == $comment->responder)
                                                <form method="POST" action="{{ route('comments.destroy', ['all',0,$comment->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="tools">
                                                        <button type="submit" class="btn btn-danger btn-rounded btn-xs" onclick="return confirm('You are about to delete this comment!\nThis is not reversible!')" title="Created by {{ $comment->responder ? App\User::where('id',$comment->responder)->first()->name : '' }}"><i class="fa fa-remove"></i> Delete </button>
                                                    </div>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>                                    
                                    @elseif($comment->post_id)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td class="text-center">Post</td>
                                            <td>{{ App\Models\Post::where('id',$comment->post_id)->first()->title }}</td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><a href="{{ route('posts.show',$comment->post_id) }}"><button title="View Post Details!" class="btn btn-xs btn-primary">Details</button></a></td>
                                            <td class="text-center">
                                                @if(Auth::user()->id == $comment->responder)
                                                <form method="POST" action="{{ route('comments.destroy', ['all',0,$comment->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="tools">
                                                        <button type="submit" class="btn btn-danger btn-rounded btn-xs" onclick="return confirm('You are about to delete this comment!\nThis is not reversible!')" title="Created by {{ $comment->responder ? App\User::where('id',$comment->responder)->first()->name : '' }}"><i class="fa fa-remove"></i> Delete </button>
                                                    </div>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @elseif($comment->question_id)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td class="text-center">Question</td>
                                            <td>{{ App\Models\Question::where('id',$comment->question_id)->first()->topic }}</td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><a href="{{ route('questions.show',$comment->question_id) }}"><button title="View Question Details!" class="btn btn-xs btn-success">Details</button></a></td>
                                            <td class="text-center">
                                                @if(Auth::user()->id == $comment->responder)
                                                <form method="POST" action="{{ route('comments.destroy', ['all',0,$comment->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="tools">
                                                        <button type="submit" class="btn btn-danger btn-rounded btn-xs" onclick="return confirm('You are about to delete this comment!\nThis is not reversible!')" title="Created by {{ $comment->responder ? App\User::where('id',$comment->responder)->first()->name : '' }}"><i class="fa fa-remove"></i> Delete </button>
                                                    </div>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td class="text-center">Uncategorised</td>
                                            <td>{{ 'Error: No attached file!' }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                @if(Auth::user()->id == $comment->responder)
                                                <form method="POST" action="{{ route('comments.destroy', ['all',0,$comment->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="tools">
                                                        <button type="submit" class="btn btn-danger btn-rounded btn-xs" onclick="return confirm('You are about to delete this comment!\nThis is not reversible!')" title="Created by {{ $comment->responder ? App\User::where('id',$comment->responder)->first()->name : '' }}"><i class="fa fa-remove"></i> Delete </button>
                                                    </div>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
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