<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Http\Requests\StoreRiwayatRequest;
use App\Http\Requests\UpdateRiwayatRequest;
use Exception;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $buku = Riwayat::with(['peminjamans'])->get();
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
    public function store(StoreRiwayatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = Riwayat::all()->find($id);
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
    public function edit(Riwayat $riwayat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRiwayatRequest $request, Riwayat $riwayat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Riwayat::where('riwayatid', $id)->delete();
        return response()->json([
            'message' => "Delete riwayat successfully",
        ]);
    }
}
