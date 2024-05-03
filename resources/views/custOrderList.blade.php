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
        <div class="py-3 py-md-5">
        <div class="container">
        <div class="row">
        <div class="shadow bg-brown p-3">
        <h1 class="mb-4">My Orders</h1>
        <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <th>Order ID</th>
                <th>Username</th>
                <th>Tracking No</th>
                <!--<th>Payment Method</th>-->
                <th>Ordered Time</th>
                <th>Order Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{$order->orderID}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->trackingID}}</td>
                        <!--<td>{{$order->paymentMethod}}</td>-->
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->status}}</td>
                        <td><a href="{{url('viewOrders/'.$order->orderID)}}" class="btn btn-primary btn-sm">View</a></td>
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
        </div>
        
    </body>

</html>
