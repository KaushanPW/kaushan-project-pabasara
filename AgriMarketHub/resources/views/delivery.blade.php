<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Form</title>
    <link rel="stylesheet" href="{{ asset('css/delivery.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h2>Delivery Information</h2>

        @if(session('success'))
            <p id="form-message" style="color: green;">{{ session('success') }}</p>
        @endif

      <form method="POST" action="{{ route('delivery.store') }}">
    @csrf
    <input type="hidden" name="order_id" value="{{ session('order_id') }}">

    <div class="input-group">
        <label><i class="fas fa-user"></i> Full Name</label>
        <input type="text" name="customer_name" required>
    </div>

    <div class="input-group">
        <label><i class="fas fa-phone"></i> Phone Number</label>
        <input type="tel" name="customer_phone" required>
    </div>

    <div class="input-group">
        <label><i class="fas fa-map-marker-alt"></i> Delivery Address</label>
        <textarea name="delivery_address" rows="3" required></textarea>
    </div>

    <div class="input-group">
        <label><i class="fas fa-calendar-alt"></i> Delivery Date</label>
        <input type="date" name="delivery_date" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection