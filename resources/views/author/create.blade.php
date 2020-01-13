@extends('layouts.app')
@section('content')

    
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Autoriaus sukūrimas</div>
    <div class="card-body">
        <div class="form-group">
            {{-- <label>Autoriaus sukūrimas</label> --}}
        <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
            <small class="form-text text-muted">Įveskite vardą</small>
            Name: <input type="text" class="form-control" name="author_name" value="{{old('author_name')}}">
            <small class="form-text text-muted">Įveskite pavardę</small>
            Surname: <input type="text" class="form-control" name="author_surname" value="{{old('author_surname')}}">
            <br>
            Photo: <input type="file" name="author_photo">
            <br>
            @csrf
            <br>
            <button type="submit" class="btn btn-primary">ADD</button>
            <a class="btn btn-success" href="{{route('author.index')}}">Back to authors list</a>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection

    