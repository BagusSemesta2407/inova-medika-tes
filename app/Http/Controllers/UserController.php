<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();

        return view('user.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role=Role::all();
        return view('user.create', [
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role=Role::findOrFail($request->roles);

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($role);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user=User::find($user->id);
        $role = Role::all();

        return view('user.edit', [
            'user' => $user,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $role = Role::findOrFail($request->roles);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        User::where('id', $user->id)->update($data);

        $user->syncRoles($role);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::find($id);

        $user->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
