<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleManagementController extends Controller
{
    public function index()
    {
        // Seguridad: Solo permitimos el acceso si es administrador
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acceso denegado: No tienes permisos de administrador.');
        }

        // Cargamos los usuarios con su rol para que la tabla sea rápida
        $users = User::with('role')->get();
        $roles = Role::all();

        return view('roles.management', compact('users', 'roles'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $roles = Role::all();
        return view('roles.create', compact('roles'));
    }

    // Guarda el nuevo usuario en la base de datos
    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente para el sistema Cardy.');
    }

    public function updateRole(Request $request, User $user)
    {
        // Seguridad en la acción de guardado
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        // Evitar que el administrador actual se cambie el rol a sí mismo 
        if (auth()->id() === $user->id && $request->role_id != $user->role_id) {
            return redirect()->route('users.index')
                ->with('error', 'No puedes cambiar tu propio rol de administrador.');
        }

        $user->update(['role_id' => $request->role_id]);

        return redirect()->route('users.index')
            ->with('success', 'Rol del usuario "' . $user->name . '" actualizado correctamente.');
    }
}