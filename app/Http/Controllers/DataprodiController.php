<?php

namespace App\Http\Controllers;

use App\Models\dataprodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view ('dataprodi');
        $response = Http::get('http://localhost:8080/prodi');

        if ($response->successful()) {
            $prodi = collect($response->json())->sortBy('id_prodi')->values();
            return view('dataprodi', compact('prodi'));
        } else {
            return back()->with('error', 'Gagal mengambil data prodi');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahprodi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'id_prodi' => 'required|unique:prodi,id_prodi',
                'nama_prodi' => 'required',

            ]);

            Http::post('http://localhost:8080/prodi', $validate);

            response()->json([
                'success' => true,
                'message' => 'mahasiswa berhasil ditambahkan!',
                'data' => $request
            ], 201);

            return redirect()->route('prodi.index');
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
    public function show(dataprodi $dataprodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dataprodi)
    {
        //
        $respon_prodi = Http::get("http://localhost:8080/prodi/$dataprodi/edit");
        $prodi = $respon_prodi->json();
        return view('editprodi', [
            'prodi' => $prodi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dataprodi)
    {
        try {
            $validate = $request->validate([
                'id_prodi' => 'required',
                'nama_prodi' => 'required'
            ]);

            Http::put("http://localhost:8080/prodi/$dataprodi", $validate);

            response()->json([
                'success' => true,
                'message' => 'Prodi berhasil diperbarui',
                'data' => $request
            ], 200);

            return redirect()->route('prodi.index');
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
    public function destroy($dataprodi)
    {
        //
        Http::delete("http://localhost:8080/prodi/$dataprodi");
        return redirect()->route('prodi.index');
    }
}
