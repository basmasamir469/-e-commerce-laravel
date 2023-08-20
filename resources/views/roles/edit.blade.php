@extends('layouts.app')
@section('small-title')
 @lang('edit role')
@endsection
@section('content')
<div class="card card-secondary">
    <div class="card-header">
    <h3 class="card-title">@lang('Edit Role')</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
        <form action="{{route('roles.update',$role->id)}}" method='Post' enctype="multipart/form-data">
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
      <label for="inputEstimatedBudget">@lang('Permissions')</label>
      @dump($role->permissions())
      <select id="my-select" class="form-control" name="permissions[]" multiple>
        <option value="">@lang('Choose')</option>
        @foreach ($permissions as $permission )
        <option value="{{$permission->id}}"  @if(in_array($permission->name,$role->permissions->pluck('name'))) selected @endif>{{$permission->name}}</option>
        @endforeach
      </select>
    @error('permissions')
    <small  class="form-text text-danger">{{$message}}</small>
    @enderror      
  </div>

     
    <input type="submit" value="{{__('edit role')}}" class="btn btn-success float-right">
  </form>

    </div>
    
    </div>
@endsection