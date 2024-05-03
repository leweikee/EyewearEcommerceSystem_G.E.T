<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{ asset('resources/css/header.css') }}">
    <!-- <script type="text/javascript" src="{{ asset('resources/js/header.js') }}"></script> -->
</head>
<body>

@if($user->role == 0)
<div class="navbar-cont">
        <nav>
            <ul>
                <li>
                    <!-- <a href="#" id="searchIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a> -->
                    <a href="{{ url('/aboutUs') }}">About Us</a>
                </li>
                <li>
                    <a href="{{ url('/catalogue') }}">Shop</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/catalogue/sunglasses') }}">Sunglasses</a></li>
                        <li><a href="{{ url('/catalogue/contactlens') }}">Contact Lens</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/promotion') }}">Promotion</a>
                </li>
                <li>
                    <a href="{{ url('/') }}"><img class="logo" src="{{ asset('resources/images/G.E.T. logo.jpg') }}" alt="G.E.T. logo"></a>
                </li>
                <li>
                    <!-- <a href="{{ url('/aboutUs') }}">About Us</a> -->
                    <a href="{{ url('/contactUs') }}">Contact</a>
                </li>
                <li>
                    <a href="{{ url('/show_cart') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        @if(count($cart) > 0)
                        <span class="position-relative translate-middle badge border border-light rounded-circle bg-danger p-1" style="width: 22px; height: 22px;">
                            <span>{{ $cart->sum('quantity') }}</span> <!-- Change here to count the number of items -->
                        </span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ url('/custProfile') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="margin: 0px; padding-right: 10px; float: left;">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        {{ $user->name}} 
                            
                    </a>
                    <ul class="dropdown">
                        <li><a href="{{route('custOrderList')}}">Order History</a></li>
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    @elseif($user->role == 1)
<div class="navbar-cont">
        <nav>
            <ul>
                <li>
                    <a href="{{ url('/aboutUs') }}">About Us</a>
                </li>
                <li>
                    <a href="{{ url('/catalogue') }}">Shop</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/catalogue/sunglasses') }}">Sunglasses</a></li>
                        <li><a href="{{ url('/catalogue/contactlens') }}">Contact Lens</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/promotion') }}">Promotion</a>
                </li>
                <li>
                    <a href="{{ url('/admin/home') }}"><img class="logo" src="{{ asset('resources/images/G.E.T. logo.jpg') }}" alt="G.E.T. logo"></a>
                </li>
                <li>
                    <!-- <a href="{{ url('/aboutUs') }}">About Us</a> -->
                    <a href="{{ url('/contactUs') }}">Contact</a>
                </li>
                <li>
                    <a href="{{ url('/admin/manageOrder') }}">
                        Orders
                    </a>
                </li>
                <li>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="margin: 0px; padding-right: 10px; float: left;">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        {{ $user->name}} 
                            
                    </a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    @endif

</body>
</html>
