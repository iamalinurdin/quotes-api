<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
Use Illuminate\Support\Str;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	$user = User::create([
    		'name' 		=> $request->name,
    		'email' 	=> $request->email,
    		'password'  => bcrypt($request->password),
    		'api_token' => Str::random(80),
    	]);

    	return (new UserResource($user))
            ->additional([
                'meta' => [
                    'token' => $user->api_token
                ],
            ]);
    }

    public function login(Request $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            $current = auth()->user();
            return (new UserResource($current))
                ->additional([
                    'meta' => [
                        'token' => $current->api_token
                    ],
                ]);;
        }

        return response()->json([
            'error' => 'Email atau password salah',
        ], 401);

    }
}
