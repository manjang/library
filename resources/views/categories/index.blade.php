@extends('layouts.app')
    @section('content')

    <div class="department-info">
        <div class="department-info--wrap">
            <h2 class="department-info--headline">Explore</h2>

            <div class="department-info--desc">
                <p>Explore these popular categories on UTG e-Learning. All books are free to download as well as to read. You can also share or add a particular book to your profile for future use/ reference.</p>
                <p>If there's a particular book you would want us to upload, please send it to us using the contact page <a href="#">Here.</a></p>
            </div>
            <div class="department-info--counter">
                <a href="#" class="books-counter"><span>{{ $books->count() }}</span> Total Books</a>
                <a href="#" class="users-counter"><span>{{ $users->count() }}</span> Registered Students</a>
            </div>
        </div>
    </div>

    <div class="main-content explore">
        <div class="main-content--wrap">
            <div class="categories">
                <div class="categories-wrap">
                    <h3>Our Collections</h3>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="categories/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="categories-wrap">
                    <h3>Browse by Faculty</h3>
                    <ul>
                        @foreach($faculties as $faculty)
                            <li><a href="faculties/{{ $faculty->id }}">{{ $faculty->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="main book">
                <div class="department">
                    <h3 class="department-headline">Explore by Categories</h3>
            
                    <div class="department-wrap">
                        @foreach($categories as $category)
                            <div class="department-card">
                                <a href="categories/{{ $category->id }}" class="department-card--thumb">
                                    <img src="assets/images/cs.png" alt="{{ $category->name }}">
                                </a>
                
                                <div class="department-card--footer">
                                    <a href="#">{{ $category->name }}</a>
                                    <span>{{ $category->book->count() }} Books</span>
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
    </div>
   
@endsection