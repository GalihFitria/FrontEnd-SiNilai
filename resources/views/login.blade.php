<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right,rgb(116, 180, 236), #00f2fe);
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen">
    <div class="text-center bg-white p-10 rounded-3xl shadow-xl w-[90%] md:w-[50%]">
        <h1 class="text-6xl font-bold text-gray-800 mt-4" style="font-family: 'Playfair Display', serif;">Selamat Datang</h1>
        <h2 class="text-4xl font-semibold text-blue-600 mt-2" style="font-family: 'Poppins', sans-serif;">di Sistem Pengelolaan Nilai Mahasiswa</h2>

        <div class="flex justify-center gap-10 mt-8">
            <a href="login_dosen" class="bg-white p-6 rounded-lg shadow-md text-center hover:bg-gray-100 transition transform hover:scale-105">
                <img src="{{asset('dosen.png')}}" alt="Dosen" class="w-26 h-24 mx-auto">
                <p class="font-bold text-gray-700 mt-3">Dosen</p>
            </a>

            <a href="login_mahasiswa" class="bg-white p-6 rounded-lg shadow-md text-center hover:bg-gray-100 transition transform hover:scale-105">
                <img src="{{asset('mahasiswa.png')}}" alt="Mahasiswa" class="w-26 h-24 mx-auto">
                <p class="font-bold text-gray-700 mt-3">Mahasiswa</p>
            </a>
        </div>
    </div>
</body>

</html>