<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>
    <link href="css/style.css" rel="stylesheet"></link>
</head>
<body>
    @Auth
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo">PATFLIX</a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="#">Movies</a></li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Unlimited movies.</h1>
            <p class="hero-description">Watch anywhere, anytime. Ready to watch?</p>
        </div>
        <video class="hero-video" muted preload="auto" poster="fallback.jpg"></video>
    </section>

    <!-- Content -->
    <div class="content">
        <section class="section">
            <h2 class="section-title">all movies</h2>
            @foreach($categories as $category)
                <h3>{{ $category->categories }}</h3>
                <div class="row">
                    @foreach ($category->movies as $movie)
                        <a href="/view/{{ $movie->id }}">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{ asset('storage/' . $movie->img) }}" alt="{{ $movie->title }}" width="100%"/>
                                    <div class="card-overlay">
                                        <div class="card-title">{{ $movie->title }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </section>
    </div>

    @else

    <!-- Login Form (when not authenticated) -->
    <div class="auth-wrapper">
        <div class="auth-container">
            <h2>Sign In</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="Username" required>
                <input name="loginpassword" type="password" placeholder="Password" required>
                <button type="submit" class="btn btn-play">Log In</button>
            </form>
            <p class="form-link">
                Don't have an account yet? <a href="/register">Register here</a>
            </p>
        </div>
    </div>

    @endauth
    <script src="js/app.js"></script>
</body>
</html>