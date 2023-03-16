<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/telefoon.css">
    <title>Admin</title>
</head>

<body>

        <div class="nav">
            <h2>Admin panel</h2>
            <br>
            <a href="{{ url('/admin/insertKamer') }}">Kamer toevoegen</a>
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