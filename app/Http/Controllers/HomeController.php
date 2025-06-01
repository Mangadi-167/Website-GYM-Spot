<?php

namespace App\Http\Controllers;

use App\Models\Gyms;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function index()
    {
        // Ambil 3 gym secara acak
        $gyms = Gyms::with('fotoGym')->inRandomOrder()->take(3)->get();

      
        return view('home.welcome', compact('gyms'));
    }

}
