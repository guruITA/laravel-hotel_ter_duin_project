<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/telefoon.css">
    <title>Kamer wijzigen</title>
</head>

<body>

    <div class="nav">
        <h2>Admin panel</h2>
        <a href="{{ url('admin/') }}">Overzicht</a>
    </div>

    <div class="titel">
        <h1>Hotel ter duin</h1>
    </div>

    <br>

    <div class="container">
        <form action="/admin/insertKamer/update/submit" method="post">

        @csrf

        @foreach($show_kamer as $show_kamer)
        <input type="hidden" name="id_kamer" value="{{$show_kamer->id_kamer}}" >
            <div>
                <input type="text" name="soort_kamer" placeholder="Soort Kamer" value="{{$show_kamer->soort_kamer}}" required>
            </div>
            <br>
            <div>
                <textarea cols="30" rows="3" name="omschrijving_kamer" placeholder="Omschrijving kamer" required>{{$show_kamer->omschrijving_kamer}}</textarea>
            </div>
            <br>
            <button type="submit">Kamer wijzigen</button>

            @endforeach

        </form>

    </div>
</body>

</html>