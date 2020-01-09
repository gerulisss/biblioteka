@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Edit</div>
    <div class="card-body">
        <div class="form-group">
            <label>Autoriaus redagavimas</label>
        <form method="POST" action="{{route('author.update',[$author])}}">
            <small class="form-text text-muted">Redaguokite vardą</small>
            Name: <input type="text" name="author_name" class="form-control" value="{{old('author_name',$author->name)}}">
            <small class="form-text text-muted">Redaguokite pavardę</small>
            Surname: <input type="text" name="author_surname" class="form-control" value="{{old('author_name',$author->surname)}}">
            @csrf
            <button type="submit" class="form-control">EDIT</button>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection