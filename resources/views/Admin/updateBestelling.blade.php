<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update bestelling</title>
</head>

<body>

@foreach($show_bestelling_klant as $show_bestelling_klant)

    <form action="/admin/update/submit" method="post">

    @csrf
    <input type="hidden" name="id_bestelling" value="{{ $show_bestelling_klant->id_bestelling }}" >
        <div>
            <input type="text" name="naam" placeholder="Naam" value="{{ $show_bestelling_klant->naam }}" required>
        </div>
        <br>
        <div>
            <input type="text" name="email" placeholder="Email" value="{{ $show_bestelling_klant->email }}" required>
        </div>
        <br>
        <div>
            <input type="number" name="telefoon_nr" placeholder="Telefoon nr." value="{{ $show_bestelling_klant->telefoon_nr }}" required>
        </div>
        <br>
        <div>
            <input type="datetime-local" name="van" placeholder="Van" value="{{ $show_bestelling_klant->van }}" required>
        </div>
        <br>
        <div>
            <input type="datetime-local" name="tot" placeholder="Tot" value="{{ $show_bestelling_klant->tot }}" required>
        </div>
        <br>
        <label>Kamer:</label>
                <select name="kamer" required>
                    <option value="{{$show_bestelling_klant->id_kamer}}">{{$show_bestelling_klant->soort_kamer}}</option>
                    @foreach($kamer as $kamer)
                    <option value="{{$kamer->id_kamer}}">{{$kamer->soort_kamer}}</option>
                    @endforeach
                </select>
        <br>
        <br>

        <button type="submit">Bijwerken</button>
    </form>

    @endforeach
    
</body>

</html>