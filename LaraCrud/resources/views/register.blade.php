<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Netflix Clone - Register</title>
</head>

<body>
    @auth
        <!-- If user is already logged in, redirect or show message -->
        <div class="auth-wrapper">
            <div class="auth-container">
                <p class="logged-in">You are already logged in!</p>
                <a href="/" class="btn btn-play" style="text-align: center;">Go to Home</a>
            </div>
        </div>
    @else
        <!-- Register Form -->
        <div class="auth-wrapper">
            <div class="auth-container">
                <h2>Create Account</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input name="name" type="text" placeholder="Username" required>
                    <input name="email" type="email" placeholder="Email" required>
                    <input name="password" type="password" placeholder="Password" required>
                    <button type="submit" class="btn btn-play">Register</button>
                </form>
                <p class="form-link">
                    Already have an account? <a href="/">Log in here!</a>
                </p>
            </div>
        </div>
    @endauth
</body>
</html>