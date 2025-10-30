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
                    <form action="/delete-movie/{{$Movie->id}}" method="POST" style="display: inline;">
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
                    <!-- Admin Edit Form -->
                    <div class="admin-form-container">
                        <h2>Edit Movie</h2>
                        <form action="/edit-movie/{{$Movie->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="text" name="title" value="{{$Movie->title}}" placeholder="Movie Title" required>
                            <input type="text" name="director" value="{{$Movie->director}}" placeholder="Director" required>
                            <textarea name="summary" placeholder="Movie Summary" rows="4" required>{{$Movie->summary}}</textarea>
                            <input type="number" name="price" value="{{$Movie->price}}" placeholder="Price" step="0.01" required>
                            
                            <div class="category-group">
                                @foreach($categories as $category)
                                    <div class="category-item">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="cat-{{ $category->id }}"
                                            {{ $Movie->categories->contains($category->id) ? 'checked' : '' }}>
                                        <label for="cat-{{ $category->id }}">{{ $category->categories }}</label>
                                    </div>
                                @endforeach
                            </div>
                        
                            <input type="text" name="img" value="{{$Movie->img}}" placeholder="Image URL" required>
                            <input type="text" name="vid" value="{{$Movie->vid}}" placeholder="Video URL" required>

                            <button type="submit" class="btn btn-play">Save Changes</button>
                        </form>
                    </div>
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
                            <h3>Category</h3>
                            @foreach($Movie->categories as $category)                               
                                <p>{{ $category->categories }}</p>                            
                            @endforeach
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
    <!-- <script src="js/app.js"></script> -->
</body>
</html>