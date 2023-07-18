<?php

namespace App\Http\Controllers;

use App\Models\PenggunaMasyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(){
        $masyarakats = PenggunaMasyarakat::orderBy('created_at','desc')->get();
        return view('backend/masyarakats.index',[
            'masyarakats'                =>  $masyarakats,
        ]);
    }

    public function detail(PenggunaMasyarakat $masyarakat){
        return view('backend/masyarakats.detail',[
            'masyarakat' =>  $masyarakat,
        ]);
    }
}
