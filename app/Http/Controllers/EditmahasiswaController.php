<?php

namespace App\Http\Controllers;

use App\Models\editmahasiswa;
use Illuminate\Http\Request;

class EditmahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return view ('editmahasiswa');
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
    public function show(editmahasiswa $editmahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editmahasiswa $editmahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, editmahasiswa $editmahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editmahasiswa $editmahasiswa)
    {
        //
    }
}
