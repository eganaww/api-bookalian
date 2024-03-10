<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $res = [
            'data' => $user
        ];
        return response()->json($res, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "NamaLengkap" => "required",
            "Username" => "required",
            "Email" => "required|email",
            "Password" => "required|min:3",
            "Alamat" => "required",
        ]);
        $newuser = User::create($data);
        $res = [
            'message' => 'succes create data',
            'data' => $newuser
        ];
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::all()->find($user->UserID);
        $res = [
            'data' => $user
        ];
        return response()->json($res);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        try{
            $data = $request->validate([
                "NamaLengkap" => "string",
                "Username" => "string",
                "Email" => "string",
                "Password" => "string",
                "Alamat" => "string"
            ]);
    
            
            $userUpdate = User::where('UserID', $id)->first()->update($data);

            if($userUpdate == true){
                return response()->json([
                    "message" => "Update successfully",
                    "data" => $data,
                ], 201);
            }

        }catch(Exception $e){
            return response()->json([
                'message' => 'Internal server error',
                'error' => $e
            ]);
        }

       
        
        // $updateUser = $request->validate([
        //     "NamaLengkap" => "required",
        //     "Username" => "required",
        //     "Email" => "required|email",
        //     "Password" => "required|min:3",
        //     "Alamat" => "required"
        // ]);
        // $newuser = $user->where('UserID', $request->id)->update($updateUser);
        // $res = [
        //     'message' => 'succes update data',
        //     'data' => $newuser
        // ];
        // return response()->json($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        User::where('UserID', $id)->delete();
        return response()->json([
            'message' => "Delete user successfully",
        ]);
    }
}
