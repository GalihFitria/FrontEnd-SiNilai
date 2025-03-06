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
    public function show(dataprodi $dataprodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dataprodi $dataprodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dataprodi $dataprodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dataprodi $dataprodi)
    {
        //
    }
}
