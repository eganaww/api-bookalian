<?php

namespace App\Http\Controllers;

use App\Models\KategoriBukuRelasi;
use App\Http\Requests\StoreKategoriBukuRelasiRequest;
use App\Http\Requests\UpdateKategoriBukuRelasiRequest;
use Exception;
use Illuminate\Http\Request;

class KategoriBukuRelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $buku = KategoriBukuRelasi::with(["bukus", 'kategori_bukus'])->get();
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
        try{
            $data = $request->validate([
                "bukuid" => "required",
                "kategoriid" => "required"
            ]);
            $newuser = KategoriBukuRelasi::create($data);
            $res = [
                'message' => 'succes create data',
                'data' => $newuser
            ];
            return response()->json($res, 201);
        }catch(Exception $e){
            return response()->json($e, 500);   
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBukuRelasi $kategoriBukuRelasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBukuRelasi $kategoriBukuRelasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriBukuRelasiRequest $request, KategoriBukuRelasi $kategoriBukuRelasi)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        KategoriBukuRelasi::where('kategori_bukuid', $id)->delete();
        return response()->json([
            'message' => "Delete kategori buku successfully",
        ]);
    }
}
