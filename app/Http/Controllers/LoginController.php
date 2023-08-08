<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    public function sinkronisasi(){
        return view('login');
    }

    public function login(Request $request){
        $data = Admin::where('username', $request->username)->firstOrFail();
        if($data){
            if(Hash::check($request->password, $data->password)){
                session([
                    'berhasil' => true,
                    'username' => $data->username
                ]);
                return redirect('/modul');
            }
        }
        return redirect()->back()->with([
            'message' => 'gagal',
            'error' => 'Username atau password salah'
        ]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/sinkronisasi');
    }
}
