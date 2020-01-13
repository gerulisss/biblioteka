<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Validator;
use PDF;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all()->sortByDesc('surname');


        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
        'author_name' => ['required', 'min:3', 'max:64'],
        'author_surname' => ['required', 'min:3', 'max:64'],
        'author_photo' => ['required'],
        ],
        [
            'author_name.required' => 'Prasome uzpildyti name laukeli',
            'author_surname.required' => 'Prasome uzpildyti surname laukeli',
            'author_photo.required' => 'Prasome ikelti savo nuotrauka'
         ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->route('author.create')->withErrors($validator);

        }
        
        $author = new Author;


        $file = $request->file('author_photo');

        $file_name = $file->getClientOriginalName();


   
      //Move Uploaded File
      $destinationPath = public_path(). '/img';

      $file->move($destinationPath,$file->getClientOriginalName());

        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->photo = $file_name;
        $author->save();
        return redirect()->route('author.index')->with('success_message', ' Autorius Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }

    public function list(Author $author)
    {
        return view('author.list', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validator = Validator::make($request->all(),
        [
        'author_name' => ['required', 'min:3', 'max:64'],
        'author_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'author_name.required' => 'Author Name is required',
            'author_surname.required' => 'Author Surname is required',
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->route('author.update')->withErrors($validator);

        }
        
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')->with('success_message', ' Autorius Sekmingai įrašytas.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if($author->authorBooks->count()){
            return redirect()->route('author.index')->with('info_message', 'Trinti negalima, nes turi knygų.');
            }
            $author->delete();
            return redirect()->route('author.index')->with('success_message', 'Sekmingai ištrintas.');

            
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf(Author $author)
    {
        $pdf = PDF::loadView('author.pdf', ['author' => $author]);
        return $pdf->download($author->name.' '.$author->surname.'.pdf');
    }

}
