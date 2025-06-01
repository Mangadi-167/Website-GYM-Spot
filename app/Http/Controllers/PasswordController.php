<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session; 
class PasswordController extends Controller
{
    public function showResetForm()
    {
        return view('dashboard.reset-password');
    }

    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed', 
        ]);

       
        $user = Session::get('userdata'); 

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Anda harus login terlebih dahulu!']);
        }

       
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
        }

    
        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password baru tidak boleh sama dengan password lama.']);
        }

        // Update password baru
        $user->password = Hash::make($request->password); 
        $user->save(); 

        // Update session untuk menggunakan password baru
        Session::put('userdata', $user); 

        // Redirect ke halaman dengan pesan sukses
        flash('Password berhasil diperbarui!','success');
        return redirect()->route('gym.data');
    }
}
