<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>University of The Gambia | Online Library</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="header-alt">
        <nav class="flex-container">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ URL('uploads/logo.gif') }}" alt="logo">
                    
                    <div>
                        <span>UTG</span>
                        <span>e-Library</span>
                    </div>
                </a>
            </div>

            <div class="header-search">
                <form>
                    <input autocomplete="off" maxlength="100" name="keybord-home" placeholder="search for a book" type="text">
                    <a class="search-btn" href="#"><img src="{{ URL('uploads/search.svg') }}"></a>
                </form>
            </div>

            <div class="collections">
                <ul class="menu">
                    <li class="menu-item"><a href="/books">Collections</a></li>
                    <li class="menu-item"><a href="/categories">Explore</a></li>
                </ul>
            </div>

            <div class="auth">
                
                <ul class="navbar-nav ml-auto">
                    <li><a href="/donate" class="donate">Donate</a></li>

                    @guest
                        <li><a class="login" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="join" href="{{ route('register') }}">{{ __('Join free') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

        @include('partials.errors')
        @include('partials.success')
            
        <main class="py-4">
            @yield('content')
        </main>

    <footer class="footer">
        <div class="footer-wrap">
            <div class="footer-card">
                <h3 class="footer-headline">Help Us Help Students</h3>
                <ul>
                    <li class="footer-link">
                        @guest
                            <a href="{{ route('login') }}">{{ __('Add a Book') }}</a>
                        @else
                            <a href="/books/create">Add a Book</a>
                        @endguest
                    </li>
                    <li class="footer-link"><a href="/donate">Donate</a></li>
                    <li class="footer-link"><a href="/suggestions">Suggestions</a></li>
                    <li class="footer-link"><a href="/report">Report a problem</a></li>
                </ul>
            </div>

            <div class="footer-card">
                <h3 class="footer-headline">UTG Resources</h3>
                <ul>
                    <li class="footer-link"><a href="http://utg.edu.gm">Official Website</a></li>
                    <li class="footer-link"><a href="http://utg.edu.gm">Departments</a></li>
                    <li class="footer-link"><a href="http://utg.edu.gm">Admissions</a></li>
                    <li class="footer-link"><a href="http://utg.edu.gm">Student Union</a></li>
                </ul>
            </div>

            <div class="footer-card">
                <h3 class="footer-headline">About Us</h3>
                <ul>
                    <li class="footer-link"><a href="/about">About UTG E-Library</a></li>
                    <li class="footer-link"><a href="/team">About the Team</a></li>
                    <li class="footer-link"><a href="/faq">FAQs</a></li>
                    <li class="footer-link"><a href="/help">Help</a></li>
                </ul>
            </div>
        </div>

        <a href="#" class="footer-logo"><img src="{{ URL('uploads/logo.gif') }}" alt="UTG Logo"></a>
    </footer>
</body>
</html>