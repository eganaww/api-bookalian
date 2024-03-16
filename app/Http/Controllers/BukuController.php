<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Exception;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Buku::get();
            $count = Buku::count();
            return response()->json([
                'message' => 'Buku found successfully',
                'total' => $count,
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                'error' => $e
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        
        $buku = $request->validate([
            'Judul' => 'string|required',
            'Penulis' => 'string|required',
            'Penerbit' => 'string|required',
            'TahunTerbit' => 'required',
            'Cover' => 'required',
        ]);

        if ($request->hasFile('Cover')){
            if($request->file('Cover')->isValid()){
                try {
                    $file = $request->file('Cover');
                    $image = base64_encode(file_get_contents($file));
                    $buku['cover'] = $image;
                } catch (Exception $e){
                    return reponse()->json([
                        'error' => $e->getMessage()
                    ]);
                }
            }
        }
        try {
            $result = Buku::create($buku);
            return response()->json([
                'message' => 'Buku created successfully',
                'data' => $result
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                'error' => $e
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        {
            $buku = Buku::all()->find($buku->bukuid);
            $res = [
                'data' => $buku
            ];
            return response()->json($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id )
    {
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $data = $request->validate([
                "judul_buku" => "string",
                "penulis" => "string",
                "penerbit" => "string",
                "tahun_terbit" => "string",
                "Cover" => "string"
            ]);
    
            Buku::where('bukuid', $id)->update($data);
    
            return response()->json([
                "message" => "Update successfully",
                "data" => $data,
            ], 201);
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
        Buku::where('bukuid', $id)->delete();
        return response()->json([
            'message' => "Delete user successfully",
        ]);
    }
}
