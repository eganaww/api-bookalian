<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);
    
        $user = User::where('Username', $data['Username'])->first();
        if ($user && Hash::check($data['Password'], $user->Password)) {
            // $request->session()->regenerate();
            $token = $user->createToken('Personal Token')->accessToken;
        
            return response()->json([
                'message' => 'Login Successfully',
                'data' => $user,
                'token' => $token,
            ], 200);
        }
    
        throw ValidationException::withMessages([
            'email' => ['Kredensial yang diberikan tidak cocok dengan catatan kami.'],
        ]);
    }
    


    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                "NamaLengkap" => "required",
                "Username" => "required",
                "Email" => "required|email|unique:users",
                "Password" => "required|min:3",
                "Alamat" => "required"
            ]);
            $data["Password"] = Hash::make($data["Password"]);
            $newuser = User::create($data);
            $res = [
                'message' => 'succes create data',
                'data' => $newuser
            ];
            return response()->json($res);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e,
            ], 400);
        }
    }
}