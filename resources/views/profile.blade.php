<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Profile</title>
</head>
<body class="bg-black">
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="relative w-2/5 h-4/5 group">
            <div class="absolute -inset-1 bg-gradient-to-b from-pink-600 to-purple-600 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
            <div class="w-full h-full relative bg-black rounded-3xl leading-none flex flex-col justify-center items-center">
                <img class="h-2/5 rounded-full" src="{{ $user->foto ? asset($user->foto) : 'https://i.pinimg.com/564x/de/4a/19/de4a19f50af28e161dee0ba96d140cdd.jpg'}}" alt="Profile Picture">
                <p class="text-white font-mono text-3xl mt-14 font-semibold">{{ $user->nama }}</p>
                <p class="text-white font-mono text-3xl mt-1 font-semibold">{{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
                <p class="text-white font-mono text-3xl mt-1 font-semibold">{{ $user->npm }}</p>
            </div>
        </div>
    </div>
</body>
</html>