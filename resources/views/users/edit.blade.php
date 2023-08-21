@extends('layouts.app')
@section('small-title')
 @lang('edit user')
@endsection
@section('content')
<div class="card card-secondary">
    <div class="card-header">
    <h3 class="card-title">@lang('Edit User')</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
        <form action="{{route('users.update',$user->id)}}" method='Post' enctype="multipart/form-data">
          @csrf
          @method('PATCH')
    <div class="form-group">
    <label for="inputEstimatedBudget">@lang('Name')</label>
    <input type="text" name="name" value="{{$user->name}}" id="inputEstimatedBudget" class="form-control">
    @error('name')
    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
    @enderror
    </div>
    <div class="form-group">
      <label for="inputEstimatedBudget">@lang('Email')</label>
      <input class="form-control" name="email" value="{{$user->email}}" type="email">
      @error('email')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror  
      </div>

      <div class="form-group">
        <label for="inputEstimatedBudget">@lang('Roles')</label>
        <select id="my-select" class="form-control" name="roles">
          <option value="">@lang('Choose')</option>
          @foreach ($roles as $role )
          <option value="{{$role->id}}" @if(in_array($role->name,$user->getRoleNames()->toArray())) selected @endif>{{$role->name}}</option>
          @endforeach
        </select>
      @error('roles')
      <small  class="form-text text-danger">{{$message}}</small>
      @enderror      
    </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">@lang('Password')</label>
        <input class="form-control" name="password"  type="password" id="formFile">
        @error('password')
        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
        @enderror    
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">@lang('Confirm Password')</label>
        <input class="form-control" name="confirm_password"  type="password" id="formFile">
        @error('password_confirmation')
        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
        @enderror    
      </div>
      <div class="form-group">
        <label for="inputEstimatedBudget">@lang('Phone Number')</label>
        <input class="form-control" name="phone_number" value="{{$user->phone_number}}" type="text">
        @error('phone_number')
        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
        @enderror  
        </div>    

    <input type="submit" value="{{__('edit user')}}" class="btn btn-success float-right">
  </form>

    </div>
    
    </div>
@endsection