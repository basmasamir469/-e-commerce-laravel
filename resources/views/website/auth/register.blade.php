@extends('website.auth.main')
@section('title')
Register
@endsection
@section('content')

		<div class="wrap-login100">
			<div class="login100-form-title" style="background-image: url('{{asset("/forms/images/bg-01.jpg")}}');">
				<span class="login100-form-title-1">
					Sign Up
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

			<form class="login100-form validate-form" method="POST" action="{{ route('register') }}" autocomplete="off" enctype="multipart/form-data">
				@csrf
				<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
					<span class="label-input100">Username</span>
					<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter username" value="{{ old('name') }}" autofocus>
					<span class="focus-input100"></span>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				   @enderror
				</div>

				<div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
					<span class="label-input100">Email</span>
					<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
					<span class="focus-input100"></span>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				   @enderror
				</div>

				<div class="wrap-input100 validate-input m-b-18" data-validate = "Phone is required">
					<span class="label-input100" style="  white-space: nowrap;">Phone</span>
					<input class="input100 @error('phone_number') is-invalid @enderror" type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter phone number">
					<span class="focus-input100"></span>
					@error('phone_number')
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

				<div class="wrap-input100 validate-input m-b-18">
					<span class="label-input100">Image</span>
					<input class="input100 @error('image') is-invalid @enderror" type="file" name="image">
					<span class="focus-input100"></span>
					@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				   @enderror
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						register
					</button>
				</div>
			</form>
		</div>
@endsection