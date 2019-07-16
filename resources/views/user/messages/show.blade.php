@extends('layouts.site')
@section('title') Message Details @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/normalize.css"/>
@endsection
@section('content')
	<div class="panel">
		<div class="panel-body">
		      <div class="col-md-6 col-sm-12">
		        <h3 class="animated fadeInLeft"> Message Details | {{ config('app.name') }} </h3>
		        <p> View message details, reply or forward it! </p>
		    </div>
		    <div class="col-7 align-self-center pull-right">
	            <div class="d-flex no-block justify-content-end align-items-center">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
	                        <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
	                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">  <i class="fa fa-envelope"></i> Messages </a></li>
	                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Message Details </li>
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
	    <div class="col-md-12 mail-wrapper">
	    	<div class="col-md-12 padding">
		        @include('layouts.includes.right_message')
		        <div class="col-md-9 mail-right">
		            <div class="col-md-12 mail-right-header">
		                <div class="col-md-10 col-sm-10 padding-0">
		                    <div class="input-group searchbox-v1">
		                    	<a href="javascript:void(0)" class="label label-danger" data-toggle="modal" data-target="#createModal" data-whatever="@mdo"><i class="fa-envelope fa"></i> Send Public Email</a>
		                      	<span class="input-group-addon  border-none box-shadow-none" id="basic-addon1">
		                        	<span class="fa fa-search"></span>
		                      	</span>
		                      	<input type="text" class="txtsearch border-none box-shadow-none" placeholder="Search Email..." aria-describedby="basic-addon1">
		                      	<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	                                <div class="modal-dialog" role="document">
	                                    <div class="modal-content">
	                                        <div class="modal-header">
	                                            <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
	                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                        </div>
	                                        <form action="{{ route('messages.storeAll','inbox') }}" method="POST">
	                                            @csrf
	                                            @foreach ($errors->all() as $error)
	                                                <p class="alert alert-danger">{{ $error }}</p>
	                                            @endforeach

	                                            @if (session('success'))
	                                                <div class="alert alert-success">
	                                                    {{ session('success') }}
	                                                </div>
	                                            @endif
	                                            <div class="modal-body">
	                                                <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
	                                                <input type="hidden" name="receiver" value="{{ Auth::user()->id }}">
	                                                <input type="hidden" name="status" value="inbox">
	                                                <div class="form-group">
	                                                    <div class="row">
	                                                        <div class="col-md-6">
	                                                            <label for="recipient-name" class="control-label">Topic:</label>
	                                                            <input type="text" class="form-control" id="recipient-name1" name="title">
	                                                        </div>
	                                                        <div class="col-md-6">
	                                                            <label for="priority">Priority</label>
	                                                            <select class="custom-select form-control" name="folder">
	                                                                <option value="normal">Select priority</option>
	                                                                <option value="important">Important</option>
	                                                                <option value="urgent">Urgent</option>
	                                                                <option value="official">Official</option>
	                                                                <option value="unofficial">Unofficial</option>
	                                                                <option value="normal">Normal</option>
	                                                                <option value="">None</option>
	                                                            </select>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group">
	                                                    <label for="message-text" class="control-label">Message:</label>
	                                                    <textarea class="form-control" id="message-text1" name="message"></textarea>
	                                                </div>
	                                            </div>
	                                            <div class="modal-footer" style="padding: 10px;">
	                                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin: 5px;">Close</button>
	                                                <button type="submit" class="btn btn-primary" style="margin: 5px;">Send message</button>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
		                    </div>
		                </div>
		                <div class="col-md-2 col-sm-2 padding-0 text-right mail-right-options">
		                    <div class="btn-group pull-right right-option-v1">
		                        <i class="fa fa-ellipsis-v right-option-v1-icon" data-toggle="dropdown"></i>
		                        <ul class="dropdown-menu" role="menu">
		                          	<li><a href="{{ route('messages.index', 'important') }}">Important Messages</a></li>
		                          	<li><a href="{{ route('messages.index', 'urgent') }}">Urgent Messages</a></li>
		                          	<li><a href="{{ route('messages.index', 'official') }}">Official Messages</a></li>
		                          	<li><a href="{{ route('messages.index', 'unofficial') }}">Unofficial Messages</a></li>
		                          	<li><a href="{{ route('messages.index', 'normal') }}">Normal Messages</a></li>
		                          	<li class="divider"></li>
	                                <li class="text-center"><a href="{{ route('messages.index', 'all') }}">All</a></li>
		                        </ul>
		                    </div>
		                </div>
		            </div>


		            <div class="col-md-12" role="group" aria-label="Button group with nested dropdown">
		            	<div class="row">
		            		<div class="col-md-6">
		            			<a href="{{ route('messages.index','inbox') }}" style="margin: 2px;" class="pull-left">
			                        <button type="button" class="btn btn-outline-primary font-18" title="Go to inbox">
			                            <i class="fa fa-reply"></i>
			                        </button>
			                    </a>
			                    <form action="{{ route('messages.update',[$message->id,'delete']) }}" method="post" style="margin: 2px;" class="pull-left">
			                        {{ csrf_field() }}
			                        {{ method_field('PATCH') }}
			                        <input type="hidden" name="sender" value="{{ $message->sender }}">
			                        <input type="hidden" name="receiver" value="{{ $message->receiver }}">
			                        <input type="hidden" name="message" value="{{ $message->message }}">
			                        <input type="hidden" name="status" value="spam">
			                        <button type="submit" class="btn btn-outline-primary font-18" title="Send to spam">
			                            <i class="fa fa-info" title="Move to Spam"></i>
			                        </button>
			                    </form>
			                    <form action="{{ route('messages.update',[$message->id,'delete']) }}" method="post" style="margin: 2px;" class="pull-left">
			                        {{ csrf_field() }}
			                        {{ method_field('PATCH') }}
			                        <input type="hidden" name="sender" value="{{ $message->sender }}">
			                        <input type="hidden" name="receiver" value="{{ $message->receiver }}">
			                        <input type="hidden" name="message" value="{{ $message->message }}">
			                        <input type="hidden" name="status" value="trash">
			                        <button type="submit" class="btn btn-outline-primary font-18" title="Move to trash">
			                            <i class="fa fa-recycle" title="Move to Trash"></i>
			                        </button>
			                    </form>
			                    <form action="{{ route('messages.destroy',[$message->id,'delete']) }}" method="post" style="margin: 2px;">
	                                {{ csrf_field() }}
	                                {{ method_field('DELETE') }}
	                                <button type="submit" class="btn btn-outline-primary font-18" onclick="return confirm('You are about to delete thus mail!\nThis is not reversible!')" title="This lets you delete email completely.">Delete Mail</button>
	                            </form>
		            		</div>
		            	</div>
	                    
	                </div>

		            <div class="col-md-12 col-sm-12 col-xs-12 mail-right-tool">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <h4><span>Subject:</span> <b>{{ $message->title }}</b> <small> - {{ $message->status }}ed ({{ $message->folder }})</small></h4>
                            @foreach ($errors->all() as $error)
			                    <p class="alert alert-danger">{{ $error }}</p>
			                @endforeach

			                @if (session('success'))
			                    <div class="alert alert-success">
			                        {{ session('success') }}
			                    </div>
			                @endif
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<div class="row">
                            	<div class="col-md-1">
	                            	@if($message->receiver == Auth::user()->id)
			                            <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->sender)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="45" style="border-radius: 50%;">
			                        @else
			                            <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="45" style="border-radius: 50%;">
			                        @endif
			                    </div>
			                    <div class="col-md-4">
			                    	@if($message->receiver == Auth::user()->id)
			                            <h5 class="m-b-0 font-16 font-medium"> To <a href="{{ route('profile') }}"> ME
			                                <small> ( {{ (App\User::where('id',$message->receiver)->get()->first())->email }} )</small>
			                            </a></h5>
			                        @else
			                            <h5 class="m-b-0 font-16 font-medium"> <a href="{{ route('users.show',$message->receiver) }}">{{ (App\User::where('id',$message->receiver)->get()->first())->name }}
			                                <small> ( {{ (App\User::where('id',$message->receiver)->get()->first())->email }} )</small>
			                            </a></h5>
			                        @endif
			                        <span>from 
			                            @if($message->sender == Auth::user()->id)
			                                <a href="{{ route('profile') }}"> <b>Me</b> </a>
			                            @else
			                                <a href="{{ route('users.show',$message->sender) }}"><b>{{ (App\User::where('id',$message->sender)->get()->first())->email . ' - ' . (App\User::where('id',$message->sender)->get()->first())->name  }}</b></a>
			                            @endif
			                        </span> 
			                    </div>
			                </div>

                            <span class="pull-right">{{ $message->created_at }}</span>
                        </div>                       
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 mail-right-content padding-0">
                        <div class="col-md-12 col-sm-12 col-xs-12 mail-right-text">
                            <h4>Hello {{ (App\User::where('id',$message->receiver)->get()->first())->name }},</h4>
                            <textarea class="form-control" rows="10" disabled style="background-color: #fff">{{ $message->message }}</textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12"><hr/></div>
                        <input type="button" value="Forward" class="btn btn-primary pull-right" style="margin: 15px;" data-toggle="modal" data-target="#forwardModal" data-whatever="@fat" />
                        @if($message->sender != Auth::user()->id) <input type="button" value="Reply" class="btn btn-danger pull-right" style="margin: 15px;" data-toggle="modal" data-target="#replyModal" data-whatever="@mdo" /> @endif
                        <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('messages.store','inbox') }}" method="POST">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="modal-body">
                                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="receiver" value="{{ $message->sender }}">
                                    <input type="hidden" name="status" value="inbox">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="recipient-name" class="control-label">Topic:</label>
                                                <input type="text" class="form-control" id="recipient-name1" name="title" value="{{ $message->title }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="priority">Priority</label>
                                                <select class="custom-select form-control" name="folder">
                                                    <option value="normal">Select priority</option>
                                                    <option value="important">Important</option>
                                                    <option value="urgent">Urgent</option>
                                                    <option value="official">Official</option>
                                                    <option value="unofficial">Unofficial</option>
                                                    <option value="normal">Normal</option>
                                                    <option value="">None</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Message:</label>
                                        <textarea class="form-control" id="message-text1" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('messages.store','inbox') }}" method="POST">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel1">Forward this message</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="folder" value="{{ $message->folder }}">
                                <input type="hidden" name="title" value="{{ $message->title }}">
                                <input type="hidden" name="priority" value="unseen">
                                <input type="hidden" name="status" value="inbox">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Recipient:</label>
                                        <select class="custom-select form-control" name="receiver">
                                            @foreach($users as $user)
                                                @if($user->id != Auth::user()->id)
                                                    <option value="{{ $user->id }}" title="{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}">{{ $user->name . ' - ' . $user->email }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Message:</label>
                                        <textarea class="form-control" id="message-text1" name="message">{{ $message->message }}

-----
Forwarded from {{ App\User::where('id',$message->sender)->get()->first()->name }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
		        <!-- /end of right -->
		    </div>
	    </div>
	</div>
@endsection
@section('scripts')
<script src="{{ asset('asset/js/plugins/icheck.min.js') }}"></script>
@endsection