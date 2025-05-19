<?php

namespace App\Http\Controllers;

use App\Models\datadosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatadosenController extends Controller
{
    /**
     * menampilkan daftar semua data dosen
     * mengambil data dari API eksternal dan menampilkannya pada view datadosen
     */
    public function index()
    {
        // return view ('datadosen');
        $response = Http::get('http://localhost:8080/dosen');

        if ($response->successful()) { 
        // mengurutkan data dosen berdasarkan NIDN
            $dosen = collect($response->json())->sortBy('nidn')->values();
            return view('datadosen', compact('dosen'));
        } else {
            //jika gagal mengambil data, kembali ke halaman sebelumnya dengan pesan error
            return back()->with('error', 'Gagal mengambil data dosen');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahdosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nidn' => 'required|unique:dosen,nidn',
                'nama_dosen' => 'required'
            ]);

            Http::post('http://localhost:8080/dosen', $validate);

            response()->json([
                'success' => true,
                'message' => 'Dosen berhasil ditambahkan!',
                'data' => $request
            ], 201);

            return redirect()->route('dosen.index');
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
    public function show(datadosen $datadosen) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($datadosen)
    {

        $respon_dosen = Http::get("http://localhost:8080/dosen/$datadosen/edit");
        $dosen = $respon_dosen->json();
        return view('editdosen', [
            'dosen' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $datadosen)
    {

        try {
            $validate = $request->validate([
                'nidn' => 'required',
                'nama_dosen' => 'required'
            ]);

            Http::put("http://localhost:8080/dosen/$datadosen", $validate);

            response()->json([
                'success' => true,
                'message' => 'Dosen berhasil diperbarui',
                'data' => $request
            ], 200);

            return redirect()->route('dosen.index');
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
    public function destroy($datadosen)
    {
        //
        Http::delete("http://localhost:8080/dosen/$datadosen");
        return redirect()->route('dosen.index');
    }
}
