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

    <h1 name="res_nr">{{ $res_nr }}</h1>
    <h1 name="klant_id">{{ $klant_id }}</h1>
    <h1 name="van">{{ $van }}</h1>
    <h1 name="tot">{{ $tot }}</h1>
    <h1 name="id_kamer">{{ $id_kamer }}</h1>

</body>

</html>