@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Autorius</div>
    <div class="card-body">
            Name: {{old('author_name',$author->name)}}
            <br>
            Surname: {{old('author_name',$author->surname)}}
            <br>
            <img src="{{asset('/img/')}}/{{$author->photo}}" style="width:150px">
            <br>
            @csrf
            <br>
            <a style="text-decoration:none;" href="{{route('author.edit',[$author])}}"><button type="button" class="btn btn-primary">Edit</button></a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection