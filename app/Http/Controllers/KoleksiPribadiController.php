<?php

namespace App\Http\Controllers;

use App\Models\KoleksiPribadi;
use App\Http\Requests\StoreKoleksiPribadiRequest;
use App\Http\Requests\UpdateKoleksiPribadiRequest;
use Exception;
use Illuminate\Support\Facades\Request;

class KoleksiPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     try{
        $buku = KoleksiPribadi::with(["bukus", 'users'])->get();
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
    public function store(StoreKoleksiPribadiRequest $request)
    {
        $data = $request->validate([
            "userid" => "required",
            "bukuid" => "required"
        ]);
        $newuser = KoleksiPribadi::create($data);
        $res = [
            'message' => 'succes create data',
            'data' => $newuser
        ];
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show(KoleksiPribadi $koleksiPribadi)
    {
        try {

            $koleksi = KoleksiPribadi::all()->find('koleksiid', $koleksiPribadi->koleksiid);
            $res = [
                'data' => $koleksi
            ];
            return response()->json($res);
        } catch(Exception $e) {
            return response()->json([
                'message' => "Internal server error",
                'error' => $e
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KoleksiPribadi $koleksiPribadi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKoleksiPribadiRequest $request, KoleksiPribadi $koleksiPribadi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        KoleksiPribadi::where('koleksiid', $id)->delete();
        return response()->json([
            'message' => "Delete koleksi successfully",
        ]);
    }
}
