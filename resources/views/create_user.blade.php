<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Create User</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
</head>
<body>
    

    <!-- Form Create User -->
    <form action="/user/store" method="POST">
        <!-- Tambahkan CSRF token jika menggunakan Laravel -->
        @csrf 

        <!-- Input Nama -->
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>

        <!-- Input NPM -->
        <div>
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" required>
        </div>

        <!-- Input Kelas -->
        <div>
            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>
        </div>

        <!-- Tombol Submit -->
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
