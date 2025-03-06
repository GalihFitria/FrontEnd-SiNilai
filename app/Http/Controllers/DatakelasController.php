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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(datakelas $datakelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, datakelas $datakelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datakelas $datakelas)
    {
        //
    }
}
