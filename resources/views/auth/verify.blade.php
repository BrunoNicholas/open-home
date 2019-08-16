@extends('layouts.auths')
@section('title') Verify Account @endsection
@section('content')
	<div class="form-signin" style="margin-top: 5%; padding-bottom:200px;">
		@csrf
		@foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
		<div class="panel periodic-login">
			<div class="panel-body text-center">
			    <p class="atomic-mass">{{ __('Verify Your Email Address!') }}</p>
			    <p class="element-name">{{ config('app.name') }}</p>

			    <i class="icons icon-arrow-down"></i>

			    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class="form-group form-animate-text" style="margin-top:40px !important; font-size: 15px;">
                	{{ __('NOTE: Before proceeding, please check your email for a verification link.') }}
                	{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
                </div>
                <div class="form-group form-animate-text text-center" style="margin-top:40px !important; font-size: 15px;">
                	<a href="{{ route('logout') }}" class="btn btn-sm btn-danger btn-round" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout!</a>
                	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                </div>
			</div>
		</div>
	</div>
@endsection