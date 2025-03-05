<?php

namespace App\Http\Controllers;

use App\Models\tambahmahasiswa;
use Illuminate\Http\Request;

class TambahmahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('tambahmahasiswa');
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
    public function show(tambahmahasiswa $tambahmahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahmahasiswa $tambahmahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahmahasiswa $tambahmahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahmahasiswa $tambahmahasiswa)
    {
        //
    }
}
