<?php

namespace App\Http\Controllers;

use App\Mail\ContraseniaRestablecidaMail;
use App\Models\PasswordResetRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RoleManagementController extends Controller
{
    /** ── Listado principal con solicitudes de reset pendientes ── */
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acceso denegado.');
        }

        $users     = User::with('role')->get();
        $roles     = Role::all();
        $solicitudes = PasswordResetRequest::with('user')
            ->pendientes()
            ->orderByDesc('requested_at')
            ->get();

        return view('roles.management', compact('users', 'roles', 'solicitudes'));
    }

    /** ── Formulario de crear usuario (fallback de ruta) ── */
    public function create()
    {
        if (!auth()->user()->isAdmin()) abort(403);
        $roles = Role::all();
        return view('roles.create', compact('roles'));
    }

    /** ── Guardar nuevo usuario ── */
    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) abort(403);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id'  => 'required|exists:roles,id',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
        ]);

        return redirect()->route('roles.management')
            ->with('success', 'Usuario "' . $request->name . '" creado exitosamente.');
    }

    /** ── Cambiar rol de un usuario ── */
    public function updateRole(Request $request, User $user)
    {
        if (!auth()->user()->isAdmin()) abort(403);

        $request->validate(['role_id' => 'required|exists:roles,id']);

        if (auth()->id() === $user->id && $request->role_id != $user->role_id) {
            return redirect()->route('roles.management')
                ->with('error', 'No puedes cambiar tu propio rol de administrador.');
        }

        $user->update(['role_id' => $request->role_id]);

        return redirect()->route('roles.management')
            ->with('success', 'Rol de "' . $user->name . '" actualizado correctamente.');
    }

    /**
     * ── Asignar nueva contraseña manualmente (acción del administrador) ──
     * Cifra la contraseña, la guarda, marca la solicitud como resuelta
     * y envía el correo al usuario con la nueva contraseña en texto claro.
     */
    public function resetPassword(Request $request, User $user)
    {
        if (!auth()->user()->isAdmin()) abort(403);

        $request->validate([
            'nueva_password' => 'required|string|min:8|confirmed',
        ], [
            'nueva_password.required'  => 'La nueva contraseña es obligatoria.',
            'nueva_password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'nueva_password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Actualizar contraseña cifrada
        $user->update([
            'password' => Hash::make($request->nueva_password),
        ]);

        // Marcar todas las solicitudes pendientes de ese usuario como resueltas
        PasswordResetRequest::where('user_id', $user->id)
            ->whereNull('resolved_at')
            ->update([
                'resolved_at' => now(),
                'resolved_by' => auth()->id(),
            ]);

        // Enviar correo al usuario con su nueva contraseña
        try {
            Mail::to($user->email)->send(
                new ContraseniaRestablecidaMail($user->name, $request->nueva_password)
            );
        } catch (\Throwable $e) {
            \Log::warning("No se pudo enviar correo de contraseña restablecida a {$user->email}: " . $e->getMessage());
        }

        return redirect()->route('roles.management')
            ->with('success', "Contraseña de \"{$user->name}\" restablecida y correo enviado correctamente.");
    }
}
