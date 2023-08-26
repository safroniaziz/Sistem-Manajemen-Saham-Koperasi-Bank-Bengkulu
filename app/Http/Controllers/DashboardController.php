<?php

namespace App\Http\Controllers;

use App\Models\AgenPemasaran;
use App\Models\Institusi;
use App\Models\Investor;
use App\Models\PejabatBerwenang;
use App\Models\SahamInstitusi;
use App\Models\SahamInvestor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jumlahPejabat = PejabatBerwenang::count();
        $jumlahAgen = AgenPemasaran::count();
        $jumlahOperator = User::count();
        $jumlahInvestor = Investor::count();
        $jumlahSahamInvestor = SahamInvestor::count();
        $jumlahInstitusi = Institusi::count();
        $jumlahSahamInstitusi = SahamInstitusi::count();
        return view('dashboard',[
            'jumlahPejabat' =>  $jumlahPejabat,
            'jumlahAgen' =>  $jumlahAgen,
            'jumlahOperator' =>  $jumlahOperator,
            'jumlahInvestor' =>  $jumlahInvestor,
            'jumlahSahamInvestor' =>  $jumlahSahamInvestor,
            'jumlahInstitusi' =>  $jumlahInstitusi,
            'jumlahSahamInstitusi' =>  $jumlahSahamInstitusi,
        ]);
    }
}
