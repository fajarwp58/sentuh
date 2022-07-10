<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();
        return response()->json(ProdukResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'harga' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $produk = Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga
         ]);
        
        return response()->json(new ProdukResource($produk));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        if (is_null($produk)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json(new ProdukResource($produk));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'harga' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();
        
        return response()->json(new ProdukResource($produk));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json('Produk deleted successfully');
    }
}
