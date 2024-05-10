<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.E.T Check Out Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/checkout.css') }}">
    <script src="{{ asset('/resources/js/checkout.js') }}"></script>
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
        <h1 class="fw-bold">CHECKOUT</h1>
    </div>

    <div class="container">
        <hr class="mb-5">

        <!--address section-->
        <div class="container mb-3">
            <div class="row d-flex align-items-center px-3 pt-4" style="background-color: #F9F9F6;">
                <div class="col-auto pe-0 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </div>
                <div class="col">
                    <h5 class="fw-bold mb-0">Delivery Address</h5>
                </div>
                <div class="col-md-12 text-left">
                    <hr>
                </div>
            </div>
            
            <div class="row d-flex align-items-center px-5 pb-2" style="background-color: #F9F9F6;">
                <div class="col-md-4 d-flex fw-bold align-items-center">
                    <div class="col-auto">
                        <span id="recipientName">{{ $deliveryAdd->recipientName }} | </span>
                    </div>
                    <div class="col ms-2 align-items-center d-flex">
                        <div>
                            <span id="recipientPhoneNum">(+60) {{ $deliveryAdd->recipientPhoneNum }}</span>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center" style="margin-left: auto;">
                        <div class="dropdown d-flex" style="display: inline-block; background:none; width: 20px; height: 20px; border: none; box-shadow: none">
                            <button class="dropdown-toggle" type="button" id="updateAddressDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; background: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </button>
                            <ul class="dropdown-menu py-0" id="updateAddressDropdownMenu" aria-labelledby="updateAddressDropdown">
                                <!-- Dropdown content goes here -->
                                @foreach($userAdd as $address)
                                <li>
                                    <a class="dropdown-item px-4 justify-content-start" href="#">
                                        <input class="form-check-input" type="radio" name="selectedAddress" id="address_{{ $address->addressID }}" data-address="{{ json_encode($address) }}" {{ $address->is_default ? 'checked' : '' }} autocomplete="address">
                                        <label for="address_{{ $address->addressID }}" class="form-check-ratio ps-3" style="text-align: left;">
                                            <div>{{ $address->recipientName }} | (+60) {{ $address->recipientPhoneNum }}</div>
                                            <div>{{ $address->address }}, {{ $address->postcode }}, {{ $address->city }}, {{ $address->state }}.</div>
                                        </label>
                                    </a>
                                </li>
                                @endforeach
                                <button style="background-color: #574f44; color: #fff; cursor: pointer;" onmouseover="this.style.backgroundColor='#231f1b'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#574f44';" class="btn rounded px-3 m-3" id="confirmAddressBtn">
                                    Confirm
                                </button>
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
            <!--show delivery address-->
            <div class="row d-flex align-items-center px-5 pb-4" style="background-color: #F9F9F6;" id="selectedAddressInfo">
                <div class="col">
                    <div class="col" id="deliveryAddressContent">
                        <span id="deliveryAddressText">{{ $deliveryAdd->address }}, {{ $deliveryAdd->postcode }}, {{ $deliveryAdd->city }}, {{ $deliveryAdd->state }}.</span>
                    </div>
                </div>
            </div>
        </div>

        <!--ordered item-->
        <div class="row d-flex text-center mx-0 p-3 mb-3" style="background-color: #F9F9F6; color: #000;">
            <div class="col-md-6 fw-bold" style="font-family: Georgia, serif;">PRODUCT</div>
            <div class="col-md-2 fw-bold" style="font-family: Georgia, serif;">PRICE</div>
            <div class="col-md-2 fw-bold" style="font-family: Georgia, serif;">QUANTITY</div>
            <div class="col-md-2 fw-bold" style="font-family: Georgia, serif;">SUBTOTAL</div>
            <hr class="my-3">

            @foreach($checkoutItem as $selectItem)
                <div class="row mt-3 mx-0 pe-0">
                    <!--item details-->
                    <div class="col-md-6 mb-2 d-flex align-items-center">
                        <div class="col-md-1 d-flex align-items-center justify-content-center">
                            {{ $loop->index + 1 }}
                        </div>
                        <div class="col-md-4 d-flex align-items-center ps-3">
                            <div class="rounded-4" style="border: 2px solid #ddd; width: 150px; height; 150px;">
                                <a href="{{ url('/product_details/' . $selectItem->Product_id) }}">
                                    <img src="{{ asset('product/' . $selectItem->image) }}" alt="{{ $selectItem->name }}" class="img-fluid">    
                                </a>
                            </div>      
                        </div>
                        <div class="col-md-7 ms-2" style="text-align: left;">
                            <div class="fw-bold mb-2" style="font-size: 17px">
                                <a href="{{ url('/product_details/' . $selectItem->Product_id) }}" style="text-decoration: none; apperance: none; color: #000">
                                    {{ $selectItem->cartName }}
                                </a>
                            </div>

                            @if($selectItem->colour)
                                <div>Colour: {{ $selectItem->colour }} </div>
                            @endif

                            @if($selectItem->powers)
                                <div>Power: {{ $selectItem->powers }}</div>
                            @endif
                        </div>
                    </div>

                    <!--item price-->
                    <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">  
                        <div class="text-center">RM {{ number_format($selectItem->price, 2) }}</div>
                    </div>

                    <!--item order quantity-->
                    <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">
                        <div class="text-center">{{ $selectItem->quantity }}</div>
                    </div>

                    <!--item subtotal-->
                    <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">
                        <div class="text-center fw-bold">RM {{ $selectItem->subtotal}}</div>
                    </div>

                    @if (!$loop->last)
                        <div class="col-md-12 text-center">
                            <hr class="mx-4">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        
        <form method="post" action="{{ route('checkoutOrder') }}">
        @csrf
        <!--order summary-->
        <div class="row d-flex align-items-center mx-0 mb-3">
            <div class="col-8"> <!-- Adjust the column size as needed -->
            <!-- Content on the left side (if any) -->
            </div>
            <div class="col-4 d-flex flex-column justify-content-end p-3 px-4 mb-3" style="background-color: #F9F9F6; color: #000;">
                <div class="fs-5 fw-bold me-3 text-right d-flex justify-content-end">Order Summary</div>
                <hr class="my-2">
                <div class="row mt-2 px-3">
                    <div class="col-md-6">
                        <div class="col">Merchandise Subtotal:</div>
                        <div class="col mt-2">Shipping Total:</div>
                        <div class="col mt-2">Total Payment:</div>
                    </div>
                    <div class="col-md-6">
                        <div class="col text-end"><span id="merchandiseSubtotal">RM {{ number_format($totalPrice, 2) }}</span></div>
                        <div class="col text-end mt-2"><span id="shippingFee">RM {{ number_format($shippingFee, 2) }}</span></div>
                        <div class="col text-end mt-2 fw-bold fs-5"><span id="totalPayment" style="color: red;">RM {{ number_format($totalPayment, 2) }}</span></div>
                        <!-- hidden input to pass price and shipping fee -->
                        <input type="hidden" id="totalPayment" name="totalPayment" value="{{ $totalPayment }}">
                        <input type="hidden" id="shippingFee" name="shippingFee" value="{{ $shippingFee }}">
                        <input type="hidden" name="checkoutItem" value="{{ json_encode($checkoutItem) }}">
                        <input type="hidden" name="selectedAddressID" id="selectedAddressID" value="" data-address-id="<?= $deliveryAdd->addressID ?>">
                        <input type="hidden" name="power[]" value="{{ $selectItem->powers }}" class="form-control">
                    </div>
                </div>
                <div class="row my-2 px-3">
                    <div class="col-md-12">
                        <hr>
                        <div class="fw-semibold mb-2">Payment Method:</div>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="paymentMethod" id="paymentMethod" class="form-check-input" checked>
                            <label for="paymentMethod" name="paymentMethod" class="ms-3 align-items-center">Credit/Debit Card</label>
                        </div>
                        <hr>
                    </div>
                    <button type="submit" class="btn btn-lg fw-bold px-3 rounded-0 d-flex justify-content-center" style="background-color: #ea8f7b;" onmouseover="this.style.backgroundColor='#de5647'; this.style.color='#000';" onmouseout="this.style.backgroundColor='#ea8f7b';">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>