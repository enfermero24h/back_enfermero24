<?php

namespace App\Http\Controllers;

se App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    /**
     * Registrar un nuevo usuario
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|in:paciente,profesional',  // Agrega más roles si es necesario
            'estado_id' => 'required|exists:estados,id',
        ]);

        $token = $this->usuarioService->register($validated);

        return response()->json(['token' => $token], 201);
    }

    /**
     * Iniciar sesión de un usuario
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $token = $this->usuarioService->login($credentials);

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token], 200);
    }

    /**
     * Enviar enlace de recuperación de contraseña
     */
    public function sendPasswordResetLink(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
        ]);

        $status = $this->usuarioService->sendPasswordResetLink($validated);

        return $status 
            ? response()->json(['message' => 'Password reset link sent.'])
            : response()->json(['message' => 'Unable to send password reset link.'], 500);
    }

    /**
     * Restablecer la contraseña
     */
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required|string',
        ]);

        $status = $this->usuarioService->resetPassword($validated);

        return $status 
            ? response()->json(['message' => 'Password reset successful.'])
            : response()->json(['message' => 'Password reset failed.'], 500);
    }
}