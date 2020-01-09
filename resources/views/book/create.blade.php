@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Create</div>
    <div class="card-body">
        <div class="form-group">
            <label>Knygos sukūrimas</label>
        <form method="POST" action="{{route('book.store')}}">
            <small class="form-text text-muted">Įveskite knygos pavadinimą</small>
            Title: <input type="text" name="book_title" class="form-control" value="{{old('book_title')}}">
            <small class="form-text text-muted">Įveskite knygos kodą</small>
            ISBN: <input type="text" name="book_isbn" class="form-control" value="{{old('book_isbn')}}">
            <small class="form-text text-muted">Įveskite knygos puslapių skaičių</small>
            Pages: <input type="text" name="book_pages" class="form-control" value="{{old('book_pages')}}">
            <small class="form-text text-muted">Įveskite knygos aprašymą</small>
            About: <textarea name="book_about" class="form-control" id="summernote" value="{{old('book_about')}}"></textarea>
            <br>
            <small class="form-text text-muted">Pasirinkite knygos autorių</small>
            <select name="author_id" class="form-control">
            @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}}
            {{$author->surname}}</option>
            @endforeach
            </select>
            @csrf
            <br>
            <button type="submit" class="form-control">ADD</button>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });
        </script>
        
@endsection