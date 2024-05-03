<!-- resources/views/products/index.blade.php -->
<link rel="stylesheet" href="{{ asset('/resources/css/index.css') }}">

@extends('catalogue') 

@section('content')
<div class="container mb-4 g-4">
    <hr class="mb-5">
    <!--search-->
    <div class="mb-5 me-4 d-flex justify-content-end align-items-center">
        @if ($categoryName == 'sunglasses' || $categoryName == 'contactlens')
            <div class="search-filter-container bg-white rounded d-flex align-items-center">
                <select id="brandFilter" class="rounded form-control" onchange="location = this.value;" style="width: auto; border: none;">
                    <option value="{{ url('/catalogue/' . $categoryName) }}">All Products</option>
                    @foreach ($brands as $brand)
                        <option value="{{ url('/catalogue/' . $categoryName . '?brandid=' . $brand->brandID) }}" 
                            {{ Request::input('brandid') == $brand->brandID ? 'selected' : '' }}>
                            {{ $brand->brandName }}
                        </option>
                    @endforeach
                </select>
                <label for="brandFilter" class="pe-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </label>
            </div>
        @endif

        @if (empty($categoryName))
            <!-- Filter brands for general catalogue page -->
            <div class="search-filter-container bg-white rounded d-flex align-items-center">
                <select id="brandFilter" class="rounded form-control" onchange="location = this.value;" style="width: auto; border: none;">
                    <option value="{{ url('/catalogue') }}">All Products</option>
                    @foreach ($brands as $brand)
                        <option value="{{ url('/catalogue?brandid=' . $brand->brandID) }}" 
                            {{ Request::input('brandid') == $brand->brandID ? 'selected' : '' }}>
                            {{ $brand->brandName }}
                        </option>
                    @endforeach
                </select>
                <label for="brandFilter" class="pe-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </label>
            </div>
        @endif
    </div>

    <!--products-->
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($item as $x)
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
            @if ($item->onFirstPage())
                <li class="page-item disabled" style="width: fit-content;">
                    <a class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                </li>
            @else
                <li class="page-item" style="width: fit-content;"><a class="page-link" href="{{ $item->previousPageUrl() }}">&laquo;</a></li>
            @endif

            <!-- Pagination Elements -->
            @for ($page = 1; $page <= $item->lastPage(); $page++)
                <li class="page-item {{ $page == $item->currentPage() ? 'active' : '' }}" style="width: fit-content">
                    <a class="page-link" href="{{ $item->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            <!-- Next Page Link -->
            @if ($item->hasMorePages())
                <li class="page-item" style="width: fit-content">
                    <a class="page-link" href="{{ $item->nextPageUrl() }}">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" style="width: fit-content">
                    <a class="page-link" aria-label="next"><span aria-hidden="true">&raquo;</span></a>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endsection
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


