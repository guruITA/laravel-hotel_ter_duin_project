<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecteer date</title>
</head>

<body>


    <form action="" method="get">

        @csrf

        <div>
            <label for="van">Welke datum en tijd wilt u de kamer boeken</label>
            <input type="datetime-local" name="van" required>
        </div>

        <br>

        <div>
        <label for="van">Tot welke datum en tij wilt u de kamer boeken</label>
            <input type="datetime-local" name="tot" required>
        </div>
        
        <br>

        @if(isset($error))
        <div>
            {{ $error }}
        </div>
        @endif

        <br>

        <button type="submit">Kamers bekijken</button>

    </form>
</body>

</html>