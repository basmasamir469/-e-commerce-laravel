@extends('website.main')
@section('content')
<section class="featured-products">
    <h2>Cart List</h2>
    @if(\Cart::getTotalQuantity()>0)
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('Image')</th>
            <th scope="col">@lang('Name')</th>
            <th scope="col">@lang('quantity')</th>
            <th scope="col">@lang('price')</th>
            <th scope="col">@lang('Actions')</th>
          </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img src="{{$item->attributes->image}}" width="100" height="100" alt=""></td>
            <td>{{$item->name}}</td>
            <td>
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id}}" >
              <input type="number" name="quantity" min="1" max="{{$item->associatedModel->quantity}}" value="{{ $item->quantity }}" class="form-control w-25"/>
              <button class="btn btn-warning mt-1" type="submit">@lang('Update')</button>
              </form>
               </td>
            <td>{{$item->price}} Egp</td>
            <td>
                <form method="post" action="{{ route('cart.remove')}}"> 
                @csrf 
                <input type="hidden" name="id" value="{{ $item->id}}" >      
            <button type="submit" class="btn btn-danger"><i class="fas fa-x"></i></button>
          </form> 
         </td>
          </tr>
          @endforeach
        </tbody>
      </table> 
      @else

      <h3 class=" alert alert-danger text-center">@lang('no data')</h3>
      @endif


    <div class="mt-3 mb-3 mx-3">
      <h3 class="text-success">Total:{{ \Cart::getTotal() }} Egp </h3>
      @if(count($items)>0)
      <form method="post" action="{{ route('cart.clear')}}" class="d-inline mb-3"> 
        @csrf       
      <button type="submit" class="btn btn-danger">@lang('Clear All')</button>
     </form> 
     <form method="post" action="{{ route('cart.order')}}" class="d-inline mb-3"> 
        @csrf
        <input type="hidden" name="products" value="{{$items}}">
        <input type="hidden" name="total_cost" value="{{\Cart::getTotal()}}">
        <button class="btn btn-success">@lang('Order Now')</button>     
     </form> 
    @endif
     </div>

  
</section>
@endsection