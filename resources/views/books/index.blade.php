@extends('layouts.app')
    @section('content')

    <div class="department-info">
        <div class="department-info--wrap">
            <h2 class="department-info--headline">Our Collections</h2>

            <div class="department-info--desc">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, nesciunt sequi natus aliquid dignissimos non nulla nobis commodi, eius aliquam rem cupiditate magnam numquam sed repudiandae harum dolore? Dolorum, excepturi.
            </div>
        </div>
    </div>

    <div class="recent">
        <h3 class="recent-headline">Highest Rated</h3>
        <div class="recent-card">
            <div class="recent-books">
                @foreach($books->take(5) as $book)
                    <a href="/books/{{ $book->id }}" class="recent-book"><img src="{{ $book->getImage() }}" alt="{{ $book->title }}"></a>
                @endforeach
            </div>

            <img src="{{ URL('uploads/shelf_wood.png') }}" alt="Shelf" class="shelf">
        </div>
    </div>
    
    <div class="main-content">
        <div class="main-content--wrap">
            <div class="categories">
                <div class="categories-wrap">
                    <h3>Our Collections</h3>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
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
                    @foreach($books as $book)
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

                    <div class="load-more">
                        <a href="#">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection