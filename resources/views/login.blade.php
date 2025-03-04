<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800 font-serif">Selamat Datang</h1><br>
        <h2 class="text-4xl font-semibold text-blue-600 mt-2 font-serif">di Sistem Pengelolaan Nilai Mahasiswa</h2><br>

        <div class="flex justify-center gap-10 mt-8">

            <a href="login_dosen" class="bg-white p-6 rounded-lg shadow-md text-center hover:bg-gray-100 transition">
                <img src="{{asset('dosen.png')}}" alt="Dosen" class="w-26 h-24  mx-auto">
                <p class="font-bold text-gray-700 mt-3">Dosen</p>
            </a>


            <a href="login_mahasiswa" class="bg-white p-6 rounded-lg shadow-md text-center hover:bg-gray-100 transition">
                <img src="{{asset('mahasiswa.png')}}" alt="Mahasiswa" class="w-26 h-24  mx-auto">
                <p class="font-bold text-gray-700 mt-3">Mahasiswa</p>
            </a>
        </div>
    </div>
</body>

<body>

</body>

</html>