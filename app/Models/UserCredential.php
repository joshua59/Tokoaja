<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class UserCredential
{
    public $id, $nama, $alamat, $email, $nomor_hp, $role, $token;

    public function __construct($data)
    {
        $this->id = $data->id;
        $this->nama = $data->nama;
        $this->alamat = $data->alamat;
        $this->email = $data->email;
        $this->nomor_hp = $data->nomor_hp;
        $this->role = $data->role;
        $this->token = $data->token;
    }

    public static function login($data)
    {
        $user = new UserCredential($data);
        Session::put('user', $user);
    }

    public static function user()
    {
        return Session::get('user');
    }

    public static function logout()
    {
        if (Session::has('user')) {
            Session::forget('user');
        }
    }
}
