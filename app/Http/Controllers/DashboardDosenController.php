<?php

namespace App\Http\Controllers;

use App\Models\dashboard_dosen;
use Illuminate\Http\Request;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard_dosen');
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
    public function show(dashboard_dosen $dashboard_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard_dosen $dashboard_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard_dosen $dashboard_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard_dosen $dashboard_dosen)
    {
        //
    }
}
