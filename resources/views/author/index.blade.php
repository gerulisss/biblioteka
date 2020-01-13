@extends('layouts.app')
@section('content')
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Index</div>
  <div class="card-body">
    <label>Autoriu sarasas:</label>
    <br>
    @foreach ($authors as $author)
    <a style="float:left;" href="{{route('author.edit',[$author])}}">{{$author->name}}
      {{$author->surname}}</a>
      <br>
    <form method="POST" action="{{route('author.destroy', [$author])}}">
    @csrf
    <a style="text-decoration:none;" href="{{route('author.show',[$author])}}"><button type="button" class="btn btn-info btn-sm">Show</button></a>
    <a style="text-decoration:none;" href="{{route('author.edit',[$author])}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
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



