<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'role' => 'required|string|in:1,2,3',
            'nip' => 'required|string',
            'user' => 'required|string',
            'password' => 'required|string',
        ]);

        // Create a new user using the User model
        $user = AdminUser::create([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'role_id' => $request->input('role'),
            'nip' => $request->input('nip'),
            'user' => $request->input('user'),
            'pass' => $request->input('password'),
        ]);

        // Optionally, you can redirect the user back to the original page or anywhere else
        return redirect()->back()->with('success', 'User added successfully');
    }

    public function update(Request $request) {
        $user = AdminUser::find($request->id);
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->role_id = $request->role;
        $user->nip = $request->nip;
        $user->user = $request->user;
        $user->pass = $request->password;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        $user = AdminUser::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
