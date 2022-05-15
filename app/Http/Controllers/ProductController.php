<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $product = Http::get("http://192.168.100.8:8081/api/product");
            return view("page.home.main", [
                "product" => json_decode($product)
            ]);
        }
        catch(ConnectionException $exception){
            return view("page.home.main", [
                "product" => null
            ]);
        }
        // return $product;
        
    }

    public function sellerproduct()
    {
        try{
            $product = Http::get("http://192.168.100.8:8081/api/product/seller/".UserCredential::user()->id);

            // return $product->json('data');
            return view("page.product.sellerproduct", [
                "product" => json_decode($product)
            ]);
        }
        catch(ConnectionException $exception){
            return redirect()->route('home');
        }
    }

    public function detail($id){
        try{
            $product = Http::get("http://192.168.100.8:8081/api/product/".$id);

            // return $product->json('data');
            return view("page.product.detail", [
                "product" => json_decode($product)
            ]);
        }
        catch(ConnectionException $exception){
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("page.product.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $harga = (int)$request->harga;
        $deskripsi = $request->deskripsi;
        $stok = (int)$request->stok;
        $gambarfile = fopen($request->file('gambar'), 'r');
        $id_penjual = UserCredential::user()->id;
        $product = Http::withHeaders([
            'Authorization' => UserCredential::user()->token,
        ])->attach('gambarfile', $gambarfile, null)->post('http://192.168.100.8:8081/api/product', [
            'nama' => $nama,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'stok' => $stok,
            'id_penjual' => $id_penjual
        ]);

        return redirect()->route('sellerproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->get('http://192.168.100.8:8081/api/product/'.$id);
        
        return view("page.product.edit", [
            "product" => json_decode($product)
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $harga = (int)$request->harga;
        $deskripsi = $request->deskripsi;
        $stok = (int)$request->stok;
        $product = Http::withHeaders([
            'Authorization' => UserCredential::user()->token,
        ])->put('http://192.168.100.8:8081/api/product/'.$id, [
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'stok' => $stok,
        ]);

        return redirect()->route("sellerproduct");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->delete("http://192.168.100.8:8081/api/product/".$id);

        // return $product->json('data');
        return redirect()->route("sellerproduct");
    }
}
