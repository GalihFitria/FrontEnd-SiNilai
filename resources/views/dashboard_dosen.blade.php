<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <!-- <header class="bg-white shadow-md p-4 flex items-center justify-between">
        <button class="text-2xl p-2" onclick="toggleSidebar()">☰</button>
        <h1 class="text-xl font-bold">Sistem Pengelolaan Nilai Mahasiswa</h1>
    </header> -->

    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-blue-700 min-h-screen text-white p-4">
            <h1 class="text-center text-2xl font-bold mb-6">SiNilai</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="#" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🏠 Dashboard
                        </a>
                    </li>

                    <!-- Pengolahan Data dengan Dropdown -->
                    <li class="mb-4 relative">
                        <button onclick="toggleDropdown()" class="w-full flex items-center justify-between text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            📊 Pengolahan Data
                            <span id="arrow">▼</span>
                        </button>

                        <!-- Dropdown Menu -->
                        <ul id="dropdown" class="hidden bg-blue-600 mt-2 rounded-lg">
                            <li>
                                <a href="penilaian" class="block px-4 py-2 hover:bg-blue-700">📑 Penilaian</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Logout Button -->
                    <li>
                        <a href="login" onclick="openLogoutModal(event)" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🔌 Log Out
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            <!-- <div class="bg-white shadow-md p-4 rounded-lg"> -->
                <h2 class="text-xl font-bold">Dashboard</h2>
            <!-- </div> -->

            <!-- Notifikasi Selamat Datang -->
            <div class="bg-green-200 text-green-800 p-4 rounded-lg mt-4">
                <h3 class="font-bold">Selamat Datang!</h3>
                <p>Selamat Datang <strong>Bunga</strong> di Sistem Informasi Pengelolaan Nilai Mahasiswa. Anda Login Sebagai <strong>Dosen</strong></p>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h4 class="text-blue-600 font-bold">TAHUN AJARAN</h4>
                    <p class="text-2xl font-bold">2020/2021</p>
                </div>

                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h4 class="text-orange-500 font-bold">SEMESTER</h4>
                    <p class="text-2xl font-bold">Ganjil</p>
                </div>

                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h4 class="text-green-600 font-bold">MAHASISWA</h4>
                    <p class="text-2xl font-bold">1.090</p>
                </div>

                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h4 class="text-green-500 font-bold">DOSEN</h4>
                    <p class="text-2xl font-bold">200</p>
                </div>
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
        function toggleDropdown() {
            let dropdown = document.getElementById("dropdown");
            let arrow = document.getElementById("arrow");
            if (dropdown.classList.contains("hidden")) {
                dropdown.classList.remove("hidden");
                arrow.innerHTML = "▲";
            } else {
                dropdown.classList.add("hidden");
                arrow.innerHTML = "▼";
            }
        }

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

        function toggleSidebar() {
            let sidebar = document.getElementById("sidebar");
            if (sidebar.classList.contains("hidden")) {
                sidebar.classList.remove("hidden");
            } else {
                sidebar.classList.add("hidden");
            }
        }
    </script>
</body>

</html>