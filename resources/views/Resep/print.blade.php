<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Print Data</title>
</head>
<body onload="window.print()">
    <div
        class="table-responsive p-lg-5">
        <h3>Print Out Data</h3>
        <table
            class="table table-bordered p-lg-5"
        >
            <thead>
                <tr>
                   <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Nama Signa</th>
                <th scope="col">QTY</th>
                </tr>
            </thead>
            <tbody>
              
                 @php ($index = 1) @foreach($resep as $r)
            <tr>

                <td> {{ $index }}</td>
                <td>{{ $r->obatalkes_nama }}</td>
                <td>{{ $r->signa_nama }}</td>
                <td>{{ $r->qty }}</td>
               
            </tr>
            @php ($index++)@endforeach

            </tbody>
        </table>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>