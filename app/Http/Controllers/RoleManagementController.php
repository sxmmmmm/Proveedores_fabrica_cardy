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

        $this->aplicarNuevaPassword($user, $request->nueva_password);

        return redirect()->route('roles.management')
            ->with('success', "Contraseña de \"{$user->name}\" restablecida. Correo enviado a {$user->email}.");
    }

    /**
     * ── Generar contraseña automática y enviarla al usuario ──
     */
    public function generatePassword(User $user)
    {
        if (!auth()->user()->isAdmin()) abort(403);

        // Genera contraseña segura: 4 bloques separados por guión
        $nueva = implode('-', [
            substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 3),
            rand(100, 999),
            strtoupper(substr(str_shuffle('ABCDEFGHJKMNPQRSTUVWXYZ'), 0, 3)),
            substr(str_shuffle('!@#$%&*'), 0, 1) . rand(10, 99),
        ]);

        $this->aplicarNuevaPassword($user, $nueva);

        return redirect()->route('roles.management')
            ->with('success', "Contraseña automática generada para \"{$user->name}\". Correo enviado a {$user->email}.");
    }

    /**
     * ── Lógica compartida: cifrar, guardar, resolver solicitudes, enviar correo ──
     */
    private function aplicarNuevaPassword(User $user, string $plainPassword): void
    {
        // 1. Actualizar contraseña cifrada con bcrypt
        $user->update([
            'password' => Hash::make($plainPassword),
        ]);

        // 2. Marcar todas las solicitudes pendientes como resueltas
        PasswordResetRequest::where('user_id', $user->id)
            ->whereNull('resolved_at')
            ->update([
                'resolved_at' => now(),
                'resolved_by' => auth()->id(),
            ]);

        // 3. Enviar correo con la nueva contraseña en texto claro
        try {
            Mail::to($user->email)->send(
                new ContraseniaRestablecidaMail($user->name, $plainPassword)
            );
        } catch (\Throwable $e) {
            \Log::error("Error al enviar correo de reset a {$user->email}: " . $e->getMessage());
        }
    }
}
