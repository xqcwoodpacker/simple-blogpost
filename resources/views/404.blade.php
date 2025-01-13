<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">       
    <link rel="stylesheet" href="{{ asset('storage/assets/css/main.css') }}">
</head>

<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! The page you are looking for does not exist.</div>
        <a href="{{ url('/') }}" class="btn btn-outline-primary home-btn">Go Back Home</a>
    </div>
</body>

</html>
