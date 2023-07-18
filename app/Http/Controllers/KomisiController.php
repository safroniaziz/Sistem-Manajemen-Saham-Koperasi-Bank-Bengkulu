<?php

namespace App\Http\Controllers;

use App\Models\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class KomisiController extends Controller
{
    public function index(Request $request ){
        $komisis = Komisi::all();

        return view('backend/komisis.index',[
           'komisis'     =>  $komisis,
       ]);
   }

   public function store(Request $request){
       $rules = [
           'nama_komisi'     =>  'required',
       ];
       $text = [
           'nama_komisi.required'  => 'Nama komisi harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $simpan = Komisi::create([
           'nama_komisi'           =>  $request->nama_komisi,
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, komisi baru berhasil ditambahkan',
               'url'   =>  url('/manajemen_komisi/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, komisi gagal disimpan']);
       }
   }
   public function edit(komisi $komisi){

       return $komisi;
   }

   public function update(Request $request){
       $rules = [
           'nama_komisi'                 =>  'required',
       ];
       $text = [
           'nama_komisi.required'        => 'Nama komisi harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $update = Komisi::where('id',$request->komisi_id_edit)->update([
           'nama_komisi'                    =>  $request->nama_komisi,
       ]);

       if ($update) {
           return response()->json([
               'text'  =>  'Yeay, komisi diubah',
               'url'   =>  url('/manajemen_komisi/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, komisi gagal diubah']);
       }
   }
   public function delete(komisi $komisi){
       $delete = $komisi->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, komisi berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('komisi')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, komisi gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
}
