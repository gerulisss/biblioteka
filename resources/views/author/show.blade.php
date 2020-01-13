@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">PDF</div>
    <div class="card-body">
        <div class="form-group">
            <label>Autoriaus rodymas</label>
            <h1>
            Name: {{$author->name}}
            Surname: {{$author->surname}}
            </h1>

            <img src="{{asset('/img/')}}/{{$author->photo}}">

            <a href="{{route('author.pdf', [$author])}}">Download PDF</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection