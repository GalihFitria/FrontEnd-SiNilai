<?php

namespace App\Http\Controllers;

use App\Models\editmatkul;
use Illuminate\Http\Request;

class EditmatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('editmatkul');
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
    public function show(editmatkul $editmatkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editmatkul $editmatkul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, editmatkul $editmatkul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editmatkul $editmatkul)
    {
        //
    }
}
