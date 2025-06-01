<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function dataGym()
    {
        return view('dashboard.data-gym');
    }

    public function dataAkun()
    {
        return view('dashboard.data-akun');
    }
}