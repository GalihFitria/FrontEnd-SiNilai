<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak KHS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex">

        <aside id="sidebar" class="w-64 bg-blue-700 min-h-screen text-white p-4 fixed">
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
            <h1 class="text-center text-4xl font-bold mb-6" style="font-family: 'Lobster', cursive;">Si Nilai</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard.mahasiswa') }}" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('cetakKHS.index') }}" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            📝 Cetak KHS
                        </a>
                    </li>

                </ul>
            </nav>
        </aside>
        <div class="flex-1 ml-64">



            <main class="flex-1 ml-50 p-6 mt-5">

                <div class="bg-white p-6 rounded-lg shadow-md border border-blue-300">
                    <h3 class="text-lg font-bold text-blue-700">KARTU HASIL STUDI</h3>
                    <div class="bg-gray-200 p-3 rounded mt-2">
                        <p><strong>Keterangan :</strong></p>
                        <p>Kartu Hasil Studi merupakan fasilitas yang dapat digunakan untuk melihat hasil studi mahasiswa per semester. Selain dapat dilihat secara online, hasil studi ini juga dapat dicetak.</p>
                    </div>

                    <!-- <div class="mt-2">
                        <label class="block font-semibold">NPM</label>
                        <input type="text" class="border p-2 w-100 rounded mt-1" placeholder="">
                    </div>
                    <div class="mt-2">
                        <label class="block font-semibold">Nama Mahasiswa</label>
                        <input type="text" class="border p-2 w-1/2 rounded mt-1" placeholder="">
                    </div>
                    <div class="mt-2">
                        <label class="block font-semibold">Program Studi</label>
                        <input type="text" class="border p-2 w-1/2 rounded mt-1" placeholder="">
                    </div> -->


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
                        <tbody id='khsTable'>
                            @foreach($khs as $index => $k)
                            <tr class="bg-gray-100">
                                <td class="border p-2">{{ $index + 1 }}</td>
                                <td class="border p-2">{{ $k['Kode Mata Kuliah']}}</td>
                                <td class="border p-2">{{ $k['Nama Mata Kuliah']}}</td>
                                <td class="border p-2">{{ $k['Jumlah SKS']}}</td>
                                <td class="border p-2">{{ $k['Nilai']}}</td>
                                <td class="border p-2">{{ $k['Status Kelulusan']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('export.pdf') }}" method="GET">
                        <button type="submit" class="bg-blue-500 text-white p-2 mt-4 rounded hover:bg-blue-600">
                            🖨 Cetak KHS
                        </button>
                    </form>

                    <!-- <button class="bg-blue-500 text-white p-2 mt-4 rounded hover:bg-blue-600">🖨 Cetak KHS</button> -->
                </div>
            </main>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const accountButton = document.getElementById("accountButton");
                const accountDropdown = document.getElementById("accountDropdown");

                if (accountButton && accountDropdown) {
                    accountButton.addEventListener("click", function(event) {
                        event.stopPropagation(); // Mencegah event klik naik ke atas
                        accountDropdown.classList.toggle("hidden");
                    });

                    document.addEventListener("click", function(event) {
                        if (!accountButton.contains(event.target) && !accountDropdown.contains(event.target)) {
                            accountDropdown.classList.add("hidden");
                        }
                    });
                } else {
                    console.error("Element accountButton atau accountDropdown tidak ditemukan.");
                }
            });

            function openLogoutModal(event) {
                event.preventDefault();
                document.getElementById("logoutModal").classList.remove("hidden");
            }

            function closeLogoutModal() {
                document.getElementById("logoutModal").classList.add("hidden");
            }

            function confirmLogout() {
                window.location.href = "{{ route('login.dashboard') }}";
            }
        </script>

</body>

</html>