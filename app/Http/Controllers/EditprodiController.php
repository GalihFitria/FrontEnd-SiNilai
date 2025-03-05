<?php

namespace App\Http\Controllers;

use App\Models\editprodi;
use Illuminate\Http\Request;

class EditprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('editprodi');
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
    public function show(editprodi $editprodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editprodi $editprodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, editprodi $editprodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editprodi $editprodi)
    {
        //
    }
}
