<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Oddo</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Riwayat Oddo</h1>

        <div class="d-flex align-items-start">
            <!-- Tombol Tambah Data -->
            <a href="{{route('oddoOutForm') }}" class="btn btn-primary mb-3 ml-auto">Tambah Data</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Courier Runsheet Id</th>
                    <th>Oddo In</th>
                    <th>User Oddo Out</th>
                    <th>Kendaraan</th>
                    <th>Oddo Out</th>
                    <th>User Oddo In</th>
                    <th>Kendaraan Oddo Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $a->unique_code }}</td>

                    <td>{{ $a->oddoOut->user->runsheet_courier_id }}</td>

                    <td>{{ $a->oddoIn ? $a->oddoIn->oddometer : 'BELUM TERISI' }}</td>

                    <td>{{ $a->oddoIn ? $a->oddoIn->user->name : 'BELUM TERISI' }}</td>

                    <td>{{ $a->oddoIn ? $a->oddoIn->kendaraan->nomor_polisi : 'BELUM TERISI' }}</td>

                    <td>{{ $a->oddoOut ? $a->oddoOut->oddometer : 'BELUM TERISI' }}</td>

                    <td>{{ $a->oddoOut ? $a->oddoOut->user->name : 'BELUM TERISI' }}</td>

                    <td>{{ $a->oddoOut ? $a->oddoOut->kendaraan->nomor_polisi : 'BELUM TERISI' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan script Bootstrap di sini (opsional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
