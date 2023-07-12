@extends('layouts.app')
@section('page-title')
<h1>@lang('orders')</h1>
@endsection
@section('small-title')
 @lang('orders') 
@endsection
@section('content')
<div class="card">
@include('flash::message')
@if(count($orders)>0)
<div class="card-body">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">@lang('UserName')</th>
        <th scope="col">@lang('Order Status')</th>
        <th scope="col">@lang('Products')</th>
        <th scope="col">@lang('Total Cost')</th>
        <th scope="col">@lang('Order Date')</th>
        <th colspan="2">@lang('Actions')</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$order->user->name}}</td>
        <td id="orderStatus{{$order->id}}">
          @if($order->status==1)
         <span class="badge badge-warning">@lang('Pending')</span>
          @elseif($order->status==0)
          <span class="badge badge-danger">@lang('Cancelled')</span>
          @else
          <span class="badge badge-success">@lang('Accepted')</span>
          @endif
        </td>
        <td><ul>
        @foreach ($order->products as $product )
          <li>{{$product->product_name}} &nbsp;&nbsp;&nbsp;<span class="text-bold">@lang('Quantity'):</span> {{$product->pivot->quantity}}</li>
        @endforeach</ul>
        </td>
        <td>{{$order->total_cost}} EGP</td>
        <td>{{\Carbon\Carbon::parse($order->created_at)->format('d-m-Y')}}</td>
        <td><button order-id="{{$order->id}}"  class="btn btn-success acceptOrder">@lang('Accept')</button></td>
          <td>
      <button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#rejectModal{{$order->id}}">
        @lang('Reject')
      </button> 
      <!-- Modal -->
 <div class="modal fade" id="rejectModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">@lang('Reject Order')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('Are you sure of rejecting this order?')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
        <button class="btn btn-danger rejectOrder"  order-id="{{$order->id}}">@lang('Reject')</button>
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
 {!! $orders->render()!!} 
@endsection
@push('scripts')
  @include('orders.scripts.accept-reject-order') 
@endpush