<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$Movie->title}} - PATFLIX</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    @auth

    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="/" class="logo">PATFLIX</a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/movies">Movies</a></li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Movie Details Hero Section -->
    <section class="hero movie-details-hero">
        <div class="hero-content">
            <h1 class="hero-title">{{$Movie->title}}</h1>

            <!-- Edit Section only for Admin -->
            @if (auth()->user()->admin)
                <div class="admin-actions">
                    <form action="/delete-Movie/{{$Movie->id}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this Movie?')">🗑 Delete</button>
                    </form>
                </div>
            @endif
        </div>
        <video class="hero-video" controls preload="auto" width="100%" height="100%">
            <source src="{{ asset('storage/' . $Movie->vid) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section>

    <!-- Additional Information -->
    <div class="content">
        <section class="section">
            <h2 class="section-title">More Information</h2>
            <div class="info-grid">
                @if (auth()->user()->admin)
                    <h1>Edit Movie</h1>

                    <!-- Admin Edit Form -->
                    <form action="/edit-Movie/{{$Movie->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="text" name="title" value="{{$Movie->title}}">
                        <input type="text" name="director" value="{{$Movie->director}}">
                        <input type="text" name="summary" value="{{$Movie->summary}}">
                        <input type="text" name="price" value="{{$Movie->price}}">
                        <input type="text" name="stock" value="{{$Movie->stock}}">

                        <button>Save changes</button>
                    </form>
                @else
                    <div class="info-grid">
                        <div class="info-item">
                            <h3>Director</h3>
                            <p>{{$Movie->director}}</p>
                        </div>
                        <div class="info-item">
                            <h3>Price</h3>
                            <p>${{$Movie->price}}</p>
                        </div>
                        <div class="info-item">
                            <h3>Availability</h3>
                            <p>{{$Movie->stock}} copies in stock</p>
                        </div>
                        <div class="info-item">
                            <h3>Summary</h3>
                            <p>{{$Movie->summary}}</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>

    @else
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
            <p>Don’t have an account yet? <a href="/register">Register here</a></p>
        </form>
    @endauth
    <!-- <script src="js/app.js"></script> -->
</body>
</html>
