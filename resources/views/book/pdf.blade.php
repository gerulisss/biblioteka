<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$book->title}}</title>



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
<h1>Knygos kortelė</h1>
<h4>
    Title: {{$book->title}}<br>
    ISBN: {{$book->isbn}}<br>
    Pages: {{$book->pages}}<br>
</h4>
    About: {{$book->about}}<br>
    <h3>
    Author: {{$book->bookAuthor->name.' '.$book->bookAuthor->surname}}
    </h3>

</body>
</html>