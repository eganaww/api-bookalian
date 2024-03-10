<?php

namespace App\Http\Controllers;

use App\Models\UlasanBuku;
use App\Http\Requests\StoreUlasanBukuRequest;
use App\Http\Requests\UpdateUlasanBukuRequest;
use Exception;
use Illuminate\Http\Request;

class UlasanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $buku = UlasanBuku::with(['users','bukus'])->get();
            $res = [
                'data' => $buku
            ];
            return response()->json($res, 200); 
         }catch(Exception $e){
            return response()->json([
                'message' => "Internal server error",
                'error' => $e
            ], 500);
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "userid" => "required",
            "bukuid" => "required",
            "ulasan" => "required",
            "rating" => "required",

            
        ]);
        $newuser = UlasanBuku::create($data);
        $res = [
            'message' => 'succes create data',
            'data' => $newuser
        ];
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = UlasanBuku::all()->find($id);
            $res = [
                'data' => $user
            ];

            return response()->json($res, 201);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UlasanBuku $ulasanBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->validate([
                "bukuid" => "string",
                "userid" => "string",
                "ulasan" => "string",
                "rating" => "string"
            ]);
    
            
            $userUpdate = UlasanBuku::where('ulasanid', $id)->first()->update($data);

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        UlasanBuku::where('ulasanid', $id)->delete();
        return response()->json([
            'message' => "Delete ulasan successfully",
        ]);
    }
}
