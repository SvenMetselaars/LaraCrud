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
    </div>
        @if (auth()->user()->admin)            
            <h2>add Movie?</h2>
            <form action="/add-movie" method="POST">
                @csrf
                <input type="text" name="title">
                <input type="text" name="director">
                <input type="textarea" name="summary">
                <input type="number" name="price">
                <select name="categories[]" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categories }}</option>
                    @endforeach
                </select>
                <input type="text" name="img">
                <input type="text" name="vid">
                <button>save</button>
            </form>
        @endif

    @else

    <h2>login</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>log in</button>
        <p>dont have a account yet? <a href="/register">register here</a></p>
    </form>  
    @endauth

    <script src="js/app.js"></script>
</body>
</html>

