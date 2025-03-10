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
    public function show(penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penilaian $penilaian)
    {
        //
    }
}
