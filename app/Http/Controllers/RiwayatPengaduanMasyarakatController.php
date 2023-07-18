<?php

namespace App\Http\Controllers;

use App\Models\PenggunaMasyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class RiwayatPengaduanMasyarakatController extends Controller
{
    public function index(Request $request){
        $penggunamasyarakats = PenggunaMasyarakat::all();
        $pengaduans = Pengaduan::orderBy('created_at','desc')->get();

         return view('backend/riwayat_pengaduan_masyarakats.index',[
            'penggunamasyarakats'         =>  $penggunamasyarakats,
            'pengaduans'                   =>  $pengaduans,
        ]);
    }
}
