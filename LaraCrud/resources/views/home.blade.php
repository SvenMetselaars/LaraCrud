<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>
    <link href="css/style.css" rel="stylesheet"></link>
</head>
<body>
    @auth

    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo">PATFLIX</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="/movies">movies</a></li>
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
        </div>
        <video class="hero-video" muted preload="auto" poster="fallback.jpg"></video>
    </section>

    <!-- Content -->
    <div class="content">
        <section class="section">
            <h2 class="section-title">Trending Now</h2>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($movies as $movie)
                    <?php
                    if($i < 10) 
                    { 
                        ?>
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
                        <?php 
                        $i++; 
                    }
                    ?>
                @endforeach
                
            </div>
        </section>

        @if (auth()->user()->admin)
        <section class="section">
            <div class="admin-form-container">
                <h2>Add Movie</h2>
                <form action="/add-movie" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Movie Title" required>
                    <input type="text" name="director" placeholder="Director" required>
                    <textarea name="summary" placeholder="Movie Summary" rows="4" required></textarea>
                    <input type="number" name="price" placeholder="Price" step="0.01" required>
                    
                    <div class="category-group">
                        @foreach($categories as $category)
                            <div class="category-item">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="cat-{{ $category->id }}">
                                <label for="cat-{{ $category->id }}">{{ $category->categories }}</label>
                            </div>
                        @endforeach
                    </div>
                    
                    <input type="text" name="img" placeholder="Image URL" required>
                    <input type="text" name="vid" placeholder="Video URL" required>
                    <button type="submit" class="btn btn-play">Save Movie</button>
                </form>
                
                <form action="/seed-movies" method="GET">
                    <button type="submit" class="secondary-btn">Generate Fake Movies</button>
                </form>
            </div>
        </section>
        @endif
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