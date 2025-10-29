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
            <h1 class="hero-title">Unlimited movies, and more.</h1>
            <p class="hero-description">Watch anywhere, anytime. Ready to watch?</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-play">▶ Play</a>
                <a href="#" class="btn btn-info">ℹ More Info</a>
            </div>
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

    <h2>login</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>log in</button>
    </form>  
    @endauth
    <script src="js/app.js"></script>
</body>
</html>