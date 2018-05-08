<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Faculty;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Jobs\UploadImage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        $categories = Category::all();

        $faculties = Faculty::all();

        return view('books.index', ['books' => $books, 'categories' => $categories, 'faculties' => $faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $users = User::all();

        return view('books.create', ['books' => $books, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $book = Book::create([
                'title' => $request->input('title'),
                'thumbnail' => $request->input('thumbnail'),
                'file' => $request->input('file'),
                'description' => $request->input('description'),
                'author' => $request->input('author'),
                'faculty_id' => $request->input('faculty_id'),
                'category_id' => $request->input('category_id'),
                'user_id' => Auth::user()->id
            ]);

            $validator = Validator::make($request->all(), [
                'file'   => 'mimes:doc,pdf,docx,zip'
            ]);

            if ($request->file('thumbnail')) {
                $request->file('thumbnail')->move(storage_path() . '/uploads', $fileId = uniqid(true));
                
                $this->dispatch(new UploadImage($book, $fileId));
            }

            if ($request->file('file')) {
                $request->file('file')->move(storage_path() . '/books', $bookId = uniqid(true));

                $this->dispatch(new UploadBook($book, $bookId));
            }

            if($book) {
                return redirect()->route('books.show', ['book'=> $book->id])
                ->with('success' , 'Book added successfully');
            }
        }
        
        return back()->withInput()->with('errors', 'Error adding new book');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $book = Book::where('id', $book->id)->first();
        $book = Book::find($book->id);

        $categories = Category::all();

        return view('books.show', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book = Book::find($book->id);

        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $bookUpdate = Book::where('id', $book->id)
                            ->update([
                                'title' => $request->input('title'),
                                'thumbnail' => $request->input('thumbnail'),
                                'description' => $request->input('description'),
                                'author' => $request->input('author'),
                                'faculty_id' => $request->input('faculty_id'),
                                'category_id' => $request->input('category_id')
                            ]);

        if ($request->file('file')) {
            $request->file('file')->move(storage_path() . '/uploads', $fileId = uniqid(true));
            
            $this->dispatch(new UploadImage($book, $fileId));
        }

        if ($bookUpdate) {
            return redirect()->route('books.show', ['book' => $book->id])->with('success', 'Book Successfully updated');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        
        $findBook = Book::find( $book->id);
		if($findBook->delete()){
            
            return redirect()->route('books.index')
            ->with('success' , 'Book deleted successfully');
        }

        return back()->withInput()->with('error' , 'Book could not be deleted');
    }
}
