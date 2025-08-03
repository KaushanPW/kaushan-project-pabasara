
<head>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>


@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Payment Successful</h3>
                </div>
                
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    <h4 class="mb-3">Thank you for your payment!</h4>
                    <p class="lead">Your transaction has been completed successfully.</p>
                    
                    <div class="border-top pt-4 mt-4">
                        <p>Payment ID: <strong>{{ $payment->id }}</strong></p>
                        <p>Amount Paid: <strong>LKR {{ number_format($payment->amount, 2) }}</strong></p>
                        <p>Date: <strong>{{ $payment->created_at->format('M d, Y h:i A') }}</strong></p>
                    </div>
                    
                    <div class="mt-5">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-home"></i> Return Home
                        </a>
                        <a href="{{ route('orders.show', $payment->order_id) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-receipt"></i> View Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection