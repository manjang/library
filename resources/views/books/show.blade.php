@extends('layouts.app')
    @section('content')

    <div class="main-content single">
        <div class="main-content--wrap">
            <div class="book-thumb">
                <div class="book-thumb-img">
                    <img src="{{ $book->getImage() }}" alt="{{ $book->title }}">
                </div>

                <div class="rating">
                    <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                    <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                    <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                    <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                    <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                </div>

                <div class="book-thumb--meta">
                    <a href="#" class="read">Read Book</a>
                    <a href="#" class="book-download">Download</a>
                </div>
            </div>

            <div class="main book">
                <div class="main-wrap">
                    <div class="book-title--delete">
                        <h3 class="main-headline">{{ $book->title }}</h3>
                        
                        @if(Auth::check() && $book->user_id == Auth::user()->id)
                            <div class="book-action-btns">
                                <button type="button" class="btn btn-link">
                                    <a href="/books/{{ $book->id }}/edit">Edit Book</a>
                                </button>    

                                <button class="btn btn-danger">
                                    <a   
                                        href="#"
                                            onclick="
                                            var result = confirm('Are you sure you wish to delete this Book?');
                                                if( result ){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form').submit();
                                                }
                                                    "
                                                    >
                                            Delete
                                    </a>

                                    <form id="delete-form" action="{{ route('books.destroy',[$book->id]) }}" 
                                        method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="delete">
                                                {{ csrf_field() }}
                                    </form>

                                </button>
                            </div>
                        @endif

                        <div class="save-btn"><a href="#" class="btn btn-primary"><i class="far fa-heart"></i><span>Save</span></a></div>
                    </div>

            
                    <div class="main-wrap--content">
                        <div class="book-info">
                            <div class="book-info--wrap">
                                <p class="book-author"><span>Book author: </span>{{ $book->author }}</p>
                                
                                <p class="book-uploader"><span>Uploader: </span><a href="/users/{{ $book->user->id }}">{{ $book->user->name }}</a></p>

                                <p class="book-category"><span>Category: </span><a href="/categories/{{ $book->category->id }}">{{ $book->category->name }}</a></p>
                               

                                <div class="book-info--counter">
                                    <a href="#" class="books-counter"><span>20+</span> Total Downloads</a>
                                    <a href="#" class="users-counter"><span>30+</span> Total Reads</a>
                                </div>

                                <div class="book-desc">
                                    <span>Description: </span>
                                    <p>{{ $book->description }}</p>
                                </div>

                                <div class="reviews">
                                    <span>Reviews:</span>

                                    <div class="reviews-wrap">
                                        <div class="review">
                                            <div class="review-meta">Buba Manjang, School of ICT</div>
                                            <div class="review-rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>
                                            <div class="review-content">
                                                Excellent! Good work and your all efforts help greatly for those who are hungry to find knowledge to excel academically. thanks and regards!
                                            </div>
                                        </div>

                                        <div class="review">
                                            <div class="review-meta">Ansu Bah, School of Education</div>
                                            <div class="review-rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>
                                            <div class="review-content">
                                                    I like the book, thanks for keeping us updated.
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="ralated">
                                    <h3 class="related-headline">Users also viewed</h3>

                                    <div class="related-wrap">
                                        <a href="#" class="related-item">
                                            <div class="related-thumb">
                                                <img src="{{ URL('uploads/java.png') }}" alt="Java">
                                            </div>

                                            <div class="rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>

                                            <p>Introduction to Web Services with Java</p>
                                        </a>

                                        <a href="#" class="related-item">
                                            <div class="related-thumb">
                                                <img src="{{ URL('uploads/html.jpeg') }}" alt="Java">
                                            </div>

                                            <div class="rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>

                                            <p>Introduction to Web Services with Java</p>
                                        </a>

                                        <a href="#" class="related-item">
                                            <div class="related-thumb">
                                                <img src="{{ URL('uploads/calculus.jpg') }}" alt="Java">
                                            </div>

                                            <div class="rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>
                                            
                                            <p>Introduction to Web Services with Java</p>
                                        </a>

                                        <a href="#" class="related-item">
                                            <div class="related-thumb">
                                                <img src="{{ URL('uploads/java-intro.jpg') }}" alt="Java">
                                            </div>

                                            <div class="rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>
                                            
                                            <p>Introduction to Web Services with Java</p>
                                        </a>

                                        <a href="#" class="related-item">
                                            <div class="related-thumb">
                                                <img src="{{ URL('uploads/css.jpeg') }}" alt="Java">
                                            </div>

                                            <div class="rating">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-on.png') }}" alt="Star on">
                                                <img src="{{ URL('uploads/star-half.png') }}" alt="Star half">
                                                <img src="{{ URL('uploads/star-off.png') }}" alt="Star off">
                                            </div>
                                            
                                            <p>Introduction to Web Services with Java</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection