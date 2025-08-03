@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

@section('content')
<br><br>
<div class="container">
  <div class="form-section">
    <h2>Place Your Order</h2>
    <form action="{{ route('order.store') }}" method="POST">
      @csrf
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="customer_name" placeholder="Customer Name" required>
      </div>
      <div class="input-group">
        <i class="fas fa-phone"></i>
        <input type="tel" name="phone" placeholder="Phone Number" required>
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email Address">
      </div>
      <div class="input-group">
        <i class="fas fa-calendar-alt"></i>
        <input type="date" name="order_date" required>
      </div>
      <div class="input-group">
        <i class="fas fa-comment-dots"></i>
        <textarea name="delivery_address" placeholder="Enter your delivery address"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit Order</button>
    </form>
  </div>
  <div class="image-section"></div>
</div>
@endsection
