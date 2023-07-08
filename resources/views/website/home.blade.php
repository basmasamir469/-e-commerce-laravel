@extends('website.main')
@section('content')
<section id="hero" style="background-image: url('{{asset("/front/images/hero4.png")}}');">
    <div class="content">
        <h4>Trade-in-offer</h6>
            <h2>Super value deals</h2>
            <h1>On all products</h1>
            <p>save more with coupons& up to 70%off!</p>
            <button style=" background-image: url('{{asset("/front/images/button.png")}}')">Shop Now</button>
    </div>
</section>
<section id="features">
    <div class="feature"><img src="{{asset('front/images/features/f1.png')}}" alt="f1"> 
    <h6>free shipping</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f2.png')}}" alt="f2"> 
    <h6>online order</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f3.png')}}" alt="f3"> 
    <h6>save money</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f4.png')}}" alt="f4"> 
    <h6>promotions</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f5.png')}}" alt="f5"> 
    <h6>happy sell</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f6.png')}}" alt="f6"> 
    <h6>f24/7support</h6></div>
</section>
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


<section id="banner" style="background-image: url('{{asset("/front/images/banner/b2.jpg")}}');">
    <h5>repair services</h5>
    <h1>up to <span>70% off</span> - all t-shirts & accessories</h1>
    <button>Explore more</button>
</section>

<section class="featured-products">
    <h2>New Arrivals</h2>
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
            <img src="{{asset('front/images/products/n1.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n2.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n3.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n4.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n5.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n6.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n7.jpg')}}" alt="">
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
            <img src="{{asset('front/images/products/n8.jpg')}}" alt="">
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

<section id="action-banners">
<div class="banner1" style="background-image: url('{{asset("/front/images/banner/b17.jpg")}}');">
    <h5>crazy deals</h5>
    <h2>buy 1 get 1 free</h2>
    <p>the best classic dress is on sale at cara</p>
    <button>learn more</button>
</div>
<div class="banner2" style="background-image: url('{{asset("/front/images/banner/b10.jpg")}}');">
    <h5>spring/summer</h5>
    <h2>upcomming season</h2>
    <p>the best classic dress is on sale at cara</p>
    <button>collection</button>
</div>
<div id="action-banners2">
    <div class="banner3" style="background-image: url('{{asset("/front/images/banner/b7.jpg")}}');">
        <h2>season sale</h2>
        <h6>winter collection-50% off</h6>
    </div>
    <div class="banner4" style="background-image: url('{{asset("/front/images/banner/b4.jpg")}}');">
        <h2>new footwear collection</h2>
        <h6>spring / summer 2022</h6>
    </div>
    <div class="banner5" style="background-image: url('{{asset("/front/images/banner/b18.jpg")}}');">
        <h2>T-shirts</h2>
        <h6>new trendy prints</h6>
    </div>
</div>
</section>
<section id="newsletters" style="background-image: url('{{asset("/front/images/banner/b14.png")}}');">
<div class="new1">
   <h2>sign up for newsletters</h2> 
   <p>get email updates about your latest shop and <span>special offers</span></p>
</div>
<div class="new2">
<form action="">
    <input type="text" placeholder="your email address">
    <input type="submit" value="sign up">
</form>
</div>
</section>
@endsection