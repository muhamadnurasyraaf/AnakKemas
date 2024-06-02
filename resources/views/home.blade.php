<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | {{ env('APP_NAME') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            padding: 60px 0;
            text-align: center;
            background-color: #f8f9fa;
        }
        .hero-section h1 {
            margin-bottom: 20px;
        }
        .hero-section p {
            margin-bottom: 30px;
        }
        .btn-get-started {
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary text-white">
        <a class="navbar-brand" href="#">AnakKemas</a>
    </nav>
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to Anak Kemas</h1>
            <p>Monitor your child's academic performance, activities, and assessments all in one place.</p>
            @guest
            <a href="/register" class="btn btn-primary btn-get-started">Get Started</a>
            @endguest
           @auth
            <a href="profile" class="btn btn-primary btn-get-started">Your Profile</a>
           @endauth 
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
