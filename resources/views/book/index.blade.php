@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Knygų sąrašas
        <form action="{{route('book.index')}}" method="GET">
            <select name="filter">
                <option value="0">Visi</option>
                @foreach ($authors as $author)
                <option value="{{$author->id}}" @if($author->id == $filter){{'selected'}}@endif>{{$author->name}} {{$author->surname}}</option>
                @endforeach
            </select>
            <select name="sort">
                @foreach ($sorts as $sort)
                <option value="{{$sort->value}}" @if($sort->value == $sortDef){{'selected'}}@endif>{{$sort->text}}</option>
                @endforeach
            </select>
            <button class="btn btn-success" type="submit">GERAI</button>
            </form>
            
            <a class="btn btn-danger" href="{{route('book.index')}}">Isvalyti</a>

        </div>


    <div class="card-body">
            {{-- <label>Knygos ištrinimas</label>
            <small class="form-text text-muted">Ištrinti knygą</small> --}}
        @foreach ($books as $book)
        <form method="POST" action="{{route('book.destroy', [$book])}}">
            @csrf
        <a style="text-decoration:none;" href="{{route('book.list',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>
        <a style="text-decoration:none;" href="{{route('book.edit',[$book])}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
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
