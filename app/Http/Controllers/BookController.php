<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Validator;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
         [
        'book_title' => ['required', 'min:3', 'max:64'],
        'book_isbn' => ['required', 'min:3', 'max:64'],
        'book_pages' => ['required', 'min:2', 'max:64'],
        'book_about' => ['required'],
         ],
         [
            'book_title.required' => 'Prasome uzpildyti title laukeli',
            'book_isbn.required' => 'Prasome uzpildyti isbn laukeli',
            'book_pages.required' => 'Prasome uzpildyti pages laukeli',
            'book_about.required' => 'Prasome uzpildyti about laukeli'
         ]
         
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->route('book.create')->withErrors($validator);
        
        }

        $book = new Book;
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai sukurta knyga.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    { 
        $validator = Validator::make($request->all(),
         [
        'book_title' => ['required', 'min:3', 'max:64'],
        'book_isbn' => ['required', 'min:3', 'max:64'],

         ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->route('book.index')->withErrors($validator);
        
        }

        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrintas.');

    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf(Book $book)
    {
        $pdf = PDF::loadView('book.pdf', ['book' => $book]);
        return $pdf->download($book->title.'.pdf');
    }
}
