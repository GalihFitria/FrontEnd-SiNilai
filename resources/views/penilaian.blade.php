<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100" data-page="penilaian">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-700 min-h-screen text-white p-4">
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
            <h1 class="text-center text-4xl font-bold mb-6" style="font-family: 'Lobster', cursive;">Si Nilai</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard.dosen') }}" class="flex items-center space-x-2 text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li class="mb-4 relative">
                        <button id="dropdown-btn" class="w-full flex items-center justify-between text-white font-semibold hover:bg-blue-800 p-2 rounded">
                            📊 Pengolahan Data
                            <span id="arrow">▼</span>
                        </button>
                        <ul id="dropdown-menu" class="hidden bg-blue-600 mt-2 rounded-lg">
                            <li><a href="{{route('dosen.index')}}" class="block px-4 py-2 hover:bg-blue-700">Data Dosen</a></li>
                            <li><a href="{{route('mahasiswa.index')}}" class="block px-4 py-2 hover:bg-blue-700">Data Mahasiswa</a></li>
                            <li><a href="{{route('matakuliah.index')}}" class="block px-4 py-2 hover:bg-blue-700 ">Data Mata Kuliah</a></li>
                            <li><a href="{{route('prodi.index')}}" class="block px-4 py-2 hover:bg-blue-700">Data Prodi</a></li>
                            <li><a href="{{route('kelas.index')}}" class="block px-4 py-2 hover:bg-blue-700">Data Kelas</a></li>
                            <li><a href="{{route('nilai.index')}}" class="block px-4 py-2 hover:bg-blue-700 active-link">Penilaian</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>


        <main class="flex-1 p-6">
            <h2 class="text-center text-4xl font-bold">.::Data Nilai Mahasiswa::.</h2>
            <div class="bg-white shadow-md p-4 rounded-lg mt-4">
                <div class="flex justify-between mb-4">
                    <a href="{{route('nilai.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Data</a>
                    <input type="text" id="searchInput" placeholder="Cari..." class="border p-2 rounded w-1/3">
                </div>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Id Nilai</th>
                            <th class="border p-2">NPM</th>
                            <th class="border p-2">Kode Matkul</th>
                            <th class="border p-2">NIDN</th>
                            <th class="border p-2">Tugas</th>
                            <th class="border p-2">UTS</th>
                            <th class="border p-2">UAS</th>
                            <th class="border p-2">Nilai Akhir</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="nilaiTable">
                        @foreach($nilai as $index => $n)
                        <tr>
                            <td class="border p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border p-2">{{ $n['id_nilai']}}</td>
                            <td class="border p-2">{{ $n['npm']}}</td>
                            <td class="border p-2">{{ $n['kode_matkul']}}</td>
                            <td class="border p-2">{{ $n['nidn']}}</td>
                            <td class="border p-2">{{ $n['tugas']}}</td>
                            <td class="border p-2">{{ $n['uts']}}</td>
                            <td class="border p-2">{{ $n['uas']}}</td>
                            <td class="border p-2">{{ $n['nilai_akhir']}}</td>
                            <td class="border p-2">{{ $n['status']}}</td>

                            <td class="border p-2 text-center flex gap-2 justify-center">
                                <a href="{{ route('nilai.edit', $n['id_nilai']) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</a>

                                <form action="{{ route('nilai.destroy', $n['id_nilai']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                                </form>
                            </td>

                            <!-- <td class="border p-2 text-center">
                                <a href="{{route('nilai.edit', $n['id_nilai'])}}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</a>
                                <form action="{{route('nilai.destroy',$n['id_nilai'])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-4">
                    <button id="prevPage" class="bg-gray-400 text-white px-3 py-1 rounded hover:bg-gray-500">Previous</button>
                    <span id="pageInfo" class="text-gray-700">Page 1</span>
                    <button id="nextPage" class="bg-gray-400 text-white px-3 py-1 rounded hover:bg-gray-500">Next</button>
                </div
                    </div>
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
        const rowsPerPage = 10; // Jumlah baris per halaman, bisa disesuaikan
        const rows = document.querySelectorAll("#nilaiTable tr");
        const totalPages = Math.ceil(rows.length / rowsPerPage);

        // Fungsi untuk menampilkan halaman tertentu
        function showPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });

            // Update tampilan info halaman
            document.getElementById("pageInfo").textContent = `Page ${page}`;
        }

        // Tombol sebelumnya
        document.getElementById("prevPage").addEventListener("click", function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        // Tombol berikutnya
        document.getElementById("nextPage").addEventListener("click", function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        // Tampilkan halaman pertama saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            showPage(currentPage);
        });

        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#nilaiTable tr");

            rows.forEach(row => {
                let namaDosen = row.cells[2].textContent.toLowerCase();
                if (namaDosen.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let currentPage = document.body.getAttribute("data-page");
            let dropdownMenu = document.getElementById("dropdown-menu");
            let dropdownBtn = document.getElementById("dropdown-btn");
            let arrow = document.getElementById("arrow");
            let activeLink = document.querySelector(`a[href='${currentPage}']`);

            let pages = ["penilaian", "dosen", "datamahasiswa", "datamatkul", "dataprodi", "datakelas"];

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

        let deleteElement = null;

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
    </script>
</body>

</html>