<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T My Order Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">
        
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
            <h1 class="fw-bold">MY ORDERS</h1>
        </div>

        @if($orders->isNotEmpty())
        <div class="container">
            <hr class="mb-5">

            <div
                class="row text-center mx-0 p-3 mb-3"
                style="background-color: #574f44; color: #fff; font-family: Georgia, serif;">
                <div class="col-md-3">Order ID</div>
                <div class="col-md-3">Tracking No</div>
                <div class="col-md-3">Ordered At</div>
                <div class="col-md-3">Status</div>
            </div>
        </div>

        @foreach($orders as $order)
        <div class="container text-center">
            <div class="row py-4 px-3 mt-1 d-flex align-items-center" 
                style="background-color: #F9F9F6; margin-left: 1px; margin-right: 1px">
                <div class="col-md-3">{{$order->orderID}}</div>
                <div class="col-md-3">{{$order->trackingID}}</div>
                <div class="col-md-3">{{$order->order_date}}</div>
                <div class="col-md-3">
                    <a href="{{url('viewOrders/'.$order->orderID)}}" style="color: #574f44;" class="align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        @else
        <div class="container mt-4 justify-content-center">
            <div class="fs-5 text-center py-5" style="border: 1px solid #574f44;">
                <div class="mb-3">No Orders Available.<br></div>
                Click <a href="{{ url('/catalogue') }}" class="fw-bold" style="color: #574f44">here</a> to continue
                shopping.
            </div>
        </div>
        @endif



        <!-- <div class="py-3 py-md-5">
        <div class="container">
        <div class="row">
        <div class="shadow bg-brown p-3 rounded">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead class="text-center">
                <th>Order ID</th>
                <th>Username</th>
                <th>Tracking No</th> -->
                <!--<th>Payment Method</th>-->
                <!-- <th>Ordered Time</th>
                <th>Order Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="text-center">
                        <td>{{$order->orderID}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->trackingID}}</td> -->
                        <!--<td>{{$order->paymentMethod}}</td>-->
                        <!-- <td>{{$order->order_date}}</td>
                        <td>{{$order->status}}</td>
                        <td><a href="{{url('viewOrders/'.$order->orderID)}}" style="text-decoration: none;" class="align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Orders Available</td>

                        </td>

                    </tr>
                @endforelse
            </tbody>

        </table>
        </div>
        </div>
        </div>
        </div>
        </div> -->
        
    </body>

</html>
