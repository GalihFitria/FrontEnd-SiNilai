<?php

namespace App\Http\Controllers;

use App\Models\orang;
use Illuminate\Http\Request;

class OrangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('view', 
        [
            'data' => orang::all(),
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'ras' => ['required'],
            'umur' => ['required']
        ]
        );
        orang::create($valid);
        return redirect('/orang');
    }

    /**
     * Display the specified resource.
     */
    public function show(orang $orang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orang $orang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orang $orang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orang $orang)
    {
        //
    }
}
