<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
// use Carbon\Carbon;

use App\Models\User;

use Exception;

class GenerateTokensController extends Controller
{
    

    public static function refreshTokens(): array
    {
        try {
            // Obtener el token actual del usuario
            $currentToken = JWTAuth::getToken();
    
            // Verificar si el token es válido
            if (!$currentToken) {
                throw new JWTException('Token no encontrado');
            }
    
            // Obtener el usuario asociado con el token
            $user = JWTAuth::parseToken()->authenticate();
    
            // Refrescar el token
            $refreshedToken = JWTAuth::refresh($currentToken);
    
            // Devolver el nuevo token y el usuario
            return [$refreshedToken, $user];
        } catch (JWTException $e) {
            throw new JWTException('Error al refrescar el token: ' . $e->getMessage());
        }
    }

    // public static function getRol(): string
    // {
    //     try {
    //         $token = JWTAuth::parseToken();
    //         $claims = $token->getPayload()->get('rol');
    //         return $claims;
    //     } catch (\Exception $e){
    //         throw new Exception('Imposible obtener rol');
    //     }
    // }
}