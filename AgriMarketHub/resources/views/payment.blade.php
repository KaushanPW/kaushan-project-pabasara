<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payment Page</title>
  <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>


@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Complete Your Payment</h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        
                        <!-- Payment Method Selection -->
                        <div class="form-group mb-4">
                            <label class="form-label">Payment Method</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="creditCard" value="credit_card" checked>
                                <label class="form-check-label" for="creditCard">
                                    Credit Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="debitCard" value="debit_card">
                                <label class="form-check-label" for="debitCard">
                                    Debit Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="cod" value="cash_on_delivery">
                                <label class="form-check-label" for="cod">
                                    Cash on Delivery
                                </label>
                            </div>
                        </div>

                        <!-- Card Details (shown by default) -->
                        <div id="cardDetails">
                            <div class="form-group mb-3">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" 
                                       name="card_number" placeholder="1234 5678 9012 3456">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" 
                                           name="expiry_date" placeholder="MM/YY">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" 
                                           name="cvv" placeholder="123">
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="cardName">Name on Card</label>
                                <input type="text" class="form-control" id="cardName" 
                                       name="card_name" placeholder="John Doe">
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="border-top pt-3 mb-4">
                            <h5>Order Summary</h5>
                            <p>Order #{{ $order->id }}</p>
                            <p>Total Amount: <strong>LKR {{ number_format($order->total_amount, 2) }}</strong></p>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                Pay Now
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                Back to Order
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/payment.js') }}"></script>
</body>
