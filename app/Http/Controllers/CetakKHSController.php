<?php

namespace App\Http\Controllers;

use App\Models\cetakKHS;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakKHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('cetakKHS');
        $response = Http::get('http://localhost:8080/nilaiview'); // ganti dengan endpoint API KHS yang sesuai

        if ($response->successful()) {
            $khs = collect($response->json());
            return view('cetakKHS', compact('khs'));
        } else {
            return back()->with('error', 'Gagal mengambil data KHS');
        }
    }

    public function exportPdf()
    {
        $response = Http::get('http://localhost:8080/nilaiview');
        if ($response->successful()) {
            $khs = collect($response->json());
            $pdf = Pdf::loadView('pdf.cetak', compact('khs')); // Ubah 'cetak.pdf' menjadi 'pdf.cetak'
            return $pdf->download('khs.pdf');
        } else {
            return back()->with('error', 'Gagal mengambil data untuk PDF');
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
    public function show(cetakKHS $cetakKHS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cetakKHS $cetakKHS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cetakKHS $cetakKHS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cetakKHS $cetakKHS)
    {
        //
    }
}
