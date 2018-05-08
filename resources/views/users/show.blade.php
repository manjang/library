@extends('layouts.app')
    @section('content')

        <div class="profile">
            <div class="profile-wrap">
                <div class="profile-content">
                    <h2 class="profile-name">{{ $user->name }}</h2>
                    <p class="profile-email"><span>Email: </span> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                    <p class="profile-mat"><span>Mat Number: </span> {{ $user->mat_number }}</p>
                    <p class="profile-faculty"><span>Faculty: </span> {{ $user->faculty->name }}</p>
                </div>

                <div class="profile-image">
                    <img src="{{ URL('uploads/user.svg') }}" alt="profile img">
                </div>
            </div>
        </div>

        @if(Auth::check() && $user->id == Auth::user()->id)
        <div class="recent">
            <h3 class="recent-headline">SAVED BOOKS</h3>
            <div class="recent-card">
                <div class="recent-books">
                    <a href="#" class="recent-book"><img src="{{ URL('uploads/java.png') }}" alt="Java"></a>
                    <a href="#" class="recent-book"><img src="{{ URL('uploads/html.jpeg') }}" alt="Html5"></a>
                    <a href="#" class="recent-book"><img src="{{ URL('uploads/css.jpeg') }}" alt="CSS"></a>
                    <a href="#" class="recent-book"><img src="{{ URL('uploads/calculus.jpg') }}" alt="Calculus"></a>
                    <a href="#" class="recent-book"><img src="{{ URL('uploads/python.jpeg') }}" alt="Python"></a>
                </div>

                <img src="{{ URL('uploads/shelf_wood.png') }}" alt="Shelf" class="shelf">
            </div>
        </div>
        @endif
    
        <div class="user-uploads">
            <div class="user-uploads--wrap">
                <h3 class="user-uploads--headline">Books uploaded by {{ $user->name }}</h3>


                <div class="book-wrap">
                    @foreach($user->book as $book)
                        <div class="book-card">
                            <a href="/books/{{ $book->id }}" class="book-card--thumb">
                                <img src="{{ $book->getImage() }}" alt="Java">
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
        
  
@endsection