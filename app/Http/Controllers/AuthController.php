<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
// use App\Mail\Office\WelcomeMail;
use Exception;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        return view('page.auth.main');
    }
    public function do_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $response = Http::post('http://192.168.100.8:8080/api/user/login', [
            'email' => $email,
            'password' => $password,
        ]);

        // return $response->json();

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return response()->json();
        }else{
            return response()->json();
        }
    }
    public function do_register(Request $request)
    {
        $nama = $request->nama;
        $alamat = $request->alamat;
        $email = $request->email;
        $nomor_hp = $request->nomor_hp;
        $password = $request->password;
        $role = $request->role;

        $response = Http::post('http://192.168.100.8:8080/api/user/register', [
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'nomor_hp' => $nomor_hp,
            'password' => $password,
            'role' => $role,
        ]);

        return $response->json();

    }
    public function do_logout()
    {
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect()->route('auth');
    }
}
