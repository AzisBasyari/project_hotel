<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\FasilitasHotel;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $no = 1;
        $kamar = Kamar::with('fasilitasKamar')->paginate(3);
        $fasilitasHotel = FasilitasHotel::paginate(6);
        return view('index', compact(['kamar', 'fasilitasHotel', 'no']));
    }
}
