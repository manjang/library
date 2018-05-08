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
    <header class="main-header">
        <div class="flex-container">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ URL('uploads/logo.gif') }}" alt="logo">
                    
                    <div>
                        <span>UTG</span>
                        <span>e-Library</span>
                    </div>
                </a>
            </div>

            <div class="collections">
                <ul class="menu">
                    <li class="menu-item"><a href="/books">Collections</a></li>
                    <li class="menu-item"><a href="/categories">Explore</a></li>
                </ul>
            </div>

            <div class="auth">
                <ul class="navbar-nav ml-auto">
                    <li><a href="#" class="donate">Donate</a></li>

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
        </div>
    </header>

    <div class="hero">
        <div class="hero-wrap">
            <div class="hero-caption">
                <h2>UTG e-Library</h2>
                <span>Thousands of free eBooks.</span>
                <span>Gifted by the UTG's most generous community of readers.</span>
            </div>

            <div class="search">
                
                <form>
                    <input autocomplete="off" maxlength="100" name="keybord-home" placeholder="search for a book" type="text">
                    <a class="search-btn" href="#"><img src="{{ URL('uploads/search.svg') }}" alt="Search image"></a>
                </form>
            </div>

            <div class="trending">
                <span>Trending Categories: </span>
                <ul class="trending-books">
                    @foreach($categories as $category)
                        <li class="trending-book"><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="credits">
            <!-- <div>Proudly powered by <a href="#" class="creators">Folks</a> @ <a href="http://www.quest.gm" target="_blank" class="quest">Quest</a></div> -->
            <div>Read more about <a href="/about" class="about">UTG e-Library</a></div>
        </div>
    </div>
    
    <div class="recent">
        <h3 class="recent-headline">Recent Uploads</h3>
        <div class="recent-card">
            <div class="recent-books">
                @foreach($books->take(5) as $book)
                    <a href="/books/{{ $book->id }}" class="recent-book"><img src="{{ $book->getImage() }}" alt="{{ $book->title }}"></a>
                @endforeach
            </div>

            <img src="{{ URL('uploads/shelf_wood.png') }}" alt="Shelf" class="shelf">
        </div>
    </div>

    <div class="department">
        <h3 class="department-headline">Departments</h3>

        <div class="department-wrap">
            @foreach($faculties as $faculty)
            <div class="department-card">
                <a href="/faculties/{{ $faculty->id }}" class="department-card--thumb">
                    <img src="{{ $faculty->getImage() }}" alt="{{ $faculty->name }}">
                </a>

                <div class="department-card--footer">
                    <a href="/faculties/{{ $faculty->id }}">{{ $faculty->name }}</a>
                    <span>{{ $faculty->book->count() }} Books</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    <div class="partner">
        <h3 class="partner-headline">Our Partners</h3>
        <div class="partner-subheadline">We'd like to thank these amazing companies for supporting us</div>

        <div class="partner-links">
            <a href="#" class="partner-inst"><img src="{{ URL('uploads/quest.png') }}" alt="Quest Digital Advertising Agency"></a>
            <a href="#" class="partner-inst"><img src="{{ URL('uploads/moherst.png') }}" alt="Ministry of Higher Education"></a>
            <a href="#" class="partner-inst"><img src="{{ URL('uploads/insist.JPG') }}" alt="Insist Global"></a>
        </div>
    </div>

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