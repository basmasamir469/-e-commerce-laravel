@extends('website.auth.main')
@section('title')
@lang('Login')
@endsection
@section('content')
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('{{asset("/forms/images/bg-01.jpg")}}');">
					<span class="login100-form-title-1">
						@lang('Sign In')
					</span>
				</div>
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
					</ul>
				</div>
				@endif
					
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">@lang('Email')</span>
						<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="{{__('Enter email')}}">
						<span class="focus-input100"></span>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					   @enderror					
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">@lang('Password')</span>
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{__('Enter password')}}" autocomplete="new-password">
						<span class="focus-input100"></span>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					   @enderror					
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="label-checkbox100" for="ckb1">
								@lang('Remember me')
							</label>
						</div>

						<div>
							@if (Route::has('users.forget_password'))
							<a  href="{{ route('users.forget_password') }}" class="txt1">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							@lang('Login')
						</button>
						<a class="ml-3 mt-3" href="{{route('users.register')}}">@lang('Not Registered?')</a>
					</div>

					<div class="social-auth-links text-center mb-3 mt-3">
						<p class="mb-3">- @lang('OR') -</p>
						{{-- <a href="{{route('login.facebook')}}" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
						</a> --}}
						<a href="{{route('login.google')}}" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> @lang('Sign in using Google+')
						</a>
						</div>
					
				</form>
			</div>
	
@endsection