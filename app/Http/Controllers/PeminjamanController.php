<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Exception;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $buku = Peminjaman::with(["bukus", 'users'])->get();
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
            "UserID" => "required",
            "BukuID" => "required",
            "TanggalPeminjaman" => "required",
            "TanggalPengembalian" => "required",            
        ]);
        $newuser = Peminjaman::create($data);
        $res = [
            'message' => 'success create data',
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
            $user = Peminjaman::all()->find($id);
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
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Peminjaman::where('peminjamanid', $id)->delete();
        return response()->json([
            'message' => "Delete peminjaman successfully",
        ]);
    }
}
