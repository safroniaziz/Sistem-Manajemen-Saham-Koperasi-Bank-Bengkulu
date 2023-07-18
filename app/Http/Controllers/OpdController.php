<?php

namespace App\Http\Controllers;

use App\Models\Komisi;
use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class OpdController extends Controller
{
    public function index(Request $request ){
        $opds = Opd::all();
        $komisis = Komisi::all();
        return view('backend/opds.index',[
           'opds'     =>  $opds,
           'komisis'     =>  $komisis,
       ]);
   }

   public function store(Request $request){
        $rules = [
            'komisi_id'      =>  'required',
            'nama_opd'       =>  'required',
            'keterangan'     =>  'required',
        ];
        $text = [
            'komisi_id.required'     => 'Komisi harus diisi',
            'nama_opd.required'      => 'Nama opd harus diisi',
            'keterangan.required'    => 'Keterangan harus diisi',
        ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $simpan = Opd::create([
           'komisi_id'              =>  $request->komisi_id,
           'nama_opd'               =>  $request->nama_opd,
           'keterangan'             =>  $request->keterangan,
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, opd baru berhasil ditambahkan',
               'url'   =>  url('/manajemen_opd/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, opd gagal disimpan']);
       }
   }
   public function edit(Opd $opd){

       return $opd;
   }

   public function update(Request $request){
        $rules = [
            'komisi_id'      =>  'required',
            'nama_opd'       =>  'required',
            'keterangan'     =>  'required',
        ];
        $text = [
            'komisi_id.required'     => 'Komisi harus diisi',
            'nama_opd.required'      => 'Nama opd harus diisi',
            'keterangan.required'    => 'Keterangan harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Opd::where('id',$request->opd_id_edit)->update([
            'komisi_id'             =>  $request->komisi_id,
            'nama_opd'              =>  $request->nama_opd,
            'keterangan'            =>  $request->keterangan,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, opd diubah',
                'url'   =>  url('/manajemen_opd/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, opd gagal diubah']);
        }
   }
   public function delete(Opd $opd){
       $delete = $opd->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, opd berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('opd')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, opd gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
}
