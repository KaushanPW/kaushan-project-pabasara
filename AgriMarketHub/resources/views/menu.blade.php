@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="data:,">

</head>
<body>
@section('content')
<nav class="second-nav">
    <div class="left-icons">
        <a href="{{ route('cart.view') }}" title="Cart">
            <i class='bx bxs-cart'></i>
            <span>{{ session('cart') ? count(session('cart')) : 0 }}</span>
        </a>
        <a href="{{ url('/contact') }}" title="Message"><i class='bx bxs-message'></i></a>
    </div>
    
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-bar">
        <button class="search-btn">Search</button>
    </div>

    <div class="search-hint">
        <p id="typewriter"></p>
    </div>
</nav>

<section class="description-section">
    <div class="description-text">
        <p>&#128154; Discover Nature’s Freshness on Your Plate  
            Explore our handpicked selection of farm-fresh vegetables, bursting with flavor and nutrients.
        </p>  
        <h3>Taste the freshness. Feel the goodness.</h3>
    </div>
    <div class="description-image">
        <img src="{{ asset('menu-img/Vegetables.jpg') }}" alt="Fresh vegetables">
    </div>
</section>

<div class="product-section">
    <h2>Fresh Vegetables</h2>

    <div class="set-grid">
        <div class="product-grid-1">
            @php
                $products = [
                    ['name' => 'Garlic', 'price' => 160, 'image' => 'images/garlic.avif'],
                    ['name' => 'Tomato', 'price' => 150, 'image' => 'images/tomato.avif'],
                    ['name' => 'Cabbage', 'price' => 140, 'image' => 'images/cabbage.jpg'],
                    ['name' => 'Carrot', 'price' => 130, 'image' => 'images/carrot.webp'],
                    ['name' => 'Cucumber', 'price' => 140, 'image' => 'images/cucumber.webp'],
                    ['name' => 'Potato', 'price' => 120, 'image' => 'images/potato 2.avif'],
                    ['name' => 'Leeks', 'price' => 130, 'image' => 'images/leeks.jpg'],
                    ['name' => 'Onion', 'price' => 110, 'image' => 'images/onion 2.jpg'],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
                    <h3>{{ $product['name'] }}</h3>
                    <p>1Kg<br>LKR {{ $product['price'] }}.00</p>
                   <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $loop->index + 1 }}">
    <input type="hidden" name="name" value="{{ $product['name'] }}">
    <input type="hidden" name="price" value="{{ $product['price'] }}">
    <button type="submit">Add to Cart</button>
</form>

                </div>
            @endforeach
        </div>
    </div>

    <br><br><br>

    <div id="more-products" class="product-grid-2" style="display: none;">
        @php
            $moreProducts = [
                ['name' => 'Radish', 'price' => 160, 'image' => 'menu-img/radish.webp'],
                ['name' => 'Peppers', 'price' => 100, 'image' => 'menu-img/pepper.jpg'],
                ['name' => 'Cussava', 'price' => 140, 'image' => 'menu-img/cussava.webp'],
                ['name' => 'Ginger', 'price' => 160, 'image' => 'menu-img/ginger.jpg'],
                ['name' => 'Squash', 'price' => 140, 'image' => 'menu-img/squash.jpg'],
                ['name' => 'Okra', 'price' => 120, 'image' => 'menu-img/okra.webp'],
                ['name' => 'Long Hot Peppers', 'price' => 120, 'image' => 'menu-img/long hot pepper.webp'],
                ['name' => 'Beans', 'price' => 160, 'image' => 'menu-img/beans.jpg'],
            ];
        @endphp

        @foreach ($moreProducts as $product)
            <div class="product-card">
                <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
                <h3>{{ $product['name'] }}</h3>
                <p>1Kg<br>LKR {{ $product['price'] }}.00</p>
               <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $loop->index + 1 }}">
    <input type="hidden" name="name" value="{{ $product['name'] }}">
    <input type="hidden" name="price" value="{{ $product['price'] }}">
    <button type="submit">Add to Cart</button>
</form>

            </div>
        @endforeach
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button id="showMoreBtn">Show More</button>
        <button id="showLessBtn" style="display: none;">Show Less</button>
    </div>

</div>

<script src="{{ asset('js/menu.js') }}"></script>

</body>
</html>

@endsection
