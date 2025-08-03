<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/userlog.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="login-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login</h2>
            
            <div class="input-group">
                <i class='bx bxs-user' ></i>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot password?</a>
            @endif
            
            <button type="submit" class="btn-login">LOGIN</button><br><br>
            
            <p>Or Sign Up Using</p>
            <div class="social-icons">
               <a href="https://www.google.lk/?hl=en-LK"> <i class='bx bxl-google'></i></a>
               <a href="https://twitter-cl.vercel.app/login"> <i class='bx bxl-twitter'></i></a>
                <a href="https://web.facebook.com/?_rdc=1&_rdr#"> <i class='bx bxl-facebook-circle' ></i></a>
            </div>
            
            @if (Route::has('register'))
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            @endif
        </form>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>