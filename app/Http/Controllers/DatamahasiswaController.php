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
        //
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
    public function edit(datamahasiswa $datamahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, datamahasiswa $datamahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datamahasiswa $datamahasiswa)
    {
        //
    }
}
