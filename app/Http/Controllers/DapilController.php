<?php

namespace App\Http\Controllers;

use App\Models\Dapil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class DapilController extends Controller
{
    public function index(Request $request ){
        $dapils = Dapil::all();

        return view('backend/dapils.index',[
           'dapils'     =>  $dapils,
       ]);
   }

   public function store(Request $request){
       $rules = [
           'nama_dapil'     =>  'required',
           'keterangan'      =>  'required',
       ];
       $text = [
           'nama_dapil.required'  => 'Nama Dapil harus diisi',
           'keterangan.required'   => 'Keterangan harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $simpan = Dapil::create([
           'nama_dapil'           =>  $request->nama_dapil,
           'keterangan'           =>  $request->keterangan,
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, Dapil baru berhasil ditambahkan',
               'url'   =>  url('/manajemen_daerah_pemilihan/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, Dapil gagal disimpan']);
       }
   }
   public function edit(Dapil $dapil){

       return $dapil;
   }

   public function update(Request $request){
       $rules = [
           'nama_dapil'                 =>  'required',
           'keterangan'                  =>  'required',
       ];
       $text = [
           'nama_dapil.required'        => 'Nama Dapil harus diisi',
           'keterangan.required'         => 'Keterangan harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $update = Dapil::where('id',$request->dapil_id_edit)->update([
           'nama_dapil'                    =>  $request->nama_dapil,
           'keterangan'                    =>  $request->keterangan,
       ]);

       if ($update) {
           return response()->json([
               'text'  =>  'Yeay, Dapil diubah',
               'url'   =>  url('/manajemen_daerah_pemilihan/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, Dapil gagal diubah']);
       }
   }
   public function delete(Dapil $dapil){
       $delete = $dapil->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, Dapil berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('dapil')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, Dapil gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
}
