<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Swanair – Fly Beautifully')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/swanair.css') }}" />
    @stack('styles')
</head>
<body>

    <nav class="sw-nav">
        <div class="sw-nav__inner">
            <a href="{{ route('home') }}" class="sw-nav__logo">
                <span class="sw-nav__logo-icon">✦</span>
                <span class="sw-nav__logo-text">Swanair</span>
            </a>
            <ul class="sw-nav__links">
                <li><a href="#" class="sw-nav__link">Deals</a></li>
                <li><a href="#" class="sw-nav__link">My Trips</a></li>
                <li><a href="#" class="sw-nav__link">Support</a></li>
                <li><a href="#" class="sw-nav__link sw-nav__link--cta">Sign in</a></li>
            </ul>
            <button class="sw-nav__hamburger" id="navToggle" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
        <div class="sw-nav__mobile" id="mobileMenu">
            <a href="#">Deals</a>
            <a href="#">My Trips</a>
            <a href="#">Support</a>
            <a href="#">Sign in</a>
        </div>
    </nav>

    @yield('content')

    <footer class="sw-footer">
        <div class="sw-footer__inner">
            <div class="sw-footer__brand">
                <div class="sw-footer__logo">
                    <span class="sw-nav__logo-icon">✦</span>
                    <span class="sw-nav__logo-text">Swanair</span>
                </div>
                <p class="sw-footer__tagline">Fly beautifully. Arrive confidently.</p>
            </div>
            <div class="sw-footer__cols">
                <div class="sw-footer__col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Flights</a></li>
                        <li><a href="#">Hotels</a></li>
                        <li><a href="#">Car Rentals</a></li>
                        <li><a href="#">Packages</a></li>
                    </ul>
                </div>
                <div class="sw-footer__col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="sw-footer__col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sw-footer__bottom">
            <p>© {{ date('Y') }} Swanair. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('open');
        });
    </script>
    @stack('scripts')
</body>
</html>
