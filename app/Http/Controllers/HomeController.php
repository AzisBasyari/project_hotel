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

    public function pending()
    {
        $no=1;
        $pending = Reservasi::whereHas('kamar')->latest('updated_at')->where('status','pending')->search(request(['search']))->paginate(10);
        return view('resepsionis.pending', compact(['pending', 'no']));
    }
    public function checkin()
    {
        $no=1;
        $checkin = Reservasi::with('kamar')->latest('updated_at')->where('status','checkin')->search(request(['search']))->paginate(10);
        return view('resepsionis.checkin', compact(['checkin', 'no']));
    }
    public function checkout()
    {
        $no=1;
        $checkout = Reservasi::with('kamar')->latest('updated_at')->where('status','checkout')->search(request(['search']))->latest()->paginate(10);
        return view('resepsionis.checkout', compact(['checkout', 'no']));
    }
}
