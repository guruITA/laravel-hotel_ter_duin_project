<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling</title>
</head>

<body>

    @foreach($bestelling_klant as $bestelling_klant)
    <div class="container">
        <h1>{{$bestelling_klant->naam}}</h1>
        <h3>{{$bestelling_klant->email}}</h3>
        <h3>{{$bestelling_klant->telefoon_nr}}</h3>
        <h3>{{$bestelling_klant->van}}</h3>
        <h3>{{$bestelling_klant->tot}}</h3>
        <h3>{{$bestelling_klant->soort_kamer}}</h3>
        <h3>{{$bestelling_klant->omschrijving_kamer}}</h3>
        <h3>{{$bestelling_klant->prijs}}</h3>
    </div>
    @endforeach

</body>

</html>