<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('loginregister');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'siswa'){
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'admin'){
                return redirect('/admin');
            }
        } else {
            return redirect('')->with('failed','email atau password salah')->withInput();
        }
    }

    function logout()
    {
        return redirect('/');
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password'=> 'Password harus diisi',
        ]);

        // Default profilephoto
        $profilephoto = 'Profile_Icon.png'; // Ganti 'default.jpg' dengan nama file profilephoto default Anda

        // Jika ada file profilephoto yang diunggah
        if ($request->hasFile('profilephoto')) {
            $file = $request->file('profilephoto');
            $profilephoto = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'image';
            $file->move($tujuanupload, $profilephoto);
        }

        // Buat pengguna baru dengan profilephoto yang disimpan
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'profilephoto' => $profilephoto,
        ]);

        return redirect('/')->with('success', 'Registrasi akun Berhasil! Silahkan Login.');
    }

    function admin()
    {
        echo "Maaf role admin belum dibuat";
    }
}
