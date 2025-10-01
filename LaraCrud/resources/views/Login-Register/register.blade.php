<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @Auth
    <p>logged in</p>
    <form action="/logout" method="POST">
       @csrf 
       <button>log out</button>
    </form>
    @else
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="email" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
    </form>
    <h2>login</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>log in</button>
    </form>
    @endauth
</body>
</html>