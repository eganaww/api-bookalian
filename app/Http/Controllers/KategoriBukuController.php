<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use App\Http\Requests\StoreKategoriBukuRequest;
use App\Http\Requests\UpdateKategoriBukuRequest;
use Exception;
use Illuminate\Http\Request;



class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = KategoriBuku::all();
        $res = [
            'data' => $buku
        ];
        return response()->json($res, 200);
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
        try {
            $data = $request->validate([
                "nama_kategori" => "required"
            ]);
            $newuser = KategoriBuku::create($data);
            $res = [
                'message' => 'succes create data',
                'data' => $newuser
            ];
            return response()->json($res, 201);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = KategoriBuku::all()->find($id);
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
    public function edit(KategoriBuku $kategoriBuku)
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
                "nama_kategori" => "string"
            ]);
    
            
            $userUpdate = KategoriBuku::where('kategoriid', $id)->first()->update($data);

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
        KategoriBuku::where('kategoriid', $id)->delete();
        return response()->json([
            'message' => "Delete kategori successfully",
        ]);
    }
}
