<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('roles.management', compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('roles.management')
            ->with('success', 'Rol de usuario actualizado correctamente.');
    }
}
