@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Autoriaus rodymas</div>
    <div class="card-body">
        <div class="form-group">
            {{-- <label>Autoriaus rodymas</label> --}}
            <h1>
            Name: {{$author->name}}
            Surname: {{$author->surname}}
            </h1>

            <img src="{{asset('/img/')}}/{{$author->photo}}" style="width:150px">
            <br>
            <br>
            <a href="{{route('author.pdf', [$author])}}"><button type="submit" class="btn btn-primary">Download PDF</button></a>
            <a href="{{route('author.index', [$author])}}"><button type="submit" class="btn btn-success">Back to authors list</button></a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection