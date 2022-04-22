<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;

class HomeController extends Controller
{
    public function admin()
    {
        $kamar = Kamar::with('fasilitasKamar')->count();
        $fasilitasKamar = FasilitasKamar::with('kamar')->count();
        $fasilitasHotel = FasilitasHotel::all()->count();
        return view('admin.home', compact(['kamar','fasilitasKamar', 'fasilitasHotel']));
    }

    public function resepsionis()
    {
        $reservasi = Reservasi::with('kamar')->get();
        $pending = $reservasi->where('status', 'pending')->count();
        $checkin = $reservasi->where('status', 'checkin')->count();
        $checkout = $reservasi->where('status', 'checkout')->count();
        $total = $reservasi->count();
        return view('resepsionis.home', compact(['pending','checkin', 'checkout', 'total']));
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

    public function kamar()
    {
        $kamars = Kamar::with('fasilitasKamar')->latest()->paginate(9);
        return view('home.kamar', compact('kamars'));
    }

    public function fasilitas()
    {
        $fasilitasHotel = FasilitasHotel::latest()->paginate(9);
        return view('home.fasilitas', compact('fasilitasHotel'));
    }
}
