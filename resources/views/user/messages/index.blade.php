@extends('layouts.site')
@section('title') Messages @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/normalize.css"/>
@endsection
@section('content')
	<div class="panel">
		<div class="panel-body">
		      <div class="col-md-6 col-sm-12">
		        <h3 class="animated fadeInLeft"> Messages | {{ config('app.name') }} </h3>
		        <p> Send a message to anyone in the system or to all! </p>
		    </div>
		    <div class="col-7 align-self-center pull-right">
	            <div class="d-flex no-block justify-content-end align-items-center">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
	                        <li class="breadcrumb-item"><a href="{{ route('profile') }}"> <i class="fa fa-user"></i> Profile </a></li>
	                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-envelope"></i> Messages </li>
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
		            <div class="col-md-12 col-sm-12 mail-right-tool">
		                <ul class="nav">
		                    <div class="custom-control custom-checkbox">
	                            <input type="checkbox" class="custom-control-input sl-all" id="cstall">
	                            <label class="custom-control-label" for="cstall">Check All</label> | 
	                            @if($type == 'inbox')
	                                <i class="fa fa-envelope text-info"></i> Inboxed E-mail 
	                            @elseif($type == 'draft')
	                                <i class="fa fa-envelope text-primary"></i> Drafted E-mail
	                            @elseif($type == 'trash')
	                                <i class="fa fa-envelope text-danger"></i> Trashed E-mail
	                            @elseif($type == 'spam')
	                                <i class="fa fa-envelope text-warning"></i> Spamed E-mail
	                            @elseif($type == 'sent')
	                                <i class="fa fa-envelope text-success"></i> Sent E-mail
	                            @elseif($type == 'important')
	                                <i class="fa fa-envelope text-danger"></i> Important E-mail
	                            @elseif($type == 'urgent')
	                                <i class="fa fa-envelope text-success"></i> Urgent E-mail
	                            @elseif($type == 'official')
	                                <i class="fa fa-envelope text-warning"></i> Official E-mail
	                            @elseif($type == 'unofficial')
	                                <i class="fa fa-envelope text-info"></i> Unofficial E-mail
	                            @elseif($type == 'normal')
	                                <i class="fa fa-envelope text-dark"></i> Normal E-mail
	                            @elseif($type == 'all')
	                                <i class="fa fa-envelope text-primary"></i> All E-mail
	                            @elseif($type == 'all')
	                                All E-mail
	                            @else
	                                E-mails
	                            @endif
	                        </div>
		                    <li title="Refresh Page">
		                        <a href=""><span class="fa fa-refresh"></span></a>
		                    </li>
		                    <li title="Important Message">
		                        <a href="{{ route('messages.index', 'important') }}"><span class="fa fa-star"></span></a>
		                    </li>
		                    <li title="Trashed Emails">
		                        <a href="{{ route('messages.index', 'unofficial') }}"><span class="fa fa-remove"></span></a>
		                    </li>
		                    <li>
		                        <a href="{{ route('messages.index', 'all') }}"><span class="fa fa-folder"></span></a>
		                    </li>
		                    <li title="Spam Messages">
		                        <a href="{{ route('messages.index', 'spam') }}"><span class="fa fa-fire"></span></a>
		                    </li>
		                    <li title="Drafted Emails">
		                        <a href="{{ route('messages.index', 'trash') }}"><span class="fa fa-trash"></span></a>
		                    </li>
		                    <li class="nav navbar-right" >
		                        <ul class="nav">
		                        	{{ $messages->links() }} 
		                            {{-- <li> <a href=""><span class="fa fa-angle-left"></span></a></li>  <li> <a href="" class="btn-info"><span class="fa fa-angle-right"></span></a></li> --}}
		                        </ul>
		                    </li>
		                </ul>
		            </div>
		            <div class="col-md-12 mail-right-content">
		            	<div class="table-responsive">
			            	<table class="table table-hover" style="overflow-x: auto; overflow-y: auto;">
			                    <tbody>
			                    	@if(sizeof($messages) < 1)
		                                <tr>
		                                    <td class="chb text-center" colspan="7"> <i> No email found! </i> </td>
		                                </tr>
		                            @endif
		                            @foreach ($messages as $message)
		                                <tr class="@if($message->priority == 'seen') unread @else read @endif" @if ($message->priority == 'seen') style="background-color: #e9f9f9;" @endif>
			                        		<td class="check chb">
			                        			{{-- <input type="checkbox" class="icheck" name="checkbox1" /> --}}
			                        			<div class="custom-control custom-checkbox">
			                                        <input type="checkbox" name="checker" class="custom-control-input" id="cst{{ $message->id }}">
			                                        <label class="custom-control-label" for="cst{{ $message->id }}">&nbsp;</label>
			                                    </div>
			                        		</td>

		                                    @if($message->sender == Auth::user()->id)
		                                        <td class="user-image">
		                                            <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
		                                        </td>
		                                        <td class="user-name">
		                                            <h6 class="m-b-0">{{ (App\User::where('id',$message->receiver)->get()->first())->name }}</h6>
		                                        </td>
		                                    @else
		                                        <td class="user-image">
		                                            <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->sender)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
		                                        </td>
		                                        <td class="user-name">
		                                            <h6 class="m-b-0">{{ (App\User::where('id',$message->sender)->get()->first())->name }}</h6>
		                                        </td>
		                                    @endif
			                        		<td class="contact pull-left">
			                          			<a class="link pull-left" href="{{ route('messages.show',[$message->id,'details']) }}">
		                                            @if($message->folder == 'important')
		                                                <span class="label label-danger m-r-10">{{ $message->folder }}</span>
		                                            @elseif($message->folder == 'urgent')
		                                                <span class="label label-success m-r-10">{{ $message->folder }}</span>
		                                            @elseif($message->folder == 'official')
		                                                <span class="label label-warning m-r-10">{{ $message->folder }}</span>
		                                            @elseif($message->folder == 'unofficial')
		                                                <span class="label label-info m-r-10">{{ $message->folder }}</span>
		                                            @elseif($message->folder == 'normal')
		                                                <span class="label btn-default m-r-10">{{ $message->folder }}</span>
		                                            @else
		                                                <span class="label label-primary m-r-10 text-primary">{{ $message->folder }}</span>
		                                            @endif
		                                        </a>
		                                    </td>
		                                    <td class="contact">
		                                    	<a  href="{{ route('messages.show',[$message->id,'details']) }}">
		                                            <span class="blue-grey-text text-darken-4">
		                                                <b>{{ $message->title }}</b>
		                                            </span> 
		                                            {{ $message->message }}
		                                        </a>
			                        		</td>
			                        		@if($message->attachment) 
		                                        <td class="clip" title="This is a public (group) message sent to all!"><i class="fa fa-users"></i></td> <!-- fa fa-paperclip -->
		                                        <td class="time" title="This is a public (group) message sent to all!"> {{ $message->created_at }} </td>
		                                    @else
		                                        <td colspan="2" class="time" title="{{ $message->created_at }}"> {{ $message->created_at }} </td>
		                                    @endif
			                      		</tr>
			                      	@endforeach
			                      </tbody>
			                </table>
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