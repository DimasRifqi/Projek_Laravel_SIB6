<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>heloo ini dashboard</title>
</head>
<body>
    <h1>hello </h1>
    @php

    $nama = 'Budi';
    $nilai = 70.00;

    @endphp

    @if ($nilai >= 60)
    @php $ket = 'lulus'; @endphp
    @else
    @php $ket = 'tidak lulus'; @endphp
    @endif

    {{ $nama }} <p>Dengan nilai</p> {{ $nilai }} <p>Dinyatakan</p> {{ $ket }}


</body>
</html>
