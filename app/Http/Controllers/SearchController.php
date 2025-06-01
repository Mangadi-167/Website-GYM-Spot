<?php

namespace App\Http\Controllers;

use App\Models\Gyms;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function show()
    {
        return view('home.search');
    }

   
    public function searchgym(Request $request)
    {
        // Ambil data pencarian dari form
        $search = $request->input('search');  
        $district = $request->input('kabupaten'); 
        $subDistrict = $request->input('kecamatan'); 

        

        
         $gymsQuery = Gyms::query();

         // Pencarian berdasarkan nama gym
         if ($search) {
             $gymsQuery->where('gym_name', 'like', '%' . $search . '%');
         }
 
        
         $gymsQuery->whereHas('gymAddress', function($query) use ($district, $subDistrict) {
             if ($district) {
                 $query->where('regency', 'like', '%' . $district . '%');
             }
             if ($subDistrict) {
                 $query->where('subdistrict', 'like', '%' . $subDistrict . '%');
             }
         });
 
         
         $gyms = $gymsQuery->get();

       
        return view('home.search', compact('gyms'));
    }
}

