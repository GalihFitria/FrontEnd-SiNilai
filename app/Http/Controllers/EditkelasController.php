<?php

namespace App\Http\Controllers;

use App\Models\editkelas;
use Illuminate\Http\Request;

class EditkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('editkelas');
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
    public function show(editkelas $editkelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editkelas $editkelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, editkelas $editkelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editkelas $editkelas)
    {
        //
    }
}
