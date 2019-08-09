@extends('layouts.site')
@section('title') User Profile Details @endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> User Profile Details | {{ config('app.name') }} </h3>
	        <p> {{ $user->name }}'s profile details! ( {{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }} )</p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> <i class="fa fa-users"></i> System Users </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user"></i> User Profile Details </li>
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
    <div class="col-md-12 padding-">
        <div class="col-md-8 padding">
            <div class="panel box-v4">
                <div class="panel-body">
                    <h4 class="card-title"> <img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 30px; border-radius: 50%;"> {{ $user->name }}'s Details | {{ config('app.name') }}</h4>
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
                                @if($user->name)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Full Names</td>
                                        <td>{{ $user->name }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->email)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->telephone)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Telephone</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td>Required for communication</td>
                                    </tr>
                                @endif
                                @if($user->date_of_birth)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Date Of Birth</td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->location)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Location</td>
                                        <td>{{ $user->location }}</td>
                                        <td>Required for planning</td>
                                    </tr>
                                @endif
                                @if($user->church)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Ministry (Church)</td>
                                        <td>{{ $user->church }}</td>
                                        <td>Required for Accountability</td>
                                    </tr>
                                @endif
                                @if($user->nationality)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Nationality</td>
                                        <td>{{ $user->nationality }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->occupation)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Occupation</td>
                                        <td>{{ $user->occupation }}</td>
                                        <td>Required for accountability</td>
                                    </tr>
                                @endif
                                @if($user->institution)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Campus / Place of Work </td>
                                        <td>{{ $user->institution }}</td>
                                        <td>Required for accountability</td>
                                    </tr>
                                @endif
                                @if($user->gender)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Gender</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->year_enrolled)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Year Enrolled</td>
                                        <td>{{ $user->year_enrolled }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->unenrollment_year)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Graduation Year</td>
                                        <td>{{ $user->unenrollment_year }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->role)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>System Role</td>
                                        <td>{{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->bio)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>User Bio</td>
                                        <td>{{ $user->bio }}</td>
                                        <td>Required for identity</td>
                                    </tr>
                                @endif
                                @if($user->status)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>Account Status</td>
                                        <td>
                                            @if($user->status == 'Active')
                                                <span class="btn-xs btn-rounded label label-success">{{ $user->status }}</span>
                                            @elseif($user->status == 'Away')
                                                <span class="btn-xs btn-rounded label label-primary">{{ $user->status }}</span>
                                            @elseif($user->status == 'Busy')
                                                <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                            @elseif($user->status == 'Blocked')
                                                <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                            @elseif($user->status == 'Inactive')
                                                <span class="btn-xs btn-rounded label label-info">{{ $user->status }}</span>
                                            @else
                                                <span class="btn-xs btn-rounded label label-warning">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                        <td>Required for identity</td>
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
                    <h4 class="card-title"> <img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 30px; border-radius: 50%;"> User Profile Operations</h4>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ asset('files/profile/images/'.$user->profile_image) }}" alt="user image" style="max-width: 98%; border-radius: 3px;">
                        </div>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                            @if($user->id == Auth::user()->id) disabled @elseif($user->role == 'super-admin') disabled @endif onclick="return confirm('You are about to delete {{ $user->name }}\'s account!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
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