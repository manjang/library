<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Jobs\UploadFacultyImage;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all()->shuffle();

        $books = Book::all();

        $categories = Category::take(5)->get();

        return view('faculties.index', ['faculties' => $faculties, 'books' => $books, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
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
            $faculty = Faculty::create([
                'name' => $request->input('name'),
                'thumbnail' => $request->input('thumbnail'),
                'description' => $request->input('description')
            ]);

            if ($request->file('file')) {
                $request->file('file')->move(storage_path() . '/uploads', $fileId = uniqid(true));
                
                $this->dispatch(new UploadFacultyImage($faculty, $fileId));
            }

            if($faculty) {
                return redirect()->route('faculties.show', ['faculty'=> $faculty->id])
                ->with('success' , 'Faculty created successfully');
            }
        }
        
        return back()->withInput()->with('errors', 'Error creating faculty');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        $faculties = Faculty::find($faculty->id);

        $books = Book::all();

        $users = User::all();

        $categories = Category::all();

        return view('faculties.show', ['faculties' => $faculties, 'books' => $books, 'users' => $users, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        $faculty = Faculty::find($faculty->id);

        return view('faculties.edit', ['faculty' => $faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $facultyUpdate = Faculty::where('id', $faculty->id)
                            ->update([
                                'name' => $request->input('name'),
                                'thumbnail' => $request->input('thumbnail'),
                                'description' => $request->input('description')
                            ]);

        if ($request->file('thumbnail')) {
            $request->file('thumbnail')->move(storage_path() . '/uploads', $fileId = uniqid(true));
            
            $this->dispatch(new UploadFacultyImage($faculty, $fileId));
        }

        if ($facultyUpdate) {
            return redirect()->route('faculties.show', ['faculty' => $faculty->id])->with('success', 'Faculty Successfully updated');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
