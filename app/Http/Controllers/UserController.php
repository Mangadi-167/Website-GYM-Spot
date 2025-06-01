<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function index()
    {
        
        $users = User::all(); 
        return view('dashboard.akun.data-akun', compact('users')); 
    }

    
    public function create()
    {
        return view('dashboard.akun.add-akun'); 
    }

    
    public function store(Request $request)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|numeric|unique:users,no_hp',
            'password' => 'required|string|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', 
            'role' => 'required|string|max:50',
        ]);

        
        $fotoPath = $this->uploadFoto($request);

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'foto' => $fotoPath, 
        ]);
        flash('Akun berhasil ditambahkan!','success');
        return redirect()->route('akun.data');
    }

   
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id); 
        return view('dashboard.akun.edit-akun', compact('user'));
    }

   
    public function update(Request $request, $user_id)
    {   
        
        $user = User::findOrFail($user_id); 

       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_id . ',user_id', 
            'no_hp' => 'required|numeric|unique:users,no_hp,' . $user_id . ',user_id', 
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string|max:50',
        ]);
        
        $fotoPath = $this->uploadFoto($request, $user->foto);

        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => $request->password ? Hash::make($request->password) : $user->password, 
            'role' => $request->role,
            'foto' => $fotoPath, 
        ]);

        flash('Akun berhasil diperbarui!','success');
        return redirect()->route('akun.data');
    }

    
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id); 
        $user->delete(); 
        flash('Akun berhasil dihapus!','success');
        return redirect()->route('akun.data');
    }

    
    private function uploadFoto(Request $request, $existingFoto = null)
    {
        if ($request->hasFile('foto')) {
            
            if ($existingFoto && file_exists(public_path($existingFoto))) {
                Storage::delete($existingFoto); 
            }

            $fotoPath = $request->file('foto')->store('images/foto_akun', 'public');
            return $fotoPath;
        }

        
        return $existingFoto ?? 'images/foto_akun/default.png';
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        
       
        if ($query) {
            $users = User::where('name', 'like', '%' . $query . '%')
                ->orWhere('no_hp', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->get();
        } else {
          
            $users = User::all();
        }
    
        return view('dashboard.akun.data-akun', compact('users'));
    }

}
