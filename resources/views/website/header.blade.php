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
        <li><a href="{{route('home')}}" class="active">home </a></li>
        @auth

        <li class="dropdown dropdown-notifications" id="bell">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="position-absolute top-0  start-170 translate-middle badge rounded-pill bg-danger notify-count"  data-count="0">
                0
                <span class="visually-hidden"></span>
              </span>    
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <div id="notify-container" user_id={{auth()->user()->id}}>
             <a href="#" class="dropdown-item">
             @lang('no notifications')
            </a>
            {{--
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div> --}}
            </div>
            </div>
            </li>
    @endauth
        <li><a href="{{route('home')}}" >shop </a></li>
        <li><a href="{{route('home')}}">blog </a></li>
        <li><a href="{{route('home')}}">about</a> </li>
        <li><a href="{{route('products.cart')}}"><i class="fas fa-bag-shopping">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ \Cart::getTotalQuantity()}}
            <span class="visually-hidden"></span>
          </span>
        </i></a></li>
        @auth
        <div class="dropdown d-flex" style="margin-left:1.5rem;">
            <img class="rounded-circle" src="{{auth()->user()->image?auth()->user()->image:auth()->user()->avatar}}" width="30px" height="30px">
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