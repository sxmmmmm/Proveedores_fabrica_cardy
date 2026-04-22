<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Traemos todos los usuarios con su rol cargado
        // Aplicamos paginación de una vez (Punto 2 de tu lista)
        $usuarios = User::with('role')->paginate(10);
        return view('roles.management', compact('usuarios'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->update(['role_id' => $request->role_id]);
        return back()->with('success', 'Rol actualizado correctamente');
    }
}