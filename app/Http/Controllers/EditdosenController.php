<?php

namespace App\Http\Controllers;

use App\Models\editdosen;
use Illuminate\Http\Request;

class EditdosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('editdosen');
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
    public function show(editdosen $editdosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editdosen $editdosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, editdosen $editdosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editdosen $editdosen)
    {
        //
    }
}
