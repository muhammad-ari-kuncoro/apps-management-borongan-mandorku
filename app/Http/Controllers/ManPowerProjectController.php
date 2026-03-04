<?php

namespace App\Http\Controllers;

use App\Models\ProjectForeman;
use App\Models\ProjectManPower;
use Illuminate\Http\Request;

class ManPowerProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['titleSidebar'] = 'Dashboard';
        $data['titlePage'] = 'Manpower Page';
        $data['dataManPower'] = ProjectManPower::all();
        return view('pages.manpower.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['titleSidebar'] = 'Dashboard';
        $data['titlePage'] = 'Manpower Page';
        return view('pages.manpower.create', $data);
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
                'spesialist'     => 'required|string',
                'age'            => 'required|integer|min:17|max:99',
                'join_date'      => 'required|date',
                'terminate_date' => 'nullable|date',
                'daily_rate'     => 'required|numeric|min:0',
                'status'         => 'required|in:active,inactive,terminate',
            ]);
            ProjectManPower::create($validate);
            return redirect()->route('manpower.index')->with('success', 'Successfully Data Created');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Terjadi Kesalahan Data, Silahkan Coba Lagi');
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
    public function edit(string $id)
    {
        $data['titleSidebar']      =  'Dashboard';
        $data['titlePage']         =  'ManPower Page Edit';
        $data['dataManPowerID']    =  ProjectManPower::findOrFail($id);
        return view('pages.manpower.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $foreman = ProjectManPower::findOrFail($id);
            $validateUpdate = $request->validate([
                'nik'            => 'required|string',
                'name'           => 'required|string',
                'full_name'      => 'required|string|max:100',
                'no_phone'       => 'required|string|max:20',
                'address'        => 'required|string',
                'gender'         => 'required|string',
                'spesialist'     => 'required|string',
                'age'            => 'required|integer|min:17|max:99',
                'join_date'      => 'required|date',
                'terminate_date' => 'nullable|date',
                'daily_rate'     => 'required|numeric|min:0',
                'status'         => 'required|in:active,inactive,terminate',
            ]);

            $foreman->update($validateUpdate);
            return redirect()->route('manpower.index')->with('warning', 'Data mandor berhasil diupdate.');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Exception: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
