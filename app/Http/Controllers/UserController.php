<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Spatie\Permission\Models\Role;
use Auth;

class UserController extends Controller
{
    /**
     * @authenticate
     * authenticate users login with jwt
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // check if credentials is not valid.
            if (! $token =JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials']);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token']);
        }
        $user = Auth::user();
        return response()->json(compact('token', 'user'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|min:8|string|confirmed',
        ]);

        if ($validator->fails())
        {
            return response()->json(['error' => $validator->errors()->toJson()], 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);
        $message = "success";
        $user->makeHidden(['id','created_at', 'updated_at']);
        return response()->json(compact('user', 'token', 'message'));
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 400);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['invalid_token'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_is_absent'], $e->getStatusCode());
        }
        $user->assignRole('admin');
        return response()->json(compact('user'));
    }

}
