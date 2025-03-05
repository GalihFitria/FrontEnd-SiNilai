<?php

namespace App\Http\Controllers;

use App\Models\tambahkelas;
use Illuminate\Http\Request;

class TambahkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('tambahkelas');
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
    public function show(tambahkelas $tambahkelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahkelas $tambahkelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahkelas $tambahkelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahkelas $tambahkelas)
    {
        //
    }
}
