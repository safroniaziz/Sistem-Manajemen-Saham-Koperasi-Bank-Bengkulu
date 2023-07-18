<?php

namespace App\Http\Controllers;

use App\Models\SatuanVolume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class SatuanVolumeController extends Controller
{
    public function index(Request $request ){
        $satuanvolumes = SatuanVolume::all();

        return view('backend/satuan_volumes.index',[
           'satuanvolumes'     =>  $satuanvolumes,
       ]);
   }

   public function store(Request $request){
       $rules = [
           'nama_satuan_volume'     =>  'required',
       ];
       $text = [
           'nama_satuan_volume.required'  => 'Nama satuan volume harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $simpan = SatuanVolume::create([
           'nama_satuan_volume'           =>  $request->nama_satuan_volume,
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, satuan volume baru berhasil ditambahkan',
               'url'   =>  url('/manajemen_satuan_volume/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, satuan volume gagal disimpan']);
       }
   }
   public function edit(SatuanVolume $satuanvolume){

       return $satuanvolume;
   }

   public function update(Request $request){
       $rules = [
           'nama_satuan_volume'                 =>  'required',
       ];
       $text = [
           'nama_satuan_volume.required'        => 'Nama satuan volume harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $update = SatuanVolume::where('id',$request->satuan_volume_id)->update([
           'nama_satuan_volume'                    =>  $request->nama_satuan_volume,
       ]);

       if ($update) {
           return response()->json([
               'text'  =>  'Yeay, satuan volume diubah',
               'url'   =>  url('/manajemen_satuan_volume/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, satuan volume gagal diubah']);
       }
   }
   public function delete(SatuanVolume $satuanvolume){
       $delete = $satuanvolume->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, satuan volume berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('satuan_volume')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, satuan volume gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
}
