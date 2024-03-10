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
        try {
            $data = $request->validate([
                'Username' => 'required',
                'Password' => 'required',
            ]);

            $user = User::where('Username', $data['Username'])->first();

            if ($user && Hash::check($data['Password'], $user->Password)) {
                // $request->session()->regenerate();

                return response()->json([
                    "message" => "Login Successfully",
                    'data' => $user
                ], 200);
            }

            throw ValidationException::withMessages([
                'username' => ['Kredensial yang diberikan tidak cocok dengan catatan kami.'],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->validator->getMessageBag(),
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
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
            $userdata = User::where('UserID', $newuser['UserID'])->first();
            $res = [
                'message' => 'succes create data',
                'data' => $userdata
            ];
            return response()->json($res);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
