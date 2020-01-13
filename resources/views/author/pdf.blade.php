<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$author->name}} {{$author->surname}} PDF</title>



</head>

<style>
    @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    src: url({{ asset('fonts/Roboto-Regular.ttf') }});
    }
    @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: bold;
    src: url({{ asset('fonts/Roboto-Bold.ttf') }});
    }

    * {
        font-family: 'Roboto'!important;
    }
</style>
</body>
<h1>Autoriaus kortelė</h1>
<h2>
    Name: {{$author->name}}<br>
    Surname: {{$author->surname}}<br>
    </h2>
    <img src="{{asset('/img/')}}/{{$author->photo}}">

</body>
</html>