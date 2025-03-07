<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex">
        
        <aside id="sidebar" class="w-64 bg-blue-700 min-h-screen text-white p-4 fixed top-0 left-0 bottom-0">
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
            <h1 class="text-center text-4xl font-bold mb-6" style="font-family: 'Lobster', cursive;">Si Nilai</h1>


            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="dashboard_dosen" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🏠 Dashboard
                        </a>
                    </li>
                    
                    <li class="mb-4 relative">
                        <button id="dropdownButton" class="w-full flex items-center justify-between text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            📊 Pengolahan Data
                            <span id="arrow">▼</span>
                        </button>
                        <ul id="dropdown" class="hidden bg-blue-600 mt-2 rounded-lg">
                            <li>
                                <a href="datadosen" class="block px-4 py-2 hover:bg-blue-700"> Data Dosen</a>
                            </li>
                            <li>
                                <a href="datamahasiswa" class="block px-4 py-2 hover:bg-blue-700"> Data Mahasiswa</a>
                            </li>
                            <li>
                                <a href="matakuliah" class="block px-4 py-2 hover:bg-blue-700"> Data Mata Kuliah</a>
                            </li>
                            <li>
                                <a href="dataprodi" class="block px-4 py-2 hover:bg-blue-700"> Data Prodi</a>
                            </li>
                            <li>
                                <a href="datakelas" class="block px-4 py-2 hover:bg-blue-700"> Data Kelas</a>
                            </li>
                            <li>
                                <a href="penilaian" class="block px-4 py-2 hover:bg-blue-700"> Penilaian</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 ml-64">
            
            <nav class="bg-white shadow-md p-4 flex justify-between items-center w-[97%] mx-auto mt-4 rounded-lg">
                <h1 class="text-1xl font-bold text-blue-800 tracking-wide">Sistem Pengelolaan Nilai Mahasiswa/<span class="text-blue-500"> SiNilai</span></h1>
                <div class="relative">
                    <button id="accountButton" class="flex items-center space-x-2 text-gray-700 font-semibold focus:outline-none">
                        <span>Halo, Selamat Datang👤</span>
                        <span id="accountArrow">▼</span>
                    </button>
                    <ul id="accountDropdown" class="hidden absolute right-0 bg-white shadow-md rounded-lg mt-2 w-40">
                        <li>
                            <a href="login" onclick="openLogoutModal(event)" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
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

            
            <main class="p-6">
                <h2 class="text-xl font-bold">Dashboard</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    <div class="bg-white shadow-md p-4 rounded-lg flex items-center space-x-4">
                        <i class="fas fa-calendar-alt text-blue-600 text-4xl"></i>
                        <div>
                            <h4 class="text-blue-600 font-bold">TAHUN AJARAN</h4>
                            <p class="text-2xl font-bold">2020/2021</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-md p-4 rounded-lg flex items-center space-x-4">
                        <i class="fas fa-book-open text-orange-500 text-4xl"></i>
                        <div>
                            <h4 class="text-orange-500 font-bold">SEMESTER</h4>
                            <p class="text-2xl font-bold">Ganjil</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-md p-4 rounded-lg flex items-center space-x-4">
                        <i class="fas fa-user-graduate text-green-600 text-4xl"></i>
                        <div>
                            <h4 class="text-green-600 font-bold">MAHASISWA</h4>
                            <p class="text-2xl font-bold">1.090</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-md p-4 rounded-lg flex items-center space-x-4">
                        <i class="fas fa-chalkboard-teacher text-green-500 text-4xl"></i>
                        <div>
                            <h4 class="text-green-500 font-bold">DOSEN</h4>
                            <p class="text-2xl font-bold">200</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            document.getElementById('dropdown').classList.toggle('hidden');
        });

        document.getElementById('accountButton').addEventListener('click', function() {
            document.getElementById('accountDropdown').classList.toggle('hidden');
        });

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