<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            'nomb_usr' => 'required|string',
            'pwd_usr' => 'required|string',
        ]);

        $user = Usuario::where('nomb_usr', $request->nomb_usr)->first();

        // Note: Assuming standard Hash verification here. 
        // If the legacy DB uses another hashing mechanism (like MD5), this logic will need to change.
        // e.g., if ($user && md5($request->pwd_usr) === $user->pwd_usr)

        if (!$user || $user->pwd_usr !== $request->pwd_usr) {
            throw ValidationException::withMessages([
                'nomb_usr' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        // Generate JWT token for the user
        $token = auth('api')->login($user);

        return response()->json([
            'message' => 'Login exitoso',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $user
        ]);
    }
}
