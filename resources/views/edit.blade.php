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


            <div id="formModal" class="flex items-center justify-center bg-gray-800 bg-opacity-50 fixed inset-0">
                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                    <h2 class="text-xl font-bold mb-4 text-center">Edit Data Penilaian</h2>
                    <form action="{{ route('nilai.update', $penilaian['id_nilai']) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label class="block text-sm">Id Nilai</label>
                        <input type="number" name="id_nilai" value="{{$penilaian['id_nilai']}}" class="border w-full p-2 mb-2 rounded text-sm">

                        <label class="block text-sm">NPM</label>
                        <select name="npm" class="border w-full p-2 mb-2 rounded text-sm">
                            @foreach($mahasiswa as $row)
                            <option value="{{ $row['npm'] }}"
                                {{ $penilaian['npm'] == $row['npm'] ? 'selected' : '' }}>
                                {{ $row['npm'] }}
                            </option>
                            @endforeach
                        </select>

                        <label class="block text-sm">Nama Matkul</label>
                        <select name="kode_matkul" class="border w-full p-2 mb-2 rounded text-sm">
                            @foreach($matakuliah as $row)
                            <option value="{{ $row['kode_matkul'] }}"
                                {{ $penilaian['kode_matkul'] == $row['kode_matkul'] ? 'selected' : '' }}>
                                {{ $row['nama_matkul'] }}
                            </option>
                            @endforeach
                        </select>

                        <label class="block text-sm">Nama Dosen</label>
                        <select name="nidn" class="border w-full p-2 mb-2 rounded text-sm">
                            @foreach($dosen as $row)
                            <option value="{{ $row['nidn'] }}"
                                {{ $penilaian['nidn'] == $row['nidn'] ? 'selected' : '' }}>
                                {{ $row['nama_dosen'] }}
                            </option>
                            @endforeach
                        </select>



                        <label class="block text-sm">Nilai Tugas</label>
                        <input type="number" name="tugas" id="tugas" value="{{$penilaian['tugas']}}" class="border w-full p-2 mb-2 rounded text-sm" oninput="hitungNilai()">

                        <label class="block text-sm">Nilai UTS</label>
                        <input type="number" name="uts" id="uts" value="{{$penilaian['uts']}}" class="border w-full p-2 mb-2 rounded text-sm" oninput="hitungNilai()">

                        <label class="block text-sm">Nilai UAS</label>
                        <input type="number" name="uas" id="uas" value="{{$penilaian['uas']}}" class="border w-full p-2 mb-2 rounded text-sm" oninput="hitungNilai()">

                        <label class="block text-sm">Nilai Akhir</label>
                        <input type="number" name="nilai_akhir" id="nilai_akhir" value="{{$penilaian['nilai_akhir']}}" class="border w-full p-2 mb-2 rounded text-sm" readonly>

                        <label class="block text-sm">Status</label>
                        <input type="text" name="status" id="status" value="{{$penilaian['status']}}" class="border w-full p-2 mb-4 rounded text-sm" readonly>

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

                <div id="confirmModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
                        <h2 class="text-lg font-bold mb-4">Konfirmasi Perubahan</h2>
                        <p>Apakah Anda yakin ingin mengubah data ini?</p>
                        <div class="mt-4 flex justify-center space-x-4">
                            <button onclick="showSuccessModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ya, Ubah</button>
                            <button onclick="closeConfirmModal()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
                        </div>
                    </div>
                </div>


                <div id="successModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
                        <div class="flex justify-center items-center mb-4">
                            <div class="animate-spin rounded-full h-12 w-12 border-t-4 border-blue-500"></div>
                        </div>
                        <h2 class="text-lg font-bold mb-4">Data berhasil diubah!</h2>
                        <a href="penilaian" onclick="closeSuccessModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">OK<a>
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


                    function openConfirmModal() {
                        document.getElementById("confirmModal").classList.remove("hidden");
                    }

                    function closeConfirmModal() {
                        document.getElementById("confirmModal").classList.add("hidden");
                    }

                    function showSuccessModal() {
                        closeConfirmModal();
                        document.getElementById("successModal").classList.remove("hidden");
                        setTimeout(() => {
                            document.querySelector(".animate-spin").classList.add("hidden");
                        }, 1000);
                    }

                    function closeSuccessModal() {
                        document.getElementById("successModal").classList.add("hidden");
                    }
                </script>
        </body>

</html>