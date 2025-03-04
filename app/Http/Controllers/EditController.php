<?php

namespace App\Http\Controllers;

use App\Models\edit;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('edit');
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
    public function show(edit $edit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(edit $edit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, edit $edit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(edit $edit)
    {
        //
    }
}
