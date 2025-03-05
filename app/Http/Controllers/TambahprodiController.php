<?php

namespace App\Http\Controllers;

use App\Models\tambahprodi;
use Illuminate\Http\Request;

class TambahprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return view ('tambahprodi');
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
    public function show(tambahprodi $tambahprodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahprodi $tambahprodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahprodi $tambahprodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahprodi $tambahprodi)
    {
        //
    }
}
