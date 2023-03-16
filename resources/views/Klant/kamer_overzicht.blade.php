<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamer overzicht</title>
</head>

<body>
    <table>

        <tr>
            <th>Kamer nummer</th>
            <th>Soort kamer</th>
            <th>Omschrijving kamer</th>
            <th>Prijs per dag</th>
        </tr>

        @foreach($show_kamers as $show_kamer)

        <tr>
            <td>{{ $show_kamer->id_kamer }}</td>
            <td>{{ $show_kamer->soort_kamer }}</td>
            <td>{{ $show_kamer->omschrijving_kamer }}</td>
            <td>€ {{ $show_kamer->prijs }}</td>
            <td><a href="{{"/klant/insertBestelling?id_kamer=" . $show_kamer->id_kamer . "&van=" . $van . "&tot=" . $tot}}">Kamer bestellen</a></td>
          </tr>
        @endforeach
    </table>

</body>

</html>