<?php

namespace App\Http\Controllers;

use App\Models\informasipengantinM;
use Illuminate\Http\Request;

class informasipengantinC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('pages.undangan');
    }
    
    public function informasipengantin($idundangan)
    {
        return view('pages.informasipengantin', compact('idundangan'));
    }
    public function sebar($idundangan)
    {
        return view('pages.sebarundangan', compact('idundangan'));
    }
        
    public function comment($idundangan)
    {
        return view('pages.comment', compact('idundangan'));
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
    public function show(informasipengantinM $informasipengantinM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(informasipengantinM $informasipengantinM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, informasipengantinM $informasipengantinM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(informasipengantinM $informasipengantinM)
    {
        //
    }
}
