

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
   <link rel="stylesheet" href="{{asset('css/contact.css')}}">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

</head>

@extends('layouts.app')


@section('content')



   <section class="contact-section">
    <div class="container">
        <h2>Contact Us</h2>
        <p>If you have any questions or inquiries, feel free to get in touch with us!</p>
        
       <form method="POST" action="{{ route('contact.store') }}">
              @csrf
            <div class="input-box">
                <label><i class="fas fa-user"></i></label>
                <input type="text" id="name" name="name" placeholder="Full Name" required>
            </div>

            <div class="input-box">
                <label><i class="fas fa-envelope"></i></label>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="input-box">
                <label><i class="fas fa-phone"></i></label>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="input-box message-box">
                <label><i class="fas fa-comment-dots"></i></label>

<textarea id="message" placeholder="Your Message" name="message" required></textarea>
            </div>

            <button type="submit">Send Message</button>
            <p id="form-message" name="form-message" style="color: green; display: none;">Thank you! We'll get back to you soon.</p>
        </form>

        <div class="contact-details">
            <p><strong>Email:</strong> agrimarkethub@gmail.com</p>
            <p><strong>Phone:</strong> ‪+94 71 690 1200‬</p>
            <p><strong>Address:</strong> Ratnapura Rd, Wewelkadhura, Kalawana</p>
        </div>
    </div>
</section>

@endsection

<script src="{{ asset('js/contact.js') }}"></script>




