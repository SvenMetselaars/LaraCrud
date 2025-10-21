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
        <p>logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button class="secondary-btn">log out</button>
        </form>

        <h2>add disc?</h2>
        <form action="/add-disc" method="POST">
            @csrf
            <input type="text" name="title">
            <input type="text" name="artist">
            <input type="amount" name="price">
            <input type="amount" name="stock">
            <button>save</button>
        </form>

        <h2>all discs</h2>
        @foreach($discs as $disc)
            <h3>{{$disc['title']}}</h3>
            <h3>{{$disc['artist']}}</h3>
            <h3>{{$disc['price']}}</h3>
            <h3>{{$disc['stock']}}</h3>
        @endforeach

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
    </div>
</body>

</html>