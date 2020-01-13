@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Knygų sąrašas</div>
    <div class="card-body">
            {{-- <label>Knygos ištrinimas</label>
            <small class="form-text text-muted">Ištrinti knygą</small> --}}
        @foreach ($books as $book)
        <form method="POST" action="{{route('book.destroy', [$book])}}">
        @csrf
        <a style="text-decoration:none;" href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} <button type="button" class="btn btn-primary btn-sm">Edit</button></a>
        <a style="text-decoration:none;" href="{{route('book.show',[$book])}}"><button type="button" class="btn btn-info btn-sm">Show</button></a>
        <button type="submit" class="form-control; btn btn-danger btn-sm">DELETE</button>
        </form>
        <br>
        @endforeach
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
