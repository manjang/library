@extends('layouts.app')
    @section('content')

    <div class="department-info">
        <div class="department-info--wrap">
            <h2 class="department-info--headline">{{ $categories->name }}</h2>

            <div class="department-info--desc">
                <p>{{ $categories->description }}</p>
            </div>
            <div class="department-info--counter">
                <a href="#" class="books-counter"><span>{{ $categories->count() }}</span> Total Books</a>
                <a href="#" class="users-counter">in {{ $categories->name }}</a>
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
                        @foreach($faculties as $faculty)
                            <li><a href="/faculties/{{ $faculty->id }}">{{ $faculty->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="main book">
                <h2 class="book-headline">Books</h2>
                
                <div class="book-wrap">
                    @foreach($categories->book as $book)
                        <div class="book-card">
                            <a href="/books/{{ $book->id }}" class="book-card--thumb">
                                <img src="{{ $book->getImage() }}" alt="{{ $book->title }}">
                            </a>

                            <div class="book-card--footer">
                                <a href="#" class="read">Read</a>
                                <a href="#" class="download">Download</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
   
@endsection