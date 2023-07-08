@extends('website.auth.main')
@section('title')
reset password
@endsection
@section('content')
		<div class="wrap-login100">
			<div class="login100-form-title" style="background-image: url('{{asset("/forms/images/bg-01.jpg")}}');">
				<span class="login100-form-title-1">
					{{__('Reset Password')}}
				</span>
			</div>

			<form class="login100-form validate-form" method="POST" action="{{route('users.submit_reset_password_form')}}" autocomplete="off">
				@csrf
				<input type="hidden" name="token" value="{{$token}}">
				<div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
					<span class="label-input100">Email</span>
					<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email')?old('email'):$email }}" placeholder="Enter email">
					<span class="focus-input100"></span>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				   @enderror
				</div>

				<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
					<span class="label-input100">Password</span>
					<input class="input100 @error('password') is-invalid @enderror" type="password" name="password"  placeholder="Enter password" autocomplete="new-password">
					<span class="focus-input100"></span>
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				   @enderror
				</div>

				<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
					<span class="label-input100">Confirm Password</span>
					<input class="input100" type="password" name="password_confirmation" placeholder="confirm password" autocomplete="new-password">
					<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						reset password
					</button>
				</div>
			</form>
		</div>
@endsection