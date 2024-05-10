
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Home Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('\resources\css\default.css') }}">
    <style>
        .row {
            display: grid;
            grid-template-columns: auto auto;
            margin: 15px;
        }

        .col-md-3 {
            width: 60%;
            margin: 15px auto ;
            /* padding: 50px; */
        }

        .container {
            background-color: #fff;
            border-radius: 25px;
            width: 90%;
            height:80%;
            margin: auto;
            margin-top: 50px;
        }

        .func {
            display: flex;
            justify-content: space-around;
        }

        .b2 {
            width: 15%;
            padding: 10px;
        }
    </style>
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

        <!-- <h1>Admin Dashboard</h1> -->

        <!-- <hr> -->
        <div class="container">
        <h1 class="text-center pt-5">Overview</h1>
        
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card card-body d-flex text-white mb-3 text-center py-5" style="background-color: #362f27; opacity: 0.6;" 
                    onmouseover="this.style.opacity=1;" onmouseout="this.style.opacity=0.6;">
                    <a href="{{route('admin.manageOrders')}}" class="text-white align-items-center justify-content-center" style="text-decoration: none;">
                        <label>Total Orders</label>
                        <h1>{{$totalOrder}}</h1>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body d-flex text-white mb-3 text-center py-5" style="background-color: #362f27; opacity: 0.6;" 
                    onmouseover="this.style.opacity=1;" onmouseout="this.style.opacity=0.6;">
                    <a href="{{route('admin.manageOrders')}}" class="text-white align-items-center justify-content-center" style="text-decoration: none;">
                        <label>Today Orders</label>
                        <h1>{{$todayOrder}}</h1>
                    </a>
                </div>
            </div>
        <!-- </div> -->

        <!-- <hr> -->

        <!-- <div class="row"> -->
             <div class="col-md-3">
                <div class="card card-body d-flex text-white mb-3 text-center py-5" style="background-color: #362f27; opacity: 0.6;" 
                    onmouseover="this.style.opacity=1;" onmouseout="this.style.opacity=0.6;">
                    <a href="{{route('admin.manageProducts')}}" class="text-white align-items-center justify-content-center" style="text-decoration: none;">
                        <label>Total Products</label>
                        <h1>{{$totalProducts}}</h1>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body d-flex text-white mb-3 text-center py-5" style="background-color: #362f27; opacity: 0.6;" 
                    onmouseover="this.style.opacity=1;" onmouseout="this.style.opacity=0.6;">
                    <a href="{{route('admin.manageBrands')}}" class="text-white align-items-center justify-content-center" style="text-decoration: none;">
                        <label>Total Brands</label>
                        <h1>{{$totalBrands}}</h1>
                    </a>
                </div>
            </div>
        </div>
        <hr class="container mb-5">
        <h1 class="text-center pt-2 pb-3 mb-5">Functions</h1>
        <div class="func">
        <button type="button" class="btn btn-success b2 px-5 py-2" onclick="redirectToManageProduct()">Manage Product</button>
        <button type="button" class="btn btn-success b2 px-5 py-2" onclick="redirectToManageBrand()">Manage Brand</button>
        <!-- new changes -->
        <button type="button" class="btn btn-success b2 px-5 py-2" onclick="redirectToManageOrders()">Orders</button>
        <button type="button" class="btn btn-success b2 px-5 py-2" onclick="redirectToManageReport()">Report</button>
        <!-- <button type="button" class="btn btn-danger b2" onclick="redirectToManagePromotion()">Promotion</button> -->
        <!-- <button type="button" class="btn btn-danger b2" onclick="redirectToManageFAQ()">FAQ</button> -->
        </div>

        <hr>
        </div>

        <script>
            function redirectToManageProduct() {
                window.location.href = "{{ route('admin.manageProducts') }}";
            }

            function redirectToManageBrand() {
                window.location.href = "{{ route('admin.manageBrands') }}";
            }

            function redirectToManageOrders() {
                window.location.href = "{{route('admin.manageOrders')}}";
            }

            function redirectToManageReport() {
                window.location.href = "{{ url("/admin/viewReport") }}";
            }

            function redirectToManagePromotion() {
                window.location.href = "{{ url('/promotion') }}";
            }

            function redirectToManageFAQ() {
                window.location.href = "";
            }
        </script>
    </body>
</html>
