
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>



@extends('layouts.app')


   
@section('content')

 
    <section id="home" class="home-section">
        <div class="home-content">
            <h1>Fresh Vegetables Delivered to Your Doorstep</h1>
            <p>Quality, Convenience, and Freshness Guaranteed! Order Now and Enjoy the Taste of Nature!</p><br>
              <a href="{{ url('/order') }}" class="order-btn">Order Now</a>       
             </div>
        <div class="home-image">
             <img src="{{ asset('images/home 1.jpg') }}" alt="Fresh vegetables" class="slide active"> 
                      
        </div>
    </section>

  
    
<div class="search-section">
  <div class="search-text" id="typewriter">
    <p></p>
  </div>

  <div class="search-bar-wrapper">
    <input type="text" placeholder="Search..." class="search-input" id="searchInput">
    <button class="search-button" >Search</button>
  </div>
</div>


    
    <section class="category-section">
        <div class="all-products">
    
            <div class="product-grid-1">
                <div class="product-card">
                  <img src="{{ asset('images/garlic.avif') }}" alt="Garlic">
                  <h3>Garlic</h3>
                  <p>1Kg<br>LKR 160.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
               
                <div class="product-card">
                  <img src="{{ asset('images/tomato.avif') }}" alt="Tomato">
                  <h3>Tomato</h3>
                  <p>1Kg<br>LKR 160.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
      
                <div class="product-card">
                  <img src="{{ asset('images/cabbage.jpg') }}" alt="Cabbage">
                  <h3>Cabbage</h3>
                  <p>1Kg<br>LKR 160.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
      
                <div class="product-card">
                  <img src="{{ asset('images/carrot.webp') }}" alt="Carrot">
                  <h3>Carrot</h3>
                  <p>1Kg<br>LKR 160.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
              
                <div class="product-card">
                  <img src="{{ asset('images/cucumber.webp') }}" alt="Cucumber">
                  <h3>Cucumber</h3>
                  <p>1Kg<br>LKR 140.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
                <div class="product-card">
                   <img src="{{ asset('images/potato 2.avif') }}" alt="Potato">
                  <h3>Potato</h3>
                  <p>1Kg<br>LKR 120.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
                <div class="product-card">
                   <img src="{{ asset('images/leeks.jpg') }}" alt="Leeks">
                  <h3>Leeks</h3>
                  <p>1Kg<br>LKR 160.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
                <div class="product-card">
                  <img src="{{ asset('images/onion 2.jpg') }}" alt="Onion">
                  <h3>Onion</h3>
                  <p>1Kg<br>LKR 160.00</p>
                 <button onclick="window.location.href='{{ url('/order') }}'">Order Now</button>
                </div>
              </div>
</div>
    </section>
    @endsection
<script src="{{ asset('js/home.js') }}"></script>



