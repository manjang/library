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
                    <li class="menu-item"><a href="explore.html">Explore</a></li>
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
        </nav>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="user-auth">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mat_number" class="col-md-4 col-form-label text-md-right">{{ __('Mat Number') }}</label>

                                <div class="col-md-6">
                                    <input id="mat_number" type="text" class="form-control{{ $errors->has('mat_number') ? ' is-invalid' : '' }}" name="mat_number" value="{{ old('mat_number') }}" required autofocus>

                                    @if ($errors->has('mat_number'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mat_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="faculty_id" class="col-md-4 col-form-label text-md-right">Faculty</label>
                                
                                <div class="col-md-6">
                                    <select class="form-control" id="faculty_id" name="faculty_id">
                                        <option value="1">1 - School of Agriculture and Environmental Sciences</option>
                                        <option value="2">2 - School of Arts &amp; Sciences</option>
                                        <option value="3">3 - School of Business and Public Administration</option>
                                        <option value="4">4 - School of Education</option>
                                        <option value="5">5 - School of Engineering and Architecture</option>
                                        <option value="6">6 - School of Journalism and Digital Media</option>
                                        <option value="7">7 - Faculty of Law</option>
                                        <option value="8">8 - School of Medicine and Allied Health Sciences</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-wrap">
            <div class="footer-card">
                <h3 class="footer-headline">Help Us Help Students</h3>
                <ul>
                    <li class="footer-link"><a href="#">Add a Book</a></li>
                    <li class="footer-link"><a href="#">Donate</a></li>
                    <li class="footer-link"><a href="#">Suggestions</a></li>
                    <li class="footer-link"><a href="#">Report a problem</a></li>
                </ul>
            </div>

            <div class="footer-card">
                <h3 class="footer-headline">UTG Resources</h3>
                <ul>
                    <li class="footer-link"><a href="#">Official Website</a></li>
                    <li class="footer-link"><a href="#">Departments</a></li>
                    <li class="footer-link"><a href="#">Admissions</a></li>
                    <li class="footer-link"><a href="#">Student Union</a></li>
                </ul>
            </div>

            <div class="footer-card">
                <h3 class="footer-headline">About Us</h3>
                <ul>
                    <li class="footer-link"><a href="#">About UTG E-Library</a></li>
                    <li class="footer-link"><a href="#">About the Developers</a></li>
                    <li class="footer-link"><a href="#">FAQs</a></li>
                    <li class="footer-link"><a href="#">Help</a></li>
                </ul>
            </div>
        </div>

        <a href="#" class="footer-logo"><img src="{{ URL('uploads/logo.gif') }}" alt="UTG Logo"></a>
    </footer>
</body>
</html>