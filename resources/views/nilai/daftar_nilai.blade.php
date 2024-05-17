<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ini adalah file kedua</title>
</head>
<body>
    <h1>Ini adalah file kedua</h1>
    @php
    $no = 1;
    $s1 = ['nama'=> 'fawazz', 'nilai'=> 70];
    $s2 = ['nama'=> 'Riyu', 'nilai'=> 80];
    $s3 = ['nama'=> 'Alan', 'nilai'=> 50];
    $s4 = ['nama'=> 'Siwa', 'nilai'=> 60];
    $s5 = ['nama'=> 'Jordi', 'nilai'=> 50];
    $judul = ['No','Nama','nilai','Keterangan'];

    $siswa = [$s1,$s2,$s3,$s4,$s5];
    @endphp

    <table align="center" border="1" cellpadding="0">
        <thead>
            <tr>
                @foreach ($judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $s)

            @php
            $ket = ($s['nilai'] >= 60) ? 'lulus' : 'gagal';
            $warna = ($no % 2 == 1) ? 'Green' : 'Yellow';
            @endphp

            <tr bgcolor="{{ $warna }}">
                <td>{{ $no++ }}</td>
                <td>{{ $s['nama'] }}</td>
                <td>{{ $s['nilai'] }}</td>
                <td>{{ $ket }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

</body>
</html>
