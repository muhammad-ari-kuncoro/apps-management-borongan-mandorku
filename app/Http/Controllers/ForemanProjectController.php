<?php

namespace App\Http\Controllers;

use App\Models\ProjectForeman;
use Illuminate\Http\Request;

class ForemanProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['titleSidebar']   = 'Dashboard';
        $data['titlePage']      = 'Foreman Page';
        $data['dataForeman']    = ProjectForeman::all();
        return view('pages.foreman.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['titleSidebar']   = 'Dashboard';
        $data['titlePage']      = 'Foreman Page';
        return view('pages.foreman.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
            'nik'            => 'required|string',
            'name'           => 'required|string',
            'full_name'      => 'required|string|max:100',
            'no_phone'       => 'required|string|max:20',
            'address'        => 'required|string',
            'gender'         => 'required|string',
            'spesialist'     => 'required|string|max:50',
            'age'            => 'required|integer|min:17|max:99',
            'join_date'      => 'required|date',
            'terminate_date' => 'nullable|date',
            'daily_rate'     => 'required|numeric|min:0',
            'status'         => 'required|in:active,inactive,terminate',
            ]);
            ProjectForeman::create($validate);
            return redirect()->route('foreman.index')->with('success', 'Successfully Data Created');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Terjadi Kesalahan Data, Silahkan COba Lagi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['titleSidebar']   = 'Dashboard';
        $data['titlePage']      = 'Foreman Page Edit';
        $data['dataForemanByID']    = ProjectForeman::findOrFail($id);
        return view('pages.foreman.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    try {
    $foreman = ProjectForeman::findOrFail($id);

    $validateUpdate = $request->validate([
            'nik'            => 'required|string',
            'name'           => 'required|string',
            'full_name'      => 'required|string|max:100',
            'no_phone'       => 'required|string|max:20',
            'address'        => 'required|string',
            'gender'         => 'required|string',
            'spesialist'     => 'required|string|max:50',
            'age'            => 'required|integer|min:17|max:99',
            'join_date'      => 'required|date',
            'terminate_date' => 'nullable|date',
            'daily_rate'     => 'required|numeric|min:0',
            'status'         => 'required|in:active,inactive,terminate',
            ]);

        $foreman->update($validateUpdate);

        return redirect()->route('foreman.index')->with('warning', 'Data mandor berhasil diupdate.');

    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->with('error', 'Exception: ' . $th->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foreman =ProjectForeman::findOrFail($id);
        try {
            $foreman->delete();

        return redirect()->route('foreman.index')->with('success', 'Mandor berhasil dinonaktifkan.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error Can Delete');
        }
    }
}
