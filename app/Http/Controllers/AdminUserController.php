<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('admin.user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'is_admin' => 'required',
        ]);

        $validatedData['password'] = Hash::make('smpn6garut');

        User::create($validatedData);

        return redirect('/admin/user')->with('success', 'Data Admin Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('admin');
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('admin');
        $rules = ([
            'nama' => 'required|max:255',
            'is_admin' => 'required',
        ]);

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);
        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('admin/user')->with('success', 'Data User Admin Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('admin');
        User::destroy($user->id);
        return redirect('/admin/user')->with('success', 'Data User Admin : ' . $user->nama . ' Berhasil di Hapus');
    }

    public function adminPassword(User $user)
    {
        $this->authorize('admin');
        return view('admin.user.adminPassword', [
            'user' => $user
        ]);
    }

    public function adminPasswordUpdate(Request $request, User $user)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        // ddd($validatedData);
        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/admin/user')->with('success', 'Password User : ' . $user->nama . ' Berhasil di Update');
    }
}
