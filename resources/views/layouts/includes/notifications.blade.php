@if($message = Session::get('danger'))
	<div class="alert alert-danger"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Abbort <i class="fa fa-times-circle"></i> : {{ $message }}
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
@if($message = Session::get('warning'))
	<div class="alert alert-warning"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Warning <i class="fa fa-info-circle"></i> : <b>{{ $message }}</b>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
@if($message = Session::get('success'))
	<div class="alert alert-success"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Success <i class="fa fa-check"></i> : <b>{{ $message }}</b>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif
@if($message = Session::get('info'))
	<div class="alert alert-info"> 
		<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" width="30" class="rounded-circle" alt="img"> 
		 Notice <i class="fa fa-lightbulb"></i> : <b>{{ $message }}</b>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	    	<span aria-hidden="true">&times;</span> 
	    </button>
	</div>
@endif