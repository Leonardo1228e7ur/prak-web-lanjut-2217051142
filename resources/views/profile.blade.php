<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            background-image: url(https://wallpapercave.com/wp/wp3234817.jpg);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-card {
            position: relative;
            width: 40%;
            height: 80%;
            background-color: #000;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .profile-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #ec4899, #a855f7);
            filter: blur(10px);
            opacity: 0.75;
            transition: opacity 0.2s ease-in-out;
        }
        .profile-card:hover .profile-bg {
            opacity: 1;
        }
        .profile-content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
        }
        .profile-content img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .profile-content p {
            margin-top: 15px;
            font-size: 1.5rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="profile-bg"></div>
        <div class="profile-content">
            <p>
    <img src=" {{ asset('upload/img/' . $user->foto) }}" alt="foto user" width="100">
        </p>
            <p>{{ $user->nama }}</p>
            <p>{{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
            <p>{{ $user->npm }}</p>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
