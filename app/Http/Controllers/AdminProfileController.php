<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function rubahPassword(Request $request)
    {
        if (!Hash::check($request->oldPassword, auth()->user()->password)) {
            return back()->with('error', 'Password Lama Tidak Sesuai.');
        }
        // ddd($request);
        if ($request->password != $request->confirmPassword) {
            return back()->with('error', 'Password Baru yang dimasukkan tidak sama!');
        }

        $validatedData = $request->validate([
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($request->password);

        // ddd($validatedData);
        User::where('id', auth()->user()->id)
            ->update($validatedData);
        return redirect('/admin/ubah-password')->with('success', 'Password Berhasil di Rubah');
    }
}
