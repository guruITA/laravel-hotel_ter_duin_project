<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factuur</title>
</head>

<body>

    @if(session('message'))
    <span class="error">{{ session('message') }}</span>
    @endif

    <h1 name="res_nr">Reserveer nr: {{ $res_nr }}</h1>
    <h1 name="klant_id">Klant:{{ $klant_id }}</h1>
    <h1 name="van">Van: {{ $van }}</h1>
    <h1 name="tot">Tot: {{ $tot }}</h1>
    <h1 name="id_kamer">Kamer: {{ $id_kamer }}</h1>
    <h1 name="id_kamer">Naam: {{ $naam }}</h1>
    <h1 name="id_kamer">Email: {{ $email }}</h1>
    <h1 name="id_kamer">Telefoon:{{ $telefoon_nr }}</h1>
    <h1>{{ $kamer->soort_kamer }}</h1>
    <img src="{{ asset($kamer->kamer_foto) }}" alt="">
    <h1 name="id_kamer">Totaal bedrag: {{ $totaal_prijs }}</h1>

    <button class="btn btn-primary" onclick="window.print()"> Print deze pagina</button>
</body>

</html>