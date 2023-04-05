<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamer</title>
</head>

<body>

    @foreach($kamer as $kamer)
    <div class="container">
        <h1>{{$kamer->soort_kamer}}</h1>
        <h3>{{$kamer->omschrijving_kamer}}</h3>
    </div>
    @endforeach
    @if(session('message'))
    <div>{{ session('message') }}</div>
    @endif

</body>

</html>