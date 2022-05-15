<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class OrderController extends Controller
{
    public function index(){
        try{
            $order = Http::withHeaders([
                'Authorization' => UserCredential::user()->token
            ])->get('http://192.168.100.8:8082/api/order');
    
            return view("page.order.main", [
                "order" => json_decode($order)
            ]);
        }
        catch(ConnectionException $exception){
            return view("page.order.main", [
                "order" => null
            ]);
        }
        
    }

    public function comeorder(){
        try{
            $order = Http::withHeaders([
                'Authorization' => UserCredential::user()->token
            ])->get('http://192.168.100.8:8082/api/order');
    
            return view("page.order.comeorder", [
                "order" => json_decode($order)
            ]);
        }
        catch(ConnectionException $exception){
            return view("page.order.comeorder", [
                "order" => null
            ]);
        }
        
    }

    public function store(Request $request){
        try{
            $id_product = (int) $request->id_product;
            $id_penjual = (int) $request->id_penjual;
            $jumlah_product = (int) $request->jumlah_product;
            $harga = (int) $request->harga;
            $alamat = UserCredential::user()->alamat;
            $id_user = UserCredential::user()->id;
            $order = Http::withHeaders([
                'Authorization' => UserCredential::user()->token
            ])->post('http://192.168.100.8:8082/api/order', [
                'id_product' => $id_product,
                'id_penjual' => $id_penjual,
                'jumlah_product' => $jumlah_product,
                'harga' => $harga,
                'alamat' => $alamat,
                'id_user' => $id_user
            ]);

            $product = Http::get("http://192.168.100.8:8081/api/product/".$id_product);
            $product_decoded = json_decode($product);
            $product_decoded->stok = $product_decoded->stok - $jumlah_product;
            $product = Http::withHeaders([
                'Authorization' => UserCredential::user()->token,
            ])->put('http://192.168.100.8:8081/api/product/'.$id_product, [
                'harga' => $product_decoded->harga,
                'deskripsi' => $product_decoded->deskripsi,
                'stok' => $product_decoded->stok,
            ]);

            return redirect()->route('myorder');
        }
        catch(ConnectionException $exception){
            return redirect()->route('myorder');
        }
        
    }

    public function update(Request $request, $id){
        $status = $request->status;
        $order = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->put('http://192.168.100.8:8082/api/order/'.$id, [
            'status' => $status
        ]);

        return redirect()->route('comeorder');
    }

    public function destroy($id){
        $order = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->delete('http://192.168.100.8:8082/api/order/cancel/'.$id);

        return redirect()->route('myorder');
    }
}
