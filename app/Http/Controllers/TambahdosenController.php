<?php

namespace App\Http\Controllers;

use App\Models\tambahdosen;
use Illuminate\Http\Request;

class TambahdosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('tambahdosen');
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
    public function show(tambahdosen $tambahdosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambahdosen $tambahdosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambahdosen $tambahdosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambahdosen $tambahdosen)
    {
        //
    }
}
