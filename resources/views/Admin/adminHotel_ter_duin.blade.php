<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/css/telefoon.css">
</head>

<body>

    <div class="nav">
        <h2>Admin panel</h2>
        <br>
        <a href="{{ url('/admin/insertKamer') }}">Kamer toevoegen</a>
        <br>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <div class="titel">
        <h1>Hotel ter duin</h1>
    </div>

    <div class="container">

        <table>

            <tr>
                <th>Naam</td>
                <th>Email</td>
                <th>Telefoon nummer</th>
                <th>Datum en tijd van</th>
                <th>Datum en tijd tot</th>
                <th>Kamer</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            @foreach($bestelling_klant as $bestelling_klant)

            <tr>
                <td>{{$bestelling_klant->naam}}</td>
                <td>{{$bestelling_klant->email}}</td>
                <td>{{$bestelling_klant->telefoon_nr}}</td>
                <td>{{$bestelling_klant->van}}</td>
                <td>{{$bestelling_klant->tot}}</td>
                <td>{{$bestelling_klant->soort_kamer}}</td>
                <td>{{$bestelling_klant->omschrijving_kamer}}</td>
                <td>{{$bestelling_klant->prijs}}</td>
                <td><a href="{{"/admin/show/".$bestelling_klant->id_bestelling}}">Zichtbaar</a></td>
                <td><a href="{{"/admin/update/".$bestelling_klant->id_bestelling}}">Wijzigen</a></td>
                <td><a href="{{"/admin/delete/".$bestelling_klant->id_bestelling}}">Verwijderen</a></td>


            </tr>

            @endforeach

        </table>
    </div>

</body>

</html>