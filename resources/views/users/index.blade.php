@extends('layouts.app')
@section('page-title')
<h1>@lang('Users')</h1>
@endsection
@section('small-title')
 @lang(' users')
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        {{-- @can('role-create') --}}
        <a class="btn btn-success mb-3" href="{{ route('users.create') }}"> @lang('Create New User')</a>
        {{-- @endcan --}}
        </div>
        </div>        
</div>
  <div class="card-body">
    @if(count($users)>0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">@lang('Name')</th>
          <th>@lang('Email') </th>
          <th>@lang('Phone Number')</th>
          <th colspan="2">@lang('Actions')</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user )
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td> {{$user->phone_number}} </td>
          <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Edit</a></td>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
              @lang('Delete')
            </button> 
            <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">@lang('Delete User')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @lang('Are you sure of deleting this row?')
            </div>
            <div class="modal-footer">
             <form method="post" action="{{ route('users.destroy',$user->id) }}"> 
                  @csrf       
                  @method('DELETE')
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
              <button type="submit" class="btn btn-danger">@lang('Delete')</button>
            </form> 
            </div>
          </div>
        </div>
      </div>     
               </td>      
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="alert alert-danger" role="alert">
     @lang('No data')
   </div>
   @endif
  </div>
  </div>
    {!! $users->render() !!}
  @endsection
  
