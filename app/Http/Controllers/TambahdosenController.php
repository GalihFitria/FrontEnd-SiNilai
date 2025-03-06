<?php

namespace App\Http\Controllers;

use App\Models\tambahdosen;
use Illuminate\Http\Request;

class TambahdosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('tambahdosen');
        

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
        // Validasi input
        $request->validate([
            'nidn' => 'required|unique:tambahdosens,nidn|max:15',
            'nama_dosen' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Tambahdosen::create([
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
        ]);

        return redirect()->route('datadosen')->with('success', 'Data berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(tambahdosen $tambahdosen)
    {
        $dataDosen = Tambahdosen::orderBy('nidn', 'asc')->get(); // Urutkan dari NIDN terkecil
        return view('datadosen', compact('dataDosen'));
        // $dataDosen = Tambahdosen::all();
        // return view('datadosen', compact('dataDosen')); // Pastikan ada file datadosen.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahdosen $tambahdosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahdosen $tambahdosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahdosen $tambahdosen)
    {
        // $dosen = Tambahdosen::findOrFail($tambahdosen);
        // $dosen->delete();

        // return redirect()->route('datadosen')->with('success', 'Data dosen berhasil dihapus');
    }
}
