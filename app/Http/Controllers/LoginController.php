<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home.login');
    }

    public function process(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        $user = User::where('email', $request->email)->first();

        // Cek password
        if ($user && Hash::check($request->password, $user->password)) {
            // Set session untuk login
            Session::put('loginstatus', true);
            Session::put('user_id', $user->user_id); 
            Session::put('userdata', $user);         
            Session::put('role', $user->role);     

            // Redirect sesuai dengan role
            if ($user->role == 'admin') {
                return redirect()->route('gym.data');
            } elseif ($user->role == 'gym owner') {
                return redirect()->route('gym.data');
            } elseif ($user->role == 'member') {
                return redirect()->route('home.welcome'); 
            }
        } else {
            return back()->withErrors(['login' => 'Email atau Password salah']);
        }
    }
}
