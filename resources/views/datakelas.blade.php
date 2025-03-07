<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100" data-page="datakelas">
    <div class="flex">
       
        <aside class="w-64 bg-blue-700 min-h-screen text-white p-4">
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
                        <button id="dropdown-btn" class="w-full flex items-center justify-between text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            📊 Pengolahan Data
                            <span id="arrow">▼</span>
                        </button>
                        <ul id="dropdown-menu" class="hidden bg-blue-600 mt-2 rounded-lg">
                            <li><a href="datadosen" class="block px-4 py-2 hover:bg-blue-700">Data Dosen</a></li>
                            <li><a href="datamahasiswa" class="block px-4 py-2 hover:bg-blue-700">Data Mahasiswa</a></li>
                            <li><a href="matakuliah" class="block px-4 py-2 hover:bg-blue-700">Data Mata Kuliah</a></li>
                            <li><a href="dataprodi" class="block px-4 py-2 hover:bg-blue-700">Data Prodi</a></li>
                            <li><a href="datakelas" class="block px-4 py-2 hover:bg-blue-700 active-link">Data Kelas</a></li>
                            <li><a href="penilaian" class="block px-4 py-2 hover:bg-blue-700">Penilaian</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        
        <main class="flex-1 p-6">
            <h2 class="text-center text-4xl font-bold">.::Data Kelas::.</h2>
            <div class="bg-white shadow-md p-4 rounded-lg mt-4">
                <div class="flex justify-between mb-4">
                    <a href="tambahkelas" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Data</a>
                    <input type="text" id="searchInput" placeholder="Cari Kelas..." class="border p-2 rounded w-1/3">
                </div>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No.</th>
                            <th class="border p-2">Kode</th>
                            <th class="border p-2">Nama Kelas</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kelasTable">
                        @foreach($kelas as $index => $k)
                        <tr>
                            <td class="border p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border p-2">{{ $k['kode_kelas'] }}</td>
                            <td class="border p-2">{{ $k['nama_kelas'] }}</td>
                            <td class="border p-2 text-center">
                                <a href="editkelas" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</a>
                                <button onclick="openDeleteModal(event, this)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button id="prevPage" class="bg-gray-400 text-white px-3 py-1 rounded hover:bg-gray-500">Previous</button>
                <span id="pageInfo" class="text-gray-700">Page 1</span>
                <button id="nextPage" class="bg-gray-400 text-white px-3 py-1 rounded hover:bg-gray-500">Next</button>
            </div>
        </main>
    </div>

    
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="mt-4 flex justify-center space-x-4">
                <button onclick="deleteData()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Ya, Hapus</button>
                <button onclick="closeDeleteModal()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
            </div>
        </div>
    </div>

    <script>
        let currentPage = 1;
        const rowsPerPage = 10;
        const table = document.getElementById("kelasTable");
        const rows = table.getElementsByTagName("tr");
        const totalPages = Math.ceil(rows.length / rowsPerPage);

        function showPage(page) {
            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = "none";
            }
            let start = (page - 1) * rowsPerPage;
            let end = start + rowsPerPage;
            for (let i = start; i < end && i < rows.length; i++) {
                rows[i].style.display = "";
            }
            document.getElementById("pageInfo").textContent = `Page ${page} of ${totalPages}`;
        }

        document.getElementById("prevPage").addEventListener("click", function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        document.getElementById("nextPage").addEventListener("click", function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        showPage(currentPage);

        document.addEventListener("DOMContentLoaded", function() {
            let currentPage = document.body.getAttribute("data-page");
            let dropdownMenu = document.getElementById("dropdown-menu");
            let dropdownBtn = document.getElementById("dropdown-btn");
            let arrow = document.getElementById("arrow");
            let activeLink = document.querySelector(`a[href='${currentPage}']`);

            let pages = ["penilaian", "datadosen", "datamahasiswa", "matakuliah", "dataprodi", "datakelas"];

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


        function openDeleteModal(event, element) {
            event.preventDefault();
            deleteElement = element.closest("tr");
            document.getElementById("deleteModal").classList.remove("hidden");
        }

        function closeDeleteModal() {
            document.getElementById("deleteModal").classList.add("hidden");
            deleteElement = null;
        }

        function deleteData() {
            if (deleteElement) {
                deleteElement.remove();
                deleteElement = null;
            }
            closeDeleteModal();
        }

        
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#kelasTable tr");

            rows.forEach(row => {
                let namaDosen = row.cells[2].textContent.toLowerCase();
                if (namaDosen.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>