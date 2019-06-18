@extends('layouts.auths')
@section('title') Join The Network @endsection
@section('content')
<form class="form-signin" style="margin-top: 5%;" method="POST" action="{{ route('login') }}">
	@csrf
	<div class="panel periodic-login">
		<div class="panel-body text-center">
		    <p class="atomic-mass">Join Now! | Register Once</p>
		    <p class="element-name">{{ config('app.name') }}</p>

		    <i class="icons icon-arrow-down"></i>
		    <div class="form-group form-animate-text" style="margin-top:40px !important;">
		        <input type="email" class="form-text{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
		        <span class="bar"></span>
		        <label><i class="fa fa-envelope"></i> {{ __('E-Mail Address') }}</label>
		        @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
		    </div>
		    <div class="form-group form-animate-text" style="margin-top:40px !important;">
		        <input type="password" class="form-text{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
		        <span class="bar"></span>
		        <label><i class="fa fa-key"></i> {{ __('Password') }}</label>
		        @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
		    </div>
		    <label class="pull-left">
		    	<input type="checkbox" class="icheck pull-left" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }} /> {{ __('Remember Me') }}
		    </label>
		    <input type="submit" class="btn col-md-12" value="{{ __('Register') }}"/>
		</div>

	    <div class="text-center" style="padding:5px;">
	        <a href="{{ route('login') }}"> {{ __('I have an account already!') }}</a>
	    </div>
	</div>
</form>
@endsection