@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Knyga</div>
    <div class="card-body">
            Title: {{old('book_title',$book->title)}}
            <br>
            ISBN: {{old('book_isbn',$book->isbn)}}
            <br>
            Pages: {{old('book_pages',$book->pages)}}
            <br>
            About: {!!$book->about!!}
            <br>
            Author: {{$book->bookAuthor->name.' '.$book->bookAuthor->surname}}
            <br>
            @csrf
            <br>
            <a style="text-decoration:none;" href="{{route('book.edit',[$book])}}"><button type="button" class="btn btn-primary">Edit</button></a>
            <a class="btn btn-success" href="{{route('book.index')}}">Back to books list</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection