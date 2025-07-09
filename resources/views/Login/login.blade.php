<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo-simetri.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="styles.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            width: 80%;
            max-width: 1200px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            overflow: hidden;
        }

        .image-section {
            flex: 1;
            overflow: hidden;
        }

        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            background-color: #f8f8f8;
            /* Optional: add background color */
        }

        .form-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-card h1 {
            font-size: 24px;
            font-weight: 300;
            margin-bottom: 10px;
            color: #4A47A3;
        }

        .login-card p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #666;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            border-color: #4A47A3;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background: #6C63FF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #4A47A3;
        }

        .forgot-password {
            font-size: 12px;
            color: #6C63FF;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .signup-link {
            font-size: 14px;
            margin-top: 20px;
        }

        .signup-link a {
            color: #4A47A3;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            /* Adjust logo size */
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left side: Image -->
        <div class="image-section">
            <img src="{{ asset('images/logo-simetri.png') }}" height="300" alt="Login Illustration">
        </div>



        <!-- Right side: Login form -->
        <div class="form-section">




            <div class="login-card">
                <!-- Logo -->
                <div class="logo">
                    <img src="{{ asset('images/login.jpg') }}" height="200" alt="Company Logo">
                </div>

                <!-- Heading -->
                <h1>Welcome Back</h1>
                <p>Please sign in to continue</p>

                <!-- Alert error -->
                @if (session('error'))
                    <div
                        style="background-color: #f8d7da; color: #721c24; border-radius: 8px; padding: 12px 16px; margin-bottom: 20px; border: 1px solid #f5c6cb; text-align: left;">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            required>
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn-primary">Login</button>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
