<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Oddo</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <h1>Create Oddo Out Entry</h1>
        <form method="POST" action="{{ route('oddoOut.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="kendaraan_id">Kendaraan ID:</label>
                <input type="text" name="kendaraan_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="oddometer">Odometer:</label>
                <input type="text" name="oddometer" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="safety_tools">Safety Tools:</label>
                <textarea name="safety_tools" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
