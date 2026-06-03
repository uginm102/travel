<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ugin Swanair - Flight Search Results</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
<div class="bg-white border-bottom py-2 shadow-sm mb-4">
    <div class="container">
        <ul class="nav nav-pills card-header-pills small">
            <li class="nav-item"><a class="nav-link active rounded-pill px-3" href="#"><i class="fa-solid fa-plane me-1"></i> Flights</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-hotel me-1"></i> Stays</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-car me-1"></i> Cars</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-box me-1"></i> Packages</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-calendar-day me-1"></i> Things to do</a></li>
        </ul>
    </div>
</div>
<div class="container mb-5">
    @yield('content')
</div>


</body>
</html>
