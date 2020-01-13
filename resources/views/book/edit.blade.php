@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Knygos redagavimas</div>
    <div class="card-body">
        <form method="POST" action="{{route('book.update',[$book])}}">
            <div class="form-group">
                {{-- <label>Knygos redagavimas</label> --}}
                <small class="form-text text-muted">Redaguokite knygos pavadinimą</small>
               Title <input type="text" name="book_title" class="form-control" value="{{old('book_title',$book->title)}}">
               <small class="form-text text-muted">Redaguokite knygos kodą</small>
                ISBN: <input type="text" name="book_isbn" class="form-control" value="{{old('book_isbn',$book->isbn)}}">
                <small class="form-text text-muted">Redaguokite knygos puslapių skaičių</small>
                Pages: <input type="text" name="book_pages" class="form-control" value="{{old('book_pages',$book->pages)}}">
                <small class="form-text text-muted">Redaguokite knygos aprašymą</small>
                About: <textarea name="book_about" class="form-control" id="summernote">{{$book->about}}</textarea>
                <br>
                <small class="form-text text-muted">Knygos autoriaus pasirinkimas</small>
                <select name="author_id" class="form-control">
                @foreach ($authors as $author)
                <option value="{{$author->id}}" @if($author->id == $book->author_id)
                selected @endif>
                {{$author->name}} {{$author->surname}}
                </option>
                @endforeach
                </select>
                @csrf
                <br>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-success" href="{{route('book.index')}}">Back to books list</a>
                </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        // $(document).ready(function() {
        // $('#summernote').summernote();
        // });
        $("#summernote").summernote({
        height: 200,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'help' ] ]
        ]
    });
        </script>
        
@endsection