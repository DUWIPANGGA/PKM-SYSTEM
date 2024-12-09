<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('public.dashboard', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users',
            'name' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required|integer',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim,' . $user->id,
            'name' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required|integer',
            'phone' => 'required|unique:users,phone,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
