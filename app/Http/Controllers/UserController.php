<?php

namespace App\Http\Controllers;

Use App\Models\User;
Use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(){
        // $user = UserCredential::user();

        // $user = Http::get("http://192.168.100.8:8080/api/user/profile");

        // return $product->json('data');
        // return view("page.user.main", [
        //     "user" => json_decode($user)
        // ]);
        // return view("page.user.main");
        // return  view("page.user.main", [
        //     "user" => $user
        // ]);

        $user = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->get('http://192.168.100.8:8080/api/user/profile');
        
        return view("page.user.main", [
            "user" => json_decode($user)
        ]);
        
    }

    public function edit(){
        $user = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->get('http://192.168.100.8:8080/api/user/profile');
        
        return view("page.user.edit", [
            "user" => json_decode($user)
        ]);
    }

    public function update(Request $request){
        $nama = $request->nama;
        $alamat = $request->alamat;
        $email = $request->email;
        $nomor_hp = $request->nomor_hp;
        $password = $request->password;
        $user = Http::withHeaders([
            'Authorization' => UserCredential::user()->token
        ])->put('http://192.168.100.8:8080/api/user/profile', [
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'nomor_hp' => $nomor_hp,
            'password' => $password
        ]);
        
        return redirect()->route('profile');
    }
}
