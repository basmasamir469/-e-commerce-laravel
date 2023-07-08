<x-mail::message>
# Introduction

<h2>click on the link below to reset your password</h2>
<a class="btn btn-primary" href="{{route('users.show_reset_password_form',['token'=>$token,'email'=>$email])}}">
Reset password
</a>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
