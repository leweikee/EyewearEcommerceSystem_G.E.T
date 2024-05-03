<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T Template Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">
        <style>
            .container{
                margin-top: 50px;
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

        <div class="text-center mt-5 mb-4">
            <h1 class="fw-bold mb-4">PROMOTIONS</h1>
        </div>

        <!-- <div class="container mb-4 g-4">
            <hr class="mb-5">
        </div> -->

        <div class="container mb-4 g-4">
            <hr class="mb-5">
            

            <!--products-->
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($promoItems as $x)
                    <div class="col mb-5">
                        <div class="content d-flex flex-column h-100">
                            <a href="{{ url('/product_details/' . $x->itemID) }}" style="text-decoration: none; apperance: none;">
                                <div class="card rounded-4" style="width: 24rem; height: 30em; background-color: #F9F9F6;">
                                    <div class="content-overlay rounded-4"></div>
                                    <img class="content-image rounded-top-4" src="{{ asset('product/' . $x->image) }}" alt="{{ $x->name }}" style="height: 65%">
                                    <div class="content-details fadeIn-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16" style="color:white;">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <p class="card-text mb-3">{{ $x->brandName }}</p>
                                        <h5 class="card-title fw-bold mb-3">{{ $x->name }}</h5>
                                        <div class="d-flex">
                                            @if ($x->disPrice)
                                                <h5 class="fw-semibold mb-1 me-3" style="color: red;">RM {{ number_format($x->disPrice, 2) }}</h5>
                                                <p class="text-decoration-line-through me-1">RM {{ number_format($x->price, 2) }}</p>
                                            @else
                                                <h5 class="fw-semibold me-3" style="color: red;">RM {{ number_format($x->price, 2) }}</h5>
                                            @endif
                                        </div>
                                    </div> 
                                </div>  
                            </a> 
                        </div>
                    </div>    
                @endforeach
            </div>

            <!-- Pagination Links -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mx-5" style="height: 40px;">
                    @if ($promoItems->onFirstPage())
                        <li class="page-item disabled" style="width: fit-content;">
                            <a class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                        </li>
                    @else
                        <li class="page-item" style="width: fit-content;"><a class="page-link" href="{{ $promoItems->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    <!-- Pagination Elements -->
                    @for ($page = 1; $page <= $promoItems->lastPage(); $page++)
                        <li class="page-item {{ $page == $promoItems->currentPage() ? 'active' : '' }}" style="width: fit-content">
                            <a class="page-link" href="{{ $promoItems->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    <!-- Next Page Link -->
                    @if ($promoItems->hasMorePages())
                        <li class="page-item" style="width: fit-content">
                            <a class="page-link" href="{{ $promoItems->nextPageUrl() }}">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" style="width: fit-content">
                            <a class="page-link" aria-label="next"><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        

    </body>

</html>
