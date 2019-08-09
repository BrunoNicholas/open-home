@extends('layouts.auths')
@section('title') Reset Password @endsection
@section('content')
	<form class="form-signin" style="margin-top: 5%; padding-bottom:200px;" method="POST" action="{{ route('password.email') }}">
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
			    <p class="atomic-mass">Send Rest Link - Authentication</p>
			    <p class="element-name">{{ config('app.name') }}</p>

			    <i class="icons icon-arrow-down"></i>
			    <div class="form-group form-animate-text" style="margin-top:40px !important;">
			    	<input type="email" class="form-text{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus required>
			        <span class="bar"></span>
			        <label><i class="fa fa-envelope"></i> {{ __('E-Mail Address') }}</label>
			        @if ($errors->has('email'))
	                    <span class="invalid-feedback text-danger" role="alert" style="background-color: #fff">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
			    </div>
			    <button type="submit" class="btn col-md-12" style="border-radius: 5px;"> {{ __('Send Me A Password Reset Link') }} </button>
			    <div class="text-center">
	                <a class="" href="{{ route('login') }}" style="padding:10px;">
	                    {{ __('I remember my password! | Login') }}
	                </a>
			    </div>

			</div>
		</div>
	</form>
@endsection