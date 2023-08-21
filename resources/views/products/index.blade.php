@extends('layouts.app')
@section('page-title')
<h1>@lang('products')</h1>
@endsection
@section('small-title')
 @lang('products') 
@endsection
@section('content')
<div class="card">
@include('flash::message')
@if(count($products)>0)
<div class="card-body">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">@lang('Name')</th>
        <th scope="col">@lang('Image')</th>
        <th scope="col">@lang('Price')</th>
        <th scope="col">@lang('Quantity')</th>
        <th scope="col">@lang('Category')</th>
        <th colspan="2">@lang('Actions')</th>
      </tr>
    </thead>
    <tbody>
        @foreach (auth()->user()->hasRole('Owner')? auth()->user()->products:$products as $product )
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->product_name}}</td>
        <td><img src="{{$product->image}}" alt="" width="100" height="100"></td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->category->category_name}}</td>
        <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-warning">@lang('Edit')</a></td>
          <td>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
        @lang('Delete')
      </button> 
      <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">@lang('Delete Product')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('Are you sure of deleting this row?')
      </div>
      <div class="modal-footer">
       <form method="post" action="{{ route('products.destroy',$product->id) }}"> 
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
</div>
  @else
  <div class="alert alert-danger" role="alert">
   @lang('No data')
 </div>
 @endif
</div>
 {!! $products->render()!!} 
@endsection