@extends('layouts.site')
@section('title') Send Messages @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/normalize.css"/>
@endsection
@section('content')
	<div class="panel">
		<div class="panel-body">
		      <div class="col-md-6 col-sm-12">
		        <h3 class="animated fadeInLeft"> Send A Personal Message | {{ config('app.name') }} </h3>
		        <p> Send a message to anyone in the system or to all! </p>
		    </div>
		    <div class="col-7 align-self-center pull-right">
	            <div class="d-flex no-block justify-content-end align-items-center">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
	                        <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
	                        <li class="breadcrumb-item"><a href="{{ route('messages.index','inbox') }}">  <i class="fa fa-envelope"></i> Messages </a></li>
	                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-plus"></i> Create Message </li>
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
		        <!-- start of right -->
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
		            <div class="col-md-12 mail-right-tool">
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
		                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
                            <ul class="nav">
                                <li class="col-md-12">
                                	<div class="row">
                                		<div class="col-md-6">
		                                	<select class="txtinput border-none box-shadow-none" name="receiver" id="example-email" required>
		                                    	<option value="{{ Auth::user()->id }}">Select user to send to</option>
			                                	@foreach($users as $user)
			                                        @if($user->id != Auth::user()->id)
			                                            <option value="{{ $user->id }}" title="{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}">{{ $user->name . ' - ' . $user->email }}</option>
			                                        @endif
			                                    @endforeach
			                                </select>
			                            </div>
			                            <div class="col-md-6">
			                            	<div class="col">
				                                <select class="txtinput border-none box-shadow-none" name="status" id="example-email" required>
				                                    <option value="inbox">Select to change Email type</option>
				                                    <option value="inbox">Send Mail</option>
				                                    <option value="draft">Save as Draft</option>
				                                </select>
				                            </div>
			                            </div>
			                        </div>
                                </li>
                            </ul>
                            <hr>
                            <ul class="nav">
                              	<li class="col-md-12">
			                        <div class="row">
				                        <div class="col-md-6">
				                        	<label>Subject: </label>
				                        	<input type="text" class="txtinput border-none box-shadow-none" name="title" placeholder="Subject.."/>
				                        </div>
				                        <div class="col-md-6">
				                        	<label>Priority: </label>
				                            <select class="txtinput border-none box-shadow-none" name="folder">
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
				                </li>
                            </ul>
                            <hr>
                            <div class="form-group">
			                    <div class="row" style="margin: 5px;">
			                        <div class="col-md-12">
			                            <textarea class="form-control" name="message" rows="10" placeholder="Type your email Here"></textarea>
			                        </div>
			                    </div>
			                </div>
                            <div class="col-md-12">
                                <div class="pull-right">
                                  	<button type="submit" class="btn btn-success"> <i class="fa fa-send"></i> Send Message </button>
                                </div>
                            </div>
                          </div>


                      	</form>
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