<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMA Negeri 1 Selat</title>

</head>

<body>

    <h2>Data Alumni</h2>

    <table class="table">
        <thead>
            <tr></tr>
        </thead>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Tahun AJaran Lulus</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnis as $i => $alumni)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $alumni->student->nama_lengkap }}</td>
                    <td>{{ $alumni->tahun_ajaran_lulus }}</td>
                    <td>{{ $alumni->pekerjaan }}</td>
                    <td>{!! $alumni->testimoni !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
