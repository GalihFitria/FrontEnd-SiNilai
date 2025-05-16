<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penilaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100">
    <div id="formModal" class="flex items-center justify-center bg-gray-800 bg-opacity-50 fixed inset-0 px-4 py-10">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md max-h-[90vh] overflow-y-auto">
            <h2 class="text-xl font-bold mb-4 text-center">Tambah Data Penilaian</h2>
            <form action="{{route('nilai.store')}}" method="post">
                @csrf

                <label class="block text-sm">Id Nilai</label>
                <input type="number" name="id_nilai" class="border w-full p-2 mb-2 rounded text-sm">

                <!-- <label class="block text-sm">NPM</label>
                <input type="number" name="npm" class="border w-full p-2 mb-2 rounded text-sm"> -->
                <label class="block text-sm">NPM</label>
                <select name="npm" class="border w-full p-2 mb-2 rounded text-sm">
                    @foreach($mahasiswa as $row)
                    <option value="{{$row['npm']}}">{{$row['npm']}}</option>
                    @endforeach
                </select>

                <label class="block text-sm">Nama Matkul</label>
                <select name="kode_matkul" class="border w-full p-2 mb-2 rounded text-sm">
                    @foreach($matakuliah as $row)
                    <option value="{{$row['kode_matkul']}}">{{$row['nama_matkul']}}</option>
                    @endforeach
                </select>

                <label class="block text-sm">Nama Dosen</label>
                <select name="nidn" class="border w-full p-2 mb-2 rounded text-sm">
                    @foreach($dosen as $row)
                    <option value="{{$row['nidn']}}">{{$row['nama_dosen']}}</option>
                    @endforeach
                </select>

                <label class="block text-sm">Nilai Tugas</label>
                <input type="number" name="tugas" id="tugas" class="border w-full p-2 mb-2 rounded text-sm" oninput="hitungNilai()">

                <label class="block text-sm">Nilai UTS</label>
                <input type="number" name="uts" id="uts" class="border w-full p-2 mb-2 rounded text-sm" oninput="hitungNilai()">

                <label class="block text-sm">Nilai UAS</label>
                <input type="number" name="uas" id="uas" class="border w-full p-2 mb-2 rounded text-sm" oninput="hitungNilai()">

                <label class="block text-sm">Nilai Akhir</label>
                <input type="number" name="nilai_akhir" id="nilai_akhir" class="border w-full p-2 mb-2 rounded text-sm" readonly>

                <label class="block text-sm">Status</label>
                <input type="text" name="status" id="status" class="border w-full p-2 mb-4 rounded text-sm" readonly>

                <div class="flex justify-center space-x-4 mt-4">
                    <a href="{{route('nilai.index')}}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition duration-200 text-sm">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200 active:scale-95 text-sm">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function hitungNilai() {
            // Ambil nilai dari input
            var tugas = parseFloat(document.getElementById("tugas").value) || 0;
            var uts = parseFloat(document.getElementById("uts").value) || 0;
            var uas = parseFloat(document.getElementById("uas").value) || 0;

            // Hitung nilai akhir
            var nilaiAkhir = (tugas + uts + uas) / 3;

            // Tentukan status berdasarkan nilai akhir
            var status = nilaiAkhir >= 50 ? 'Lulus' : 'Tidak Lulus';

            // Tampilkan nilai akhir dan status
            document.getElementById("nilai_akhir").value = nilaiAkhir.toFixed(2);
            document.getElementById("status").value = status;
        }

        function closeModal() {
            document.getElementById("formModal").classList.add("hidden");
        }

        function showSuccessModal() {
            document.getElementById("successModal").classList.remove("hidden");
            setTimeout(() => {
                document.querySelector(".animate-spin").classList.add("hidden");
            }, 1000);
        }

        function redirectToDataDosen() {
            window.location.href = "penilaian";
        }
    </script>

</body>

</html>