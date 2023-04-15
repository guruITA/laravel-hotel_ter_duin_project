<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/telefoon.css">
    <title>Kamer Bestellen</title>
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
        <form action="/admin/insertKamer/submit" method="post" enctype="multipart/form-data">

            @csrf

            <div>
                <input type="text" name="soortKamer" placeholder="Soort Kamer" required>
            </div>
            <br>
            <div>
                <input type="text" name="omschrijving_kamer" placeholder="Omschrijving kamer" required>
            </div>
            <br>
            <div>
            <input type="file" name="foto" required>
            </div>
            <br>
            <div>
                <input type="text" name="prijs" placeholder="Prijs" required>
            </div>
            <br>
            <button type="submit">Kamer toevoegen</button>

            <img src="" alt="">

        </form>

    </div>

    <br>

    <div class="container1">

        <table>

            <tr>
                <th>Kamer nr</th>
                <th>Soort kamer</td>
                <th>Fotos</th>
                <th>Prijs</th>
                <th>Omschrijving Kamer</td>
                <th></th>
                <th></th>
                <th></th>
            </tr>

@foreach($kamers as $kamer)
    <tr>
        <td>{{ $kamer->id_kamer }}</td>
        <td>{{ $kamer->soort_kamer }}</td>
        <td><img src="{{ asset($kamer->kamer_foto) }}" alt=""></td>
        <td>€{{ $kamer->prijs }}</td>
        <td>{{ $kamer->omschrijving_kamer }}</td>
        <td><a href="{{"/admin/insertKamer/show/".$kamer->id_kamer}}">Zichtbaar</a></td>
        <td><a href="{{"/admin/insertKamer/update/".$kamer->id_kamer}}">Wijzigen</a></td>
        <td><a href="{{"/admin/insertKamer/delete/".$kamer->id_kamer}}">Verwijderen</a></td>
    </tr>
@endforeach


        </table>

        @if (session('error'))
        <div>{{ session('error') }}</div>
        @endif'

        @if (session('success'))
        <div>{{ session('success') }}</div>
        @endif'

    </div>
</body>

</html>