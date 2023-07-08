<header>
    <div class="d-flex flex-row">
    <a href="" class="logo"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
    <div class="dropdown mt-1">
        <a class="nav-link dropdown-toggle text-dark p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            @lang('language') <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
           <li> <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a> </li>
          @endforeach        
        </ul>
      </div>
    </div>
    <ul id="menu">
        <i class="fas fa-x"></i>
        <li><a href="index.html" class="active">home </a></li>
        <li><a href="shop.html" >shop </a></li>
        <li><a href="blog.html">blog </a></li>
        <li><a href="about.html">about</a> </li>
        <li><a href="{{route('products.cart')}}"><i class="fas fa-bag-shopping"></i></a></li>
        @auth
        <div class="dropdown">
            <a class="nav-link dropdown-toggle text-dark p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
     
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
    
             </li>
            </ul>
          </div>
        @else
        <li><a href="{{route('users.login')}}">Login</a> </li>
        @endauth
    </ul>
    <div id="bar" class="mobile">
        <a href="cart.html"><i class="fas fa-bag-shopping"></i></a>
        <i id="bars" class="fas fa-bars"></i>
    </div>
 </header>