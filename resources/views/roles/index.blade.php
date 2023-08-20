@extends('layouts.app')
@section('page-title')
<h1>@lang('Roles')</h1>
@endsection
@section('small-title')
 @lang('users')
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        {{-- @can('role-create') --}}
        <a class="btn btn-success mb-3" href="{{ route('roles.create') }}"> @lang('Create New Role')</a>
        {{-- @endcan --}}
        </div>
        </div>        
</div>
  <div class="card-body">
    @if(count($roles)>0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">@lang('Name')</th>
          <th>@lang('Permissions')</th>
          <th colspan="2">@lang('Actions')</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($roles as $role )
        <tr>
          <th scope="row">{{$role->id}}</th>
          <td>{{$role->name}}</td>
          <td>
           @if(!empty($role->permissions()))
              @foreach($role->permissions->pluck('name') as $n)
                 <label class="badge badge-success">{{ $n }}</label>
              @endforeach
            @endif
          </td>      
          <td><a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning">@lang('Edit')</a></td>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
              @lang('Delete')
            </button> 
            <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">@lang('Delete Role')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @lang('Are you sure of deleting this row?')
            </div>
            <div class="modal-footer">
             <form method="post" action="{{ route('roles.destroy',$role->id) }}"> 
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
    {!! $roles->render() !!}
  @endsection
  
