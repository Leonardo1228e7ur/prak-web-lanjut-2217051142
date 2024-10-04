<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="profile-container">
        <!-- Gambar Profil -->
        <img src="https://assets.jalantikus.com/assets/cache/560/796/userfiles/2020/10/05/profil-wa-keren-f2308.jpg" alt="Deskripsi Gambar" class="profile-img">
        
        <!-- Informasi Profil -->
       <h1>Profil User</h1>
       <p>Nama: {{ $nama }}</p>
       <p>NPM :{{ $npm }}</p>
       <p>Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</p>

    </div>
</body>
</html>
