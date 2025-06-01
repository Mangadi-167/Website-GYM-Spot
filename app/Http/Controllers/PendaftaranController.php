<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
   
    public function pendaftaran()
    {
        return view('home.pendaftaran');
    }


    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:50|unique:users,no_hp',
            'password' => 'required|string|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Persiapkan data user
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
        ];

      
        $userData['foto'] = $this->uploadFoto($request);

       
        User::create($userData);

       
        flash('Akun berhasil didaftarkan!','success');

    
        return redirect()->route('home.pendaftaran');
    }

  
    private function uploadFoto(Request $request)
    {
        if ($request->hasFile('foto')) {
            
            return $request->file('foto')->store('images/foto_akun', 'public');
        }

        
        return 'images/foto_akun/default.png';
    }
}
