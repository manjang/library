@extends('layouts.app')
    @section('content')

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
    
@endsection