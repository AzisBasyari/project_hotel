<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin.home');
    }

    public function resepsionis()
    {
        $no = 1;
        $reservasi = Reservasi::with('kamar')->get();
        return view('resepsionis.home', compact(['reservasi','no']));
    }
}
