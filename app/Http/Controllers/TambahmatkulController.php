<?php

namespace App\Http\Controllers;

use App\Models\tambahmatkul;
use Illuminate\Http\Request;

class TambahmatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('tambahmatkul');
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
    public function show(tambahmatkul $tambahmatkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahmatkul $tambahmatkul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahmatkul $tambahmatkul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahmatkul $tambahmatkul)
    {
        //
    }
}
