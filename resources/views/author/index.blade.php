@extends('layouts.app')
@section('content')
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Index</div>
  <div class="card-body">
    <label>Autoriaus ištrinimas</label>
    <small class="form-text text-muted">Ištrinti autorių</small>
    @foreach ($authors as $author)
    <a href="{{route('author.edit',[$author])}}">{{$author->name}}
    {{$author->surname}}</a>
    <form method="POST" action="{{route('author.destroy', [$author])}}">
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

