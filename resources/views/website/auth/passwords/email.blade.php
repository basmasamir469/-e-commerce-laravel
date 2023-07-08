@extends('website.auth.main')
@section('title')
{{__('Reset Password')}}
@endsection
@section('content')
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('{{asset("/forms/images/bg-01.jpg")}}');">
					<span class="login100-form-title-1">
						{{__('Reset Password')}}
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="{{route('users.send_email')}}" >
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
						<span class="focus-input100"></span>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					   @enderror					
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							{{ __('Send Password Reset Link') }}
						</button>
					</div>
				</form>
			</div>
	
@endsection