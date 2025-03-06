<?php

namespace App\Http\Controllers;

use App\Models\datadosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatadosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view ('datadosen');
        $response = Http::get('http://localhost:8080/dosen');

        if ($response->successful()) {
            $dosen = collect($response->json())->sortBy('nidn')->values();
            return view('datadosen', compact('dosen'));
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
    public function show(datadosen $datadosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(datadosen $datadosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, datadosen $datadosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datadosen $datadosen)
    {
        //
    }
}
