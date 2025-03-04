<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penilaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-blue-100">

    <!-- Modal Form -->
    <div id="formModal" class="flex items-center justify-center bg-gray-800 bg-opacity-50 fixed inset-0">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4 text-center">Tambah Data Penilaian</h2>

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
                Submit
            </a>

        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById("formModal").classList.add("hidden");
        }
    </script>

</body>

</html>