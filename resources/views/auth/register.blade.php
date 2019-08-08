@extends('layouts.auths')
@section('title') Create Account @endsection
@section('content')
	<form class="form-signin" style="margin-top: 5%; padding-bottom:140px;" method="POST" action="{{ route('register') }}">
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
			    <p class="atomic-mass">Create An Account - Register</p>
			    <p class="element-name">{{ config('app.name') }}</p>

			    <i class="icons icon-arrow-down"></i>
			    <div class="form-group form-animate-text" style="margin-top:40px !important;">
			    	<input type="text" class="form-text{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
			        <span class="bar"></span>
			        <label><i class="fa fa-user"></i> {{ __('Full Names') }}</label>
			        @if ($errors->has('name'))
	                    <span class="invalid-feedback text-danger" role="alert" style="background-color: #fff">
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	                @endif
			    </div>

			    <div class="form-group form-animate-text" style="margin-top:40px !important;">
			    	<input type="email" class="form-text{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
			        <span class="bar"></span>
			        <label><i class="fa fa-envelope"></i> {{ __('E-Mail Address') }}</label>
			        @if ($errors->has('email'))
	                    <span class="invalid-feedback text-danger" role="alert" style="background-color: #fff">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
			    </div>

			    <div class="form-group form-animate-text" style="margin-top:40px !important;">
			        <input type="password" class="form-text{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
			        <span class="bar"></span>
			        <label><i class="fa fa-key"></i> {{ __('Password') }}</label>
			        @if ($errors->has('password'))
		                <span class="invalid-feedback text-danger" role="alert" style="background-color: #fff">
		                    <strong>{{ $errors->first('password') }}</strong>
		                </span>
		            @endif
			    </div>

			    <div class="form-group form-animate-text" style="margin-top:40px !important;">
			        <input type="password" class="form-text" name="password_confirmation" required>
			        <span class="bar"></span>
			        <label><i class="fa fa-key"></i> {{ __('Confirm Password') }}</label>
			    </div>

			    <label>
			    	<input type="checkbox" class="icheck pull-left" name="agreement"  id="remember"checked/> {{ __('Agree to terms & conditions and policy!') }}
			    </label>

			    <button type="submit" class="btn col-md-12" style="border-radius: 5px;"> {{ __('Join Now') }} </button>
			    <div class="text-center">
	                <a class="" href="{{ route('login') }}" style="padding:10px;">
	                    {{ __('Already have account! | Login') }}
	                </a>
			    </div>
			</div>
		</div>
	</form>
@endsection