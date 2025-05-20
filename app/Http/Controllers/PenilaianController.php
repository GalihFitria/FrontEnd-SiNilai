<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view ('penilaian');
        $response = Http::get('http://localhost:8080/nilai');

        if ($response->successful()) {
            $nilai = collect($response->json())->sortBy('id_nilai')->values();
            return view('penilaian', compact('nilai'));
        } else {
            return back()->with('error', 'Gagal mengambil data dosen');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $respon_mahasiswa = Http::get('http://localhost:8080/mahasiswa');
        $mahasiswa = collect($respon_mahasiswa->json())->sortBy('npm')->values();

        $respon_dosen = Http::get('http://localhost:8080/dosen');
        $dosen = collect($respon_dosen->json())->sortBy('nama_dosen')->values();

        $respon_matakuliah = Http::get('http://localhost:8080/matakuliah');
        $matakuliah = collect($respon_matakuliah->json())->sortBy('kode_matkul')->values();

        return view('tambahdata', [
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah,
            'dosen' => $dosen,


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            // Validasi input
            $validate = $request->validate([
                // 'id_nilai' => 'required|unique:nilai,id_nilai',
                'npm' => 'required',
                'kode_matkul' => 'required',
                'nidn' => 'required',
                'tugas' => 'required|numeric',
                'uts' => 'required|numeric',
                'uas' => 'required|numeric',
            ]);

            // Menghitung nilai_akhir dan status
            $nilaiAkhir = ($request->tugas + $request->uts + $request->uas) / 3;
            $status = $nilaiAkhir >= 50 ? 'Lulus' : 'Tidak Lulus';

            // Menyusun data untuk dikirim ke API eksternal
            $data = [
                // 'id_nilai' => $request->id_nilai,
                'npm' => $request->npm,
                'kode_matkul' => $request->kode_matkul,
                'nidn' => $request->nidn,
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'nilai_akhir' => $nilaiAkhir,
                'status' => $status,
            ];

            // Kirim data ke API eksternal
            $response = Http::post('http://localhost:8080/nilai', $data);

            // Cek apakah API mengembalikan response sukses
            if ($response->successful()) {
                return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan!');
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim data ke API eksternal.',
                ], 500);
            }
            return redirect()->route('nilai.index');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($penilaian)
    {
        //

        $respon_penilaian = Http::get("http://localhost:8080/nilai/$penilaian/edit");
        $penilaian = $respon_penilaian->json();

        $respon_mahasiswa = Http::get('http://localhost:8080/mahasiswa');
        $mahasiswa = $respon_mahasiswa->json();

        $respon_matakuliah = Http::get('http://localhost:8080/matakuliah');
        $matakuliah = $respon_matakuliah->json();

        $respon_dosen = Http::get('http://localhost:8080/dosen');
        $dosen = $respon_dosen->json();

        return view('edit', [
            'penilaian' => $penilaian,
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah,
            'dosen' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $penilaian)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'id_nilai' => 'required',
                'npm' => 'required',
                'kode_matkul' => 'required',
                'nidn' => 'required',
                'tugas' => 'required|numeric',
                'uts' => 'required|numeric',
                'uas' => 'required|numeric',
            ]);

            // Hitung nilai akhir dan status
            $nilaiAkhir = ($request->tugas + $request->uts + $request->uas) / 3;
            $status = $nilaiAkhir >= 50 ? 'Lulus' : 'Tidak Lulus';

            // Susun data
            $data = [
                'id_nilai' => $request->id_nilai,
                'npm' => $request->npm,
                'kode_matkul' => $request->kode_matkul,
                'nidn' => $request->nidn,
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'nilai_akhir' => $nilaiAkhir,
                'status' => $status,
            ];

            // Kirim ke API eksternal
            $response = Http::put("http://localhost:8080/nilai/$penilaian", $data);

            if ($response->successful()) {
                return redirect()->route('nilai.index')
                    ->with('success', 'Data nilai berhasil diperbarui.');
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal mengirim data ke API eksternal.');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($penilaian)
    {
        //
        Http::delete("http://localhost:8080/nilai/$penilaian");
        return redirect()->route('nilai.index');
    }
}
