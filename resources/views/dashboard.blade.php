@extends('layouts.app')
@inject('user', "App\Models\User")
@inject('category', "App\Models\Category")
@inject('product', "App\Models\Product")
@inject('order', "App\Models\Order")

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
  
        <div class="info-box-content">
          <span class="info-box-text">@lang('Users')</span>
          <span class="info-box-number">{{$user->count()}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-bars"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">@lang('Categories')</span>
            <span class="info-box-number">{{$category->count()}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fab fa-product-hunt"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">@lang('Products')</span>
            <span class="info-box-number">{{$product->count()}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-cart-plus"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">@lang('Orders')</span>
            <span class="info-box-number">{{$order->count()}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
  
  
  
</div>  
@endsection
