<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('cardekho')->plainTextToken;

        return response()->json([
            'message' => 'Account ban gaya!',
            'token'   => $token,
            'user'    => $user
        ]);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Email ya password galat hai!'], 401);
        }

        $user  = Auth::user();
        $token = $user->createToken('cardekho')->plainTextToken;

        return response()->json([
            'message' => 'Login ho gaya!',
            'token'   => $token,
            'user'    => $user
        ]);

        session([
    'admin' => $user->id
]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout ho gaya!']);
    }
}