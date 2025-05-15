<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="flex items-center justify-center h-screen bg-blue-100">

        <div id="formModal" class="flex items-center justify-center bg-gray-800 bg-opacity-50 fixed inset-0">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4 text-center">Edit Data Mahasiswa</h2>
                <form action="{{ route('mahasiswa.update', $mahasiswa['npm']) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="block">NPM</label>
                    <input type="text" name="npm" value="{{$mahasiswa['npm']}}" id="editNPM" class="border w-full p-2 mb-2 rounded">

                    <label class="block">Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" value="{{$mahasiswa['nama_mhs']}}" id="editNamaMahasiswa" class="border w-full p-2 mb-2 rounded">

                    <label for="jurusan" class="block">Kode Kelas</label>
                    <select id="jurusan" name="kode_kelas" class="border w-full p-2 mb-2 rounded">
                        @foreach($kelas as $row)
                        <option value="{{ $row['kode_kelas'] }}"
                            {{ $mahasiswa['kode_kelas'] == $row['kode_kelas'] ? 'selected' : '' }}>
                            {{ $row['nama_kelas'] }}
                        </option>
                        @endforeach
                    </select>

                    <label for="jurusan" class="block">Prodi</label>
                    <select id="jurusan" name="id_prodi" class="border w-full p-2 mb-2 rounded">
                        @foreach($prodi as $row)
                        <option value="{{ $row['id_prodi'] }}"
                            {{ $mahasiswa['id_prodi'] == $row['id_prodi'] ? 'selected' : '' }}>
                            {{ $row['nama_prodi'] }}
                            @endforeach
                    </select>

                    <div class="flex justify-center space-x-6 mt-4">
                        <a href="{{route('mahasiswa.index')}}" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition duration-200 shadow-md">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200 shadow-md active:scale-95">
                            Ubah Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
            <a href="datamahasiswa" onclick="closeSuccessModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">OK<a>
        </div>
    </div>

    <script>
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