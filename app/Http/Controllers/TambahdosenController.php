<?php

namespace App\Http\Controllers;

use App\Models\tambahdosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TambahdosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return view ('tambahdosen');
        $response = Http::post('http://localhost:8080/dosen/');

        if ($response->successful()) {
            $tambahdosen = collect($response->json())->sortBy('nidn')->values();
            return view('Tambahdosen', compact('tambahdosen'));
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama_dosen' => 'required'
        ]);

        tambahdosen::create([
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(tambahdosen $tambahdosen)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahdosen $tambahdosen)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahdosen $tambahdosen)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20|unique:tambahdosens,nidn,' . $tambahdosen,
            'nama_dosen' => 'required|string|max:255',
        ]);

        $dosen = Tambahdosen::findOrFail($tambahdosen);
        $dosen->update($validated);

        return redirect()->route('datadosen')->with('success', 'Data dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahdosen $tambahdosen)
    {
       
    }
}
