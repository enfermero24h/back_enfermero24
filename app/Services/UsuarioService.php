<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class UsuarioService
{
    /**
     * Registrar un nuevo usuario
     */
    public function register(array $data)
    {
        $usuario = Usuario::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rol' => $data['rol'],
            'estado_id' => $data['estado_id'], // Estado inicial del usuario
        ]);

        return $usuario->createToken('auth_token')->plainTextToken;
    }

    /**
     * Iniciar sesión de un usuario
     */
    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return false;
        }

        $usuario = Auth::user();
        return $usuario->createToken('auth_token')->plainTextToken;
    }

    /**
     * Enviar enlace de recuperación de contraseña
     */
    public function sendPasswordResetLink(array $data)
    {
        $status = Password::sendResetLink($data);

        return $status === Password::RESET_LINK_SENT;
    }

    /**
     * Restablecer la contraseña
     */
    public function resetPassword(array $data)
    {
        $status = Password::reset(
            $data,
            function ($usuario, $password) {
                $usuario->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $usuario->setRememberToken(Str::random(60));

                event(new PasswordReset($usuario));
            }
        );

        return $status === Password::PASSWORD_RESET;
    }
}
