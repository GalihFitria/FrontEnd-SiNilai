<?php

namespace App\Http\Controllers;

use App\Models\datamahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatamahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view ('datamahasiswa');
        $response = Http::get('http://localhost:8080/mahasiswa');

        if ($response->successful()) {
            $mahasiswa = collect($response->json())->sortBy('npm')->values();
            return view('datamahasiswa', compact('mahasiswa'));
        } else {
            return back()->with('error', 'Gagal mengambil data mahasiswa');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $respon_kelas = Http::get('http://localhost:8080/kelas');
        $kelas = collect($respon_kelas->json())->sortBy('kode_kelas')->values();

        $respon_prodi = Http::get('http://localhost:8080/prodi');
        $prodi = collect($respon_prodi->json())->sortBy('id_prodi')->values();

        return view('tambahmahasiswa', [
            'kelas' => $kelas,
            'prodi' => $prodi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'npm' => 'required|unique:mahasiswa,npm',
                'nama_mhs' => 'required',
                'kode_kelas' => 'required',
                'id_prodi' => 'required'
            ]);

            Http::post('http://localhost:8080/mahasiswa', $validate);

            response()->json([
                'success' => true,
                'message' => 'mahasiswa berhasil ditambahkan!',
                'data' => $request
            ], 201);

            return redirect()->route('mahasiswa.index');
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
    public function show(datamahasiswa $datamahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($datamahasiswa)
    {

        $respon_mahasiswa = Http::get("http://localhost:8080/mahasiswa/$datamahasiswa/edit");
        if (!$respon_mahasiswa->successful()) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        $mahasiswa = $respon_mahasiswa->json();

        // Ambil data kelas
        $respon_kelas = Http::get('http://localhost:8080/kelas');
        $kelas = collect($respon_kelas->json())->sortBy('kode_kelas')->values();

        // Ambil data prodi
        $respon_prodi = Http::get('http://localhost:8080/prodi');
        $prodi = collect($respon_prodi->json())->sortBy('id_prodi')->values();

        // Kirim semua data ke view
        return view('editmahasiswa', [
            'mahasiswa' => $mahasiswa,
            'kelas' => $kelas,
            'prodi' => $prodi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $datamahasiswa)
    {
        try {
            $validate = $request->validate([
                'npm' => 'required',
                'nama_mhs' => 'required',
                'kode_kelas' => 'required',
                'id_prodi' => 'required',


            ]);

            Http::put("http://localhost:8080/mahasiswa/$datamahasiswa", $validate);

            response()->json([
                'success' => true,
                'message' => 'Mahasiswa berhasil diperbarui',
                'data' => $request
            ], 200);

            return redirect()->route('mahasiswa.index');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($datamahasiswa)
    {
        Http::delete("http://localhost:8080/mahasiswa/$datamahasiswa");
        return redirect()->route('mahasiswa.index');
    }
}
