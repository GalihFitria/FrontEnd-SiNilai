<?php

namespace App\Http\Controllers;

use App\Models\tambahdata;
use Illuminate\Http\Request;

class TambahdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tambah data');
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
    public function show(tambahdata $tambahdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahdata $tambahdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahdata $tambahdata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahdata $tambahdata)
    {
        //
    }
}
