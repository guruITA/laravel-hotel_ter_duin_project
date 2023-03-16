    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bestellen</title>
    </head>

    <body>

             <form action="/klant/insertBestelling/submit" method="post">
            @csrf
            <input type="hidden" name="van" value="{{ $van }}">
            <input type="hidden" name="tot" value="{{ $tot }}">
            <input type="hidden" name="id_kamer" value="{{ $id_kamer }}">
            <div>
                <input type="text" name="naam" placeholder="Naam" required>
            </div>
            <br>
            <div>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <br>
            <div>
                <input type="number" name="telefoon_nr" placeholder="telefoon_nr" required>
            </div>
            <br>
            <button type="submit">Bestellen</button>
        </form>
    </body>

    </html>