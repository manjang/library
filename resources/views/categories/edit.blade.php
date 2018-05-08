@extends('layouts.app')
    @section('content')

    <div class="department-info">
        <div class="department-info--wrap">
            <h2 class="department-info--headline">Update Faculty Info</h2>

            <div class="department-info--desc">
                <p>Please make sure the information you are about to provide is accurate and genuine. Thank you</p>
            </div>
            <div class="department-info--counter">
                <a href="#" class="books-counter"><span>8</span> Total Faculties &amp; Schools</a>
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
                    <h3 class="book-headline">Update Faculty Info</h3>
            
                    <form method="post" action="{{ route('faculties.update', [$faculty->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="name">Faculty Name <span class="required">*</span></label>

                            <input placeholder="Enter the Faculty name" 
                                    id="name" 
                                    required
                                    name="name"
                                    spellcheck="false"
                                    class="form-control" 
                                    autofocus
                                    value="{{ $faculty->name }}" />
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Faculty Image</label>

                            <input id="thumbnail" 
                                    type="file" 
                                    class="form-control" 
                                    name="thumbnail" 
                                    required 
                                    autofocus />
                        </div>

                        <div class="form-group">
                            <label for="description">Faculty Description</label>

                            <textarea name="description"
                                        placeholder="Enter the Book description"
                                        style="resize: vertical"
                                        id="description"
                                        rows="5" spellcheck="false"
                                        class="form-control autosize-target text-left">
                                        {{ $faculty->description }}
                            </textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Faculty
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
   
@endsection