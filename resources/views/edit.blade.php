<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penilaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <body class="flex items-center justify-center h-screen bg-blue-100">

        <body class="flex items-center justify-center h-screen bg-blue-100">

            <!-- Modal Form -->
            <div id="formModal" class="flex items-center justify-center bg-gray-800 bg-opacity-50 fixed inset-0">
                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                    <h2 class="text-xl font-bold mb-4 text-center">Edit Data Penilaian</h2>

                    <label class="block">NIDN</label>
                    <input type="text" class="border w-full p-2 mb-2 rounded">

                    <label class="block">Kode Matkul</label>
                    <input type="text" class="border w-full p-2 mb-2 rounded">

                    <label class="block">Nilai Tugas</label>
                    <input type="number" class="border w-full p-2 mb-2 rounded">

                    <label class="block">Nilai UTS</label>
                    <input type="number" class="border w-full p-2 mb-2 rounded">

                    <label class="block">Nilai UAS</label>
                    <input type="number" class="border w-full p-2 mb-4 rounded">

                    <a href="penilaian" class="block text-center bg-blue-500 text-white px-4 py-2 rounded w-full">
                        Ubah Data
                    </a>


                    <script>
                        function openEditModal(element) {
                            let row = element.closest("tr");
                            let cells = row.getElementsByTagName("td");

                            document.getElementById("editNIDN").value = cells[2].innerText;
                            document.getElementById("editKodeMatkul").value = cells[3].innerText;
                            document.getElementById("editNilaiTugas").value = cells[4].innerText;
                            document.getElementById("editNilaiUTS").value = cells[5].innerText;
                            document.getElementById("editNilaiUAS").value = cells[6].innerText;

                            document.getElementById("editModal").classList.remove("hidden");
                        }

                        function closeEditModal() {
                            document.getElementById("editModal").classList.add("hidden");
                        }

                        function saveEditData() {
                            alert("Data berhasil diubah!");
                            closeEditModal();
                        }
                    </script>
        </body>

</html>