<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>

<body>
     
@extends('layouts.app')


@section('content')
 <div class="section intro">
        <div class="image">
            <img src="{{asset('about-img/truck 1.avif')}}" alt="Truck delivering vegetables">
        </div>
        <div class="text">
            <h2>Introduction</h2>
            <p>Welcome to AgriMarketHub! We are a group of passionate individuals who care about healthy food and local farming. Our mission is to deliver fresh vegetables straight from the farm to your doorstep. We started our journey in 2024 with a simple idea: to make fresh, affordable vegetables available to everyone, while supporting hardworking farmers.</p>
            <p><strong>Join us in making food better, fresher, and fairer for all.</strong></p>
        </div>
    </div>
    
    <div class="section mission">
        <div class="text">
            <h2>Our Mission</h2>
            <p>At AgriMarketHub, our mission is to bridge the gap between farmers and families, bringing the freshness of the field straight to your home.</p>
            <p>We strive to empower local farmers by providing a fair and reliable marketplace, while ensuring our customers receive nutritious, chemical-free produce at honest prices.</p>
            <p>Through innovation, integrity, and care for the environment, we are committed to building a healthier community — one delivery at a time.</p>
        </div>
        <div class="image">
          <img src="{{ asset('about-img/mission.jpg') }}" alt="Fresh vegetables assortment">
        </div>
    </div>
    <div class="section background">
        <h2>Background</h2>
        <p>The journey of AgriMarketHub began with a simple yet powerful idea — to make farm-fresh vegetables easily accessible to everyone while uplifting the hardworking farmers behind them.</p>
        <p>In early 2025, we started as a small initiative with a handful of farmers and a big dream. As we saw the challenges farmers faced and the growing demand for healthy food, we knew something had to change.</p>
        <p>With passion, dedication, and the trust of our community, AgriMarketHub grew into a platform that connects rural fields to urban homes. Today, we proudly serve families across the country with the same freshness, honesty, and love that started it all.</p>
        
        <div class="farmers-row">
             <img src="{{asset('about-img/background 1.jpg')}}" alt="Smiling Farmer">
            <img src="{{asset('about-img/background 2.jpg')}}" alt="Basket Lady">
           <img src="{{asset('about-img/background 4.jpg')}}" alt="Farmer with Greens">
        </div>
    </div>
@endsection
</body>