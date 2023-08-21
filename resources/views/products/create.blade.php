@extends('layouts.app')
@section('small-title')
 @lang('add product')
@endsection
@section('content')
<div class="card card-secondary">
    <div class="card-header">
    <h3 class="card-title">@lang('Add product')</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
        <form action="{{route('products.store')}}" method='Post' enctype="multipart/form-data">
          @csrf
    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Name in arabic')</label>
          <input type="text" name="product_name[ar]" id="inputEstimatedBudget" class="form-control">
          @error('product_name.ar')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
        <div class="col-5 ml-5">
          <label for="inputEstimatedBudget">@lang('Name in english')</label>
          <input type="text" name="product_name[en]" id="inputEstimatedBudget" class="form-control">
          @error('product_name.en')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Category')</label>
            <select id="my-select" class="form-control" name="category_id">
              <option value="">@lang('Choose')</option>
              @foreach ($categories as $category )
              <option value="{{$category->id}}">{{$category->category_name}}</option>
              @endforeach
            </select>
          @error('category_id')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Price')</label>
          <input class="form-control" type="text" name="price">
          @error('price')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Quantity')</label>
          <input class="form-control" type="number" name="quantity">
          @error('quantity')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Image')</label>
          <input class="form-control" type="file" name="image">
          @error('image')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Owner')</label>
            <select id="my-select" class="form-control" name="owner_id">
              <option value="">@lang('Choose')</option>
              @if(auth()->user()->hasRole('Owner'))
              <option value="{{auth()->user()->id}}" selected>{{auth()->user()->name}}</option>
              @elseif(auth()->user()->hasRole('Admin'))
              @foreach ($users as $user )
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
              @endif
            </select>
          @error('owner_id')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    </div>

    <input type="submit" value="{{__('add product')}}" class="btn btn-success float-right">
  </form>

    </div>
    
    </div>
@endsection