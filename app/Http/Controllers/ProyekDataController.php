<?php

namespace App\Http\Controllers;

use App\Models\ProyekData;
use Illuminate\Http\Request;

class ProyekDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['titleSidebar'] = 'Proyek';
        $data['titlePage'] = 'Proyek Page';
        return view('pages.proyek.index',$data);
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
    public function show(ProyekData $proyekData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProyekData $proyekData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProyekData $proyekData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProyekData $proyekData)
    {
        //
    }
}
