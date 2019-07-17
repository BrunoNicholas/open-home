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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection