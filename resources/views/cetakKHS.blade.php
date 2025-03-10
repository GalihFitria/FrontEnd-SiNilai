<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak KHS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100" data-page="cetakKHS">
    <div class="flex">
        
        <aside class="w-64 bg-blue-700 min-h-screen text-white p-4">
            <h1 class="text-center text-2xl font-bold mb-6">SiNilai</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="dashboard_mahasiswa" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li class="mb-4 relative">
                        <button id="dropdown-btn" class="w-full flex items-center justify-between text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            📊 Pengolahan Data
                            <span id="arrow">▼</span>
                        </button>
                        <ul id="dropdown-menu" class="hidden bg-blue-600 mt-2 rounded-lg">
                            <li><a href="cetakKHS" class="block px-4 py-2 hover:bg-blue-700 active-link">cetak KHS</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="login" onclick="openLogoutModal(event)" class="w-full flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🔐 Log Out
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

       
        <main class="flex-1 p-6">
            <h2 class=" text-xl font-bold">Cetak KHS</h2>
            <div class="bg-white shadow-md p-4 rounded-lg mt-4">
                <a href="tambahdosen" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Data</a>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <!-- <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No.</th>
                            <th class="border p-2">NIDN</th>
                            <th class="border p-2">Nama Dosen</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-2 text-center">1</td>
                            <td class="border p-2">12334567890</td>
                            <td class="border p-2">Galih Fitria Fijaf,S.Kom</td>
                            <td class="border p-2 text-center">
                                <a href="editdosen" class="text-blue-500 hover:underline">✏️</a> |
                                <a href="datadosen" onclick="openDeleteModal(event, this)" class="text-red-500 hover:underline">🗑️</a>
                            </td>
                        </tr>
                    </tbody> -->
                </table>
            </div>
        </main>
    </div>

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
        document.addEventListener("DOMContentLoaded", function() {
            let currentPage = document.body.getAttribute("data-page");
            let dropdownMenu = document.getElementById("dropdown-menu");
            let dropdownBtn = document.getElementById("dropdown-btn");
            let arrow = document.getElementById("arrow");
            let activeLink = document.querySelector(`a[href='${currentPage}']`);

            let pages = ["cetakKHS"];

            if (pages.includes(currentPage)) {
                dropdownMenu.classList.remove("hidden");
                arrow.innerHTML = "▲";
            }

            if (activeLink) {
                activeLink.classList.add("bg-blue-800", "text-white");
            }

            dropdownBtn.addEventListener("click", function() {
                if (dropdownMenu.classList.contains("hidden")) {
                    dropdownMenu.classList.remove("hidden");
                    arrow.innerHTML = "▲";
                } else {
                    dropdownMenu.classList.add("hidden");
                    arrow.innerHTML = "▼";
                }
            });
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

        // let deleteElement = null;

        // function openDeleteModal(event, element) {
        //     event.preventDefault();
        //     deleteElement = element.closest("tr");
        //     document.getElementById("deleteModal").classList.remove("hidden");
        // }

        // function closeDeleteModal() {
        //     document.getElementById("deleteModal").classList.add("hidden");
        //     deleteElement = null;
        // }

        // function deleteData() {
        //     if (deleteElement) {
        //         deleteElement.remove();
        //         deleteElement = null;
        //     }
        //     closeDeleteModal();
        // }
    </script>
</body>

</html>