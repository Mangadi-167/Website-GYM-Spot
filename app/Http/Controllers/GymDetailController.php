<?php
namespace App\Http\Controllers;

use App\Models\Gyms;
use App\Models\FotoGym;
use App\Models\Trainers; // Pastikan model Trainer diimport
use Illuminate\Http\Request;

class GymDetailController extends Controller
{
    public function show($slug)
{
    // Cari gym berdasarkan slug
    $gym = Gyms::with('fotoGym', 'publicFacility', 'toolFacility', 'gymAddress')
        ->where('slug', $slug)
        ->firstOrFail();

    // Ambil data trainer yang terkait dengan gym ini
    $trainers = $gym->trainers; // Menggunakan relasi 'trainers' yang sudah ada di model

    return view('home.gym-detail', compact('gym', 'trainers'));
}

}
