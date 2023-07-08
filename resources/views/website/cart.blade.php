@extends('website.main')
@section('content')
<section class="featured-products">
    <h2>featured products</h2>
    <p>summer collection new modern design</p>
    <div class="products">
        @foreach ($products as $product )
        <div class="product">
            <img src="{{$product->image}}" alt="">
            <h6>{{$product->category->category_name}}</h6>
            <h3>{{$product->product_name}}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>{{$product->price}}</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div>
        @endforeach


        {{-- <div class="product">
            <img src="{{asset('front/images/products/f2.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}

        {{-- <div class="product">
            <img src="{{asset('front/images/products/f3.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}

        {{-- <div class="product">
            <img src="{{asset('front/images/products/f4.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}

        {{-- <div class="product">
            <img src="{{asset('front/images/products/f5.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}

        {{-- <div class="product">
            <img src="{{asset('front/images/products/f6.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}

        {{-- <div class="product">
            <img src="{{asset('front/images/products/f7.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}

        {{-- <div class="product">
            <img src="{{asset('front/images/products/f8.jpg')}}" alt="">
            <h6>adidas</h6>
            <h3>cartoon astronout t-shirts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>$78</span> <a href="#"><i class="fas fa-cart-shopping"></i></a>
         </div>
            
        </div> --}}
    </div>
   
</section>
@endsection