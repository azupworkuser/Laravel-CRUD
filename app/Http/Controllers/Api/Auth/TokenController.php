<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Requests\Api\Authenticate;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Hash;

/**
 * API authentication
 *
 *
 *
 * @Resource("Authenticate", uri="/auth/token")
 */
class TokenController extends ApiController
{

    public function authenticate(Authenticate $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Email or Password does not match'], 401);
            }
        } catch (JWTException $e) {
            return $this->response->errorInternal('Could not create token');
        }

        return $this->response->array([
            'token' => $token,
            'expire_in' => \Carbon\Carbon::now()->addMinutes(config('jwt.ttl'))->format('Y-m-d H:i:s')
        ]);

    }
}
