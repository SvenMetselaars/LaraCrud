<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    </link>
    <title>Netflix Clone - Register</title>
</head>

<body id="auth-body">
    <div class="auth-container">
        @Auth

        @else
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="email" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
        <p>already have a account? <a href="/">log in here!</a></p>
        @endauth
    </div>
</body>

</html>