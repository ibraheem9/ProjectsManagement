<?php
namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest  $request)
    {
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken('API Token')->accessToken;

            return sendResponse(compact('token','user'));

        }catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return sendResponse(null,'Invalid Credentials',false,401);
        }
        $user = Auth::user();
        $token = $user->createToken('API Token')->accessToken;
        return sendResponse(compact('token','user'));
    }

    public function logout()
    {
        Auth::user()->token()->revoke();
        return sendResponse(null,'Logged out');
    }
}
