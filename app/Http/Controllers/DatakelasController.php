<?php

namespace App\Http\Controllers;

use App\Models\datakelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatakelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('datakelas');
        $response = Http::get('http://localhost:8080/kelas');

        if ($response->successful()) {
            $kelas = collect($response->json())->sortBy('kode_kelas')->values();
            return view('datakelas', compact('kelas'));
        } else {
            return back()->with('error', 'Gagal mengambil data kelas');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahkelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'kode_kelas' => 'required|unique:kelas,kode_kelas',
                'nama_kelas' => 'required',

            ]);

            Http::post('http://localhost:8080/kelas', $validate);

            response()->json([
                'success' => true,
                'message' => 'mahasiswa berhasil ditambahkan!',
                'data' => $request
            ], 201);

            return redirect()->route('kelas.index');
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
    public function show(datakelas $datakelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($datakelas)
    {

        $respon_kelas = Http::get("http://localhost:8080/kelas/$datakelas/edit");
        $kelas = $respon_kelas->json();

        return view('editkelas', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $datakelas)
    {
        try {
            $validate = $request->validate([
                'kode_kelas' => 'required',
                'nama_kelas' => 'required'
            ]);

            Http::put("http://localhost:8080/kelas/$datakelas", $validate);

            response()->json([
                'success' => true,
                'message' => 'Kelas berhasil diperbarui',
                'data' => $request
            ], 200);

            return redirect()->route('kelas.index');
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
    public function destroy($datakelas)
    {
        //
        Http::delete("http://localhost:8080/kelas/$datakelas");
        return redirect()->route('kelas.index');
    }
}
