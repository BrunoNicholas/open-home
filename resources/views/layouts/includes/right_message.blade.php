<div class="col-md-3 mail-left">
    <div class="col-md-12 mail-left-header">
        <center> <a href="{{ route('messages.create','all') }}" class="btn btn-danger btncompose-mail"> Compose </a> </center>
    </div>
    <div class="col-md-12 mail-left-content">
        <ul class="nav">
            <li><h5>Folder</h5></li>
            <li> 
            	<a href="{{ route('messages.index', 'inbox') }}">
            		<span class="fa fa-inbox"></span> Inbox 
            		@if($inboxCount > 0)<span class="label label-info label-sm float-right"> {{ $inboxCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'sent') }}">
            		<span class="fa fa-send-o"></span> Sent Mail 
            		@if($sentCount > 0)<span class="label label-success float-right"> {{ $sentCount }} </span>@endif
            	</a>
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'draft') }}">
            		<span class="fa fa-folder"></span> Drafts 
            		@if($draftCount > 0)<span class="label label-primary float-right"> {{ $draftCount }} </span>@endif 
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index','spam') }}">
            		<span class="fa fa-fire"></span> Spam 
            		@if($spamCount > 0)<span class="label label-warning float-right"> {{ $spamCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index','trash') }}">
            		<span class="fa fa-trash"></span> Trash 
            		@if($trashCount > 0)<span class="label label-danger float-right"> {{ $trashCount }} </span>@endif
            	</a> 
            </li>
            <li> <hr/> </li>
            <li class="text-center"> <h5> Categories </h5> </li>
            <li> <hr/> </li>
            <li> 
            	<a href="{{ route('messages.index', 'important') }}"><div class="fa fa-circle text-danger"></div> Important
            		@if($impCount)<span class="label label-default float-right text-info"> {{ $impCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'urgent') }}"><div class="fa fa-circle text-cyan"></div> Urgent 
            		@if($urgCount)<span class="label label-default float-right text-info"> {{ $urgCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'official') }}"><div class="fa fa-circle text-warning"></div> Official
            		@if($offCount)<span class="label label-default float-right text-info"> {{ $offCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'unofficial') }}"><div class="fa fa-circle text-info"></div> Unofficial
            		@if($unoffCount)<span class="label label-default float-right text-info"> {{ $unoffCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'normal') }}"><div class="fa fa-circle text-default"></div> Normal
            		@if($normalCount)<span class="label label-default float-right text-info"> {{ $normalCount }} </span>@endif
            	</a> 
            </li>
            <li> 
            	<a href="{{ route('messages.index', 'all') }}"><div class="fa fa-circle text-primary"></div> All
            		@if($allCount)<span class="label label-default float-right text-info"> {{ $allCount }} </span>@endif
            	</a> 
            </li>
        </ul>
    </div>
</div>