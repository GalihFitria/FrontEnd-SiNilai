<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar Biru -->
        <aside id="sidebar" class="w-64 bg-blue-700 min-h-screen text-white p-4 fixed">
            <h1 class="text-center text-2xl font-bold mb-6">SiNilai</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="dashboard_mahasiswa" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="login" onclick="openLogoutModal(event)" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🔐 Log Out
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 ml-64 p-6 mt-16">
            <!-- Kartu Hasil Studi (KHS) -->
            <div class="bg-white p-6 rounded-lg shadow-md mt-6 border border-blue-300">
                <h3 class="text-lg font-bold text-blue-700">KARTU HASIL STUDI</h3>
                <div class="bg-gray-200 p-3 rounded mt-2">
                    <p><strong>Keterangan :</strong></p>
                    <p>Kartu Hasil Studi merupakan fasilitas yang dapat digunakan untuk melihat hasil studi mahasiswa per semester. Selain dapat dilihat secara online, hasil studi ini juga dapat dicetak.</p>
                </div>

                <!-- <div class="mt-4">
                    <label class="block font-semibold">Pilih Semester</label>
                    <select class="border p-2 w-full rounded mt-1">
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div> -->
                <div class="mt-2">
                    <label class="block font-semibold">NPM</label>
                    <input type="text" class="border p-2 w-100 rounded mt-1" placeholder="Masukkan NPM">
                </div>
                <div class="mt-2">
                    <label class="block font-semibold">Nama Mahasiswa</label>
                    <input type="text" class="border p-2 w-1/2 rounded mt-1" placeholder="Masukkan Nama Mahasiswa">
                </div>
                <div class="mt-2">
                    <label class="block font-semibold">Program Studi</label>
                    <input type="text" class="border p-2 w-1/2 rounded mt-1" placeholder="Masukkan Program Studi">
                </div>
                <!-- <button class="bg-green-500 text-white p-2 mt-4 rounded hover:bg-green-600">📝 Lihat KHS</button> -->

                <table class="w-full border mt-4 text-center">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="border p-2">No.</th>
                            <th class="border p-2">Kode Matkul</th>
                            <th class="border p-2">Nama Matkul</th>
                            <th class="border p-2">SKS</th>
                            <th class="border p-2">Nilai Akhir</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-100">
                            <td class="border p-2">1</td>
                            <td class="border p-2">IF101</td>
                            <td class="border p-2">Algoritma</td>
                            <td class="border p-2">3</td>
                            <td class="border p-2">A</td>
                            <td class="border p-2">Lulus</td>
                        </tr>
                    </tbody>
                </table>

                <button class="bg-blue-500 text-white p-2 mt-4 rounded hover:bg-blue-600">🖨 Cetak KHS</button>
            </div>
        </main>
    </div>

    <!-- Modal Logout -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-lg font-bold mb-4">Konfirmasi Logout</h2>
            <p>Apakah Anda yakin ingin logout?</p>
            <div class="mt-4 flex justify-center space-x-4">
                <button onclick="confirmLogout()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Ya, Logout</button>
                <button onclick="closeLogoutModal()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
            </div>
        </div>
    </div>

    <script>
        function openLogoutModal(event) {
            event.preventDefault();
            document.getElementById("logoutModal").classList.remove("hidden");
        }

        function closeLogoutModal() {
            document.getElementById("logoutModal").classList.add("hidden");
        }

        function confirmLogout() {
            window.location.href = "login";
        }
    </script>
</body>

</html>