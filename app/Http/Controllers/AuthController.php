<?php

namespace App\Http\Controllers;

use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;

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
        try{
            $email = $request->email;
            $password = $request->password;
            $response = Http::post('http://192.168.100.8:8080/api/user/login', [
                'email' => $email,
                'password' => $password,
            ]);

            // return $response->json();


            $responseDecoded = json_decode($response->body());

            if ($responseDecoded->status == true) {
                $userCredential = new UserCredential($responseDecoded->data);
                UserCredential::login($userCredential);
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Selamat datang di Tokoaja',
                    'callback' => 'reload',
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.',
                ]);
            }
        }
        catch(ConnectionException $exception){
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, Service User Sedang Down.',
            ]);
        }
        

        // return $response->json();
    }

    public function do_register(Request $request)
    {
        try{
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
        catch(ConnectionException $exception){
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, Service User Sedang Down.',
            ]);
        }
        
    }

    public function do_logout()
    {
        UserCredential::logout();
        return redirect()->route('auth');
    }
}
