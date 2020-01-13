@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Knygos rodymas</div>
    <div class="card-body">
        <div class="form-group">
            {{-- <label>Knygos rodymas</label> --}}
            <h4>
                Title: {{$book->title}}<br>
                ISBN: {{$book->isbn}}<br>
                Pages: {{$book->pages}}<br>
            </h4>
                About: {{$book->about}}<br>
                <h3>
                Author:{{$book->bookAuthor->name.' '.$book->bookAuthor->surname}}
                </h3>

            <br>

            <a href="{{route('book.pdf', [$book])}}">Download PDF</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection