<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('resources/css/header.css') }}">
    <title>G.E.T Shopping Cart Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/showCart.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="{{ asset('/resources/js/showCart.js') }}"></script>
</head>

<body>
    <div class="sticky-top">
        @auth
        <!-- User is logged in -->
        @include('header_success')
        @else
        <!-- User is not logged in -->
        @include('header')
        @endauth
    </div>

    <div class="text-center my-5">
        <h1 class="fw-bold">SHOPPING CART</h1>
    </div>

    <!-- Shopping Cart Header -->
    <div class="container">
        <hr class="mb-5">

        @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 1500);
        </script>
        <!-- Print error if no address yet -->
        @elseif(session('error'))
        <div id="error-alert" class="alert alert-danger">
            {!! session('error') !!}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-alert').style.display = 'none';
            }, 1500);
        </script>
        @endif

        <!-- update msg display time in cart -->
        <script>
            window.onload = function() {
                setTimeout(function() {
                    var alerts = document.querySelectorAll('.alert');
                    for (var i = 0; i < alerts.length; i++) {
                        alerts[i].style.display = 'none';
                    }
                }, 3000);
            };
        </script>

        <div
            class="row text-center mx-0 p-3 mb-3"
            style="background-color: #574f44; color: #fff; font-family: Georgia, serif;">
            <div class="col-md-6">PRODUCT</div>
            <div class="col-md-2">PRICE</div>
            <div class="col-md-2">QUANTITY</div>
            <div class="col-md-2">SUBTOTAL</div>
        </div>
    </div>

    <!-- check if the cart is empty or not -->
    @if ($cart->isNotEmpty())
    <div class="container mb-5">
        @foreach($cart->sortByDesc('updated_at') as $cartItem)
        @php
        $item = \App\Models\Item::find($cartItem->Product_id);
        @endphp
        <div class="row pt-5 pb-4 mb-3 px-3 cartpage"
            style="background-color: #F9F9F6; margin-left: 1px; margin-right: 1px">
            <!-- product details -->
            <div class="col-md-6 d-flex align-items-center pe-0">
                <div class="col-md-5 d-flex align-items-center">
                    <div class="cart-checkbox me-4 ms-3">
                        <input type="checkbox" class="rounded" name="selectedItems[]" value="{{ $cartItem->id }}"
                            id="checkbox-{{ $cartItem->id }}">
                        <label for="checkbox-{{ $cartItem->id }}"></label>
                    </div>
                    <div class="rounded-4" style="border: 2px solid #ddd; width: 180px; height; 180px;">
                        <a href="{{ url('/product_details/' . $cartItem->Product_id) }}">
                            <img src="{{ asset('product/' . $cartItem->image) }}" alt="{{ $cartItem->name }}"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-7 mt-3 ms-3">
                    <div class="fw-bold mb-2" style="font-size: 17px">
                        <a href="{{ url('/product_details/' . $cartItem->Product_id) }}"
                            style="text-decoration: none; apperance: none; color: #000">
                            {{ $cartItem->cartName }}
                        </a>
                    </div>

                    @if($cartItem->colour)
                    <div>Colour: {{ $cartItem->colour }} </div>
                    @endif

                    @if($cartItem->powers)
                    <div>Power: {{ $cartItem->powers }}</div>
                    @endif
                </div>
            </div>

            <!-- Hidden input field for the current cart item ID -->
            <input type="hidden" name="selectedItems[]" value="{{ $cartItem->id }}">

            @php
            // Add the current cart item ID to the selectedItemIds array
            $selectedItemIds[] = $cartItem->id;
            @endphp
            <!-- unit price -->
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <div class="text-center fw-bold">RM {{ number_format($cartItem->price, 2) }}</div>
            </div>

            <input type="hidden" class="id" value="{{ $cartItem->id }}">
            <!-- quantity -->
            <div class="col-md-2 d-flex align-items-center" style="justify-content: center;">
            <form action="{{ url('/update_cart/' . $cartItem->id) }}" method="POST"
                    class="update-cart-form">
                    @csrf
                    <div class="rounded-pill"
                        style="width: 70%; background-color: white; border: 1px solid black; overflow: hidden;">
                        <div class="d-flex align-items-center quantity">
                            <input type="hidden" name="quantity" class="hidden-quantity"
                                value="{{ $cartItem->quantity }}">
                            <button type="button" class="btn btn-light btn-minus decrement-btn changeQuantity">-</button>
                            <input type="text" name="quantity" data-id="{{ $cartItem->id }}"
                                value="{{ $cartItem->quantity }}"
                                class="qty-input form-control text-center quantity-input"
                                style="border: none; appearance: none;">
                            <button type="button"
                                class="btn btn-light btn-plus increment-btn changeQuantity">+</button>
                            <button type="submit" class="hidden-submit-btn" style="display: none;"></button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- subtotal -->
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <div class="subtotal text-center fw-bold" data-id="{{ $cartItem->id }}" data-price="{{ $cartItem->price }}"
                    data-quantity="{{ $cartItem->quantity }}" style="color: red;">
                    RM {{ number_format($cartItem->subtotal, 2) }}
                </div>
            </div>

            <!-- delete action -->
            <div class="d-flex align-items-center justify-content-end pe-3">
                <a class="delete" href="{{ url('/remove_cart/' . $cartItem->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-trash3-fill"
                        viewBox="0 0 16 16" style="color: #362f27;">
                        <path
                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach

        <!-- toggle checkout -->
        <div class="sticky-bottom ps-5">
            <div class="row align-items-center ">
                <div class="col-md-8 py-3">
                    <!-- Checkbox to check/uncheck all products -->
                    <div class="d-flex align-items-center">
                        <div class="all-checkbox pt-1">
                            <input type="checkbox" class="rounded" id="selectAll">
                            <label for="selectAll"></label>
                        </div>
                        <div class="ms-3 fw-semibold py-1" style="color: #fff">All Products</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-items-center">
                    <!-- Section to show the number of checkbox checked and sum up the subtotal -->
                    <h4 class="me-4 mb-0">Total: <span id="totalAmount">RM 0.00</span></h4>
                    <form action="{{ route('checkout', ['selectedItems' => implode(',', $selectedItemIds)]) }}"
                        method="get" class="checkout-form">
                        @csrf
                        @foreach($selectedItemIds as $itemId)
                        <input type="hidden" name="selectedItems[]" value="{{ $itemId }}">
                        @endforeach
                        <!-- Checkout button -->
                        <button type="submit" class="px-5 py-4 fw-bold checkout-btn">
                            CHECKOUT (<span id="selectedItemCount">0</span>)
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="container mt-4 justify-content-center">
        <div class="fs-5 text-center py-5" style="border: 1px solid #574f44;">
            <div class="mb-3">You have no items in your shopping cart.<br></div>
            Click <a href="{{ url('/catalogue') }}" class="fw-bold" style="color: #574f44">here</a> to continue
            shopping.
        </div>
    </div>
    @endif
</body>

</html>

