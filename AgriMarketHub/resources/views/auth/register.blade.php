<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Create Account</h1>
                <p>Join our community today</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <!-- Username Field -->
                <div class="input-group">
                    <i class='bx bxs-user'></i>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                           placeholder="Username" autocomplete="username">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="input-group">
                    <i class='bx bxs-envelope'></i>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                           placeholder="Email Address" autocomplete="email">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
                    <input id="password" type="password" name="password" required 
                           placeholder="Password" autocomplete="new-password">
                    <i class='bx bxs-show toggle-password' onclick="togglePassword('password')"></i>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                           placeholder="Confirm Password" autocomplete="new-password">
                    <i class='bx bxs-show toggle-password' onclick="togglePassword('password_confirmation')"></i>
                </div>

                <button type="submit" class="auth-button">
                    Register <i class='bx bx-right-arrow-alt'></i>
                </button>

               

   <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>