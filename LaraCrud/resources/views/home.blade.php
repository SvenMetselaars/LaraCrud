<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>
    <link href="css/style.css" rel="stylesheet"></link>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo">PATFLIX</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">TV Shows</a></li>
                <li><a href="#">Movies</a></li>
                <li><a href="#">My List</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Unlimited movies, TV shows, and more.</h1>
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
            <h2 class="section-title">Trending Now</h2>
            <div class="row">
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Movie Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Trending Movie 1</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Movie Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Trending Movie 2</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Movie Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Trending Movie 3</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Movie Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Trending Movie 4</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Movie Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Trending Movie 5</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Popular on Patflix</h2>
            <div class="row">
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Show Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Popular Show 1</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Show Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Popular Show 2</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Show Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Popular Show 3</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Show Poster</div>
                        <div class="card-overlay">
                            <div class="card-title">Popular Show 4</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">My List</h2>
            <div class="row">
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Saved Content</div>
                        <div class="card-overlay">
                            <div class="card-title">Saved Movie 1</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Saved Content</div>
                        <div class="card-overlay">
                            <div class="card-title">Saved Movie 2</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <div class="card-placeholder">Saved Content</div>
                        <div class="card-overlay">
                            <div class="card-title">Saved Movie 3</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="js/app.js"></script>
</body> 
</html>