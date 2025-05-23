<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-96 relative z-10">
        <h2 class="text-2xl font-bold text-center text-blue-900">Login Dosen</h2><br>
        <p class="text-left text-gray-600 mt-1"><b>Selamat Datang di SiNilai!</b></p>
        <p class="text-left text-gray-500 mb-4">Silahkan masuk ke akun anda.</p>

        {{-- Tampilkan pesan error jika login gagal --}}
        @if(session('error'))
        <p class="text-red-600 text-sm mb-2">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            {{-- Hidden input untuk menandai login sebagai mahasiswa --}}
            <input type="hidden" name="role" value="dosen">

            
            <label class="block text-gray-700 font-semibold">USERNAME</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username anda" required class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">

            <label class="block text-gray-700 font-semibold mt-3">KATA SANDI</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password anda" required class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">

            <div class="flex items-center justify-between mt-2">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    <span class="text-sm text-gray-600">Ingat Saya</span>
                </label>
                <a href="" class="text-sm text-blue-600 hover:underline">Lupa Kata Sandi?</a>
            </div>

            <p id="error-message" class="text-red-600 text-sm mt-2 hidden">Username atau password salah!</p>

            <button type="submit" class="w-48 bg-blue-600 text-white py-2 rounded-lg mt-4 hover:bg-blue-700 transition mx-auto block">
                <b>Login</b>
            </button>
        </form>

    </div>

    <script>
        function validateLogin(event) {
            event.preventDefault();


            const validUsername = "dosen123";
            const validPassword = "123456";


            const inputUsername = document.getElementById("username").value;
            const inputPassword = document.getElementById("password").value;

            //
            if (inputUsername === validUsername && inputPassword === validPassword) {
                // alert("Login berhasil!");
                window.location.href = "dashboard_dosen"; // Redirect ke halaman dashboard
            } else {
                document.getElementById("error-message").classList.remove("hidden");
            }
        }
    </script>

</body>

</html>