<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $response = Http::get('http://localhost:8080/matakuliah');

        if ($response->successful()) {
            $matkul = collect($response->json())->sortBy('kode_matkul')->values();
            return view('Matakuliah', compact('matkul'));
        } else {
            return back()->with('error', 'Gagal mengambil data dosen');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahmatkul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'kode_matkul' => 'required|unique:mata_kuliah,kode_matkul',
                'nama_matkul' => 'required',
                'semester' => 'required',
                'sks' => 'required'
            ]);

            Http::post('http://localhost:8080/matakuliah', $validate);

            response()->json([
                'success' => true,
                'message' => 'mahasiswa berhasil ditambahkan!',
                'data' => $request
            ], 201);

            return redirect()->route('matakuliah.index');
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
    public function show(matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($matakuliah)
    {
        //

        $respon_matakuliah = Http::get("http://localhost:8080/matakuliah/$matakuliah/edit");
        $matakuliah = $respon_matakuliah->json();
        return view('editmatkul', [
            'matakuliah' => $matakuliah
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $matakuliah)
    {
        try {
            $validate = $request->validate([
                'kode_matkul' => 'required',
                'nama_matkul' => 'required',
                'semester' => 'required',
                'sks' => 'required'
            ]);

            Http::put("http://localhost:8080/matakuliah/$matakuliah", $validate);

            response()->json([
                'success' => true,
                'message' => 'Dosen berhasil diperbarui',
                'data' => $request
            ], 200);

            return redirect()->route('matakuliah.index');
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
    public function destroy($matakuliah)
    {
        //
        Http::delete("http://localhost:8080/matakuliah/$matakuliah");
        return redirect()->route('matakuliah.index');
    }
}
