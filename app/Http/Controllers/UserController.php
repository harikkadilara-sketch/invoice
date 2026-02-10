<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::with('roles')->get(),
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->roles()->sync($request->roles);

        return response()->json(['message' => 'User berhasil ditambahkan']);
    }

    public function show(User $user)
    {
        return response()->json($user->load('roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email'=> $request->email
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->roles()->sync($request->roles);

        return response()->json(['message' => 'User berhasil diupdate']);
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus']);
    }
}