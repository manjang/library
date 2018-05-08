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

    <div class="department-info">
        <div class="department-info--wrap">
            <h2 class="department-info--headline">Upload a Book</h2>

            <div class="department-info--desc">
                <p>Please take a minute to confirm if the book you are about to upload exist in the database.</p>
                <p>You don't have to proceed if there's a copy of it in the database, otherwise upload responsibily. Thank you</p>
            </div>
            <div class="department-info--counter">
                <a href="#" class="books-counter"><span>2100+</span> Total Books</a>
                <a href="#" class="users-counter"><span>320+</span> Registered Students</a>
            </div>
        </div>
    </div>

    <div class="main-content explore">
        <div class="main-content--wrap">
            <div class="categories">
                <div class="categories-wrap">
                    <h3>Our Collections</h3>
                    <ul>
                        <li><a href="#">IT &amp; Programming</a></li>
                        <li><a href="#">Accounting</a></li>
                        <li><a href="#">Languages</a></li>
                        <li><a href="#">Law</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Statistics &amp; Mathematics</a></li>
                        <li><a href="#">Management</a></li>
                        <li><a href="#">Engineering</a></li>
                        <li><a href="#">Finance</a></li>
                        <li><a href="#">Natural Sciences</a></li>
                    </ul>
                </div>

                <div class="categories-wrap">
                    <h3>Browse by Faculty</h3>
                    <ul>
                        <li><a href="#">School of ICT</a></li>
                        <li><a href="#">School of Journalism</a></li>
                        <li><a href="#">School of Law</a></li>
                        <li><a href="#">School of Medicine</a></li>
                        <li><a href="#">School of Education</a></li>
                        <li><a href="#">School of Engineering</a></li>
                        <li><a href="#">School of Arts &amp; Sciences</a></li>
                        <li><a href="#">School of BPA</a></li>
                    </ul>
                </div>
            </div>

            <div class="main book">
                <div class="book-upload">
                    <h3 class="book-headline">Add a New Book</h3>
            
                    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Book Title <span class="required">*</span></label>

                            <input placeholder="Enter the Book title" 
                                    id="title" 
                                    required
                                    name="title"
                                    spellcheck="false"
                                    class="form-control" 
                                    autofocus />
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Book Cover</label>

                            <input id="thumbnail" 
                                    type="file" 
                                    class="form-control" 
                                    name="thumbnail" 
                                    required 
                                    autofocus />
                        </div>

                        <div class="form-group">
                            <label for="file">Book (pdf format)</label>

                            <input id="file" 
                                    type="file" 
                                    class="form-control" 
                                    name="file" 
                                    required 
                                    autofocus />
                        </div>

                        <div class="form-group">
                            <label for="category_id">Book Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="1">1 - IT &amp; Programming</option>
                                <option value="2">2 - Accounting</option>
                                <option value="3">3 - Languages</option>
                                <option value="4">4 - Law</option>
                                <option value="5">5 - Marketing</option>
                                <option value="6">6 - Statistics &amp; Mathematics</option>
                                <option value="7">7 - Management</option>
                                <option value="8">8 - Engineering</option>
                                <option value="9">9 - Finance</option>
                                <option value="10">10 - Natural Sciences</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="faculty_id">Faculty</label>
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

                        <div class="form-group">
                            <label for="description">Book Description</label>

                            <textarea name="description"
                                        placeholder="Enter the Book description"
                                        style="resize: vertical"
                                        id="description"
                                        rows="5" spellcheck="false"
                                        class="form-control autosize-target text-left">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="author">Book Author <span class="required">*</span></label>

                            <input placeholder="Enter the Book author" 
                                    id="author" 
                                    required
                                    name="author"
                                    spellcheck="false"
                                    class="form-control" 
                                    autofocus />
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload Book
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                    <li class="footer-link"><a href="/developers">About the Developers</a></li>
                    <li class="footer-link"><a href="/faq">FAQs</a></li>
                    <li class="footer-link"><a href="/help">Help</a></li>
                </ul>
            </div>
        </div>

        <a href="#" class="footer-logo"><img src="{{ URL('uploads/logo.gif') }}" alt="UTG Logo"></a>
    </footer>
</body>
</html>