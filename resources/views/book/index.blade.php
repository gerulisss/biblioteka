@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Index</div>
    <div class="card-body">
            <label>Knygos ištrinimas</label>
            <small class="form-text text-muted">Ištrinti knygą</small>
        @foreach ($books as $book)
        <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}}
        {{$book->bookAuthor->surname}}</a>
        <form method="POST" action="{{route('book.destroy', [$book])}}">
        @csrf
        <button type="submit" class="form-control">DELETE</button>
        </form>
        <br>
        @endforeach
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
