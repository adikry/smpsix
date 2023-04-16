<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.staff.index', [
            'dataStaff' => Staff::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'required|unique:staff',
            'jabatan' => 'required',
            'foto' => 'image|file|max:1024'
        ]);
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-staff');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Staff::create($validatedData);
        return redirect('/admin/staff')->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('admin.staff.show', [
            'staff' => $staff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', [
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $rules = ([
            'nama' => 'required|max:255',
            'foto' => 'image|file|max:1024',
            'jabatan' => 'required'
        ]);

        if ($request->nip != $staff->nip) {
            $rules['nip'] = 'required|unique:staff';
        }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['foto'] = $request->file('foto')->store('foto-staff');
        }

        Staff::where('id', $staff->id)
            ->update($validatedData);

        return redirect('/admin/staff')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        if ($staff->foto) {
            Storage::delete($staff->foto);
        }
        Staff::destroy($staff->id);
        return redirect('/admin/staff')->with('success', 'Data Berhasil di Hapus');
    }
}
