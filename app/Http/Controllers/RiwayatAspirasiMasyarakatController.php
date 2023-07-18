<?php

namespace App\Http\Controllers;

use App\Models\PenggunaMasyarakat;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class RiwayatAspirasiMasyarakatController extends Controller
{
    public function index(Request $request){
        $penggunamasyarakats = PenggunaMasyarakat::all();
        $aspirasis = Aspirasi::orderBy('created_at','desc')->get();

         return view('backend/riwayat_aspirasi_masyarakats.index',[
            'penggunamasyarakats'         =>  $penggunamasyarakats,
            'aspirasis'                   =>  $aspirasis,
        ]);
    }
}
