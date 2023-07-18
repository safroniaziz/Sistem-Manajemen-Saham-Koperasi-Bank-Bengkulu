<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class KategoriPengaduanController extends Controller
{
    public function index(Request $request ){
        $kategoripengaduans = KategoriPengaduan::all();

        return view('backend/kategori_pengaduans.index',[
           'kategoripengaduans'     =>  $kategoripengaduans,
       ]);
   }

   public function store(Request $request){
       $rules = [
           'nama_kategori_pengaduan'     =>  'required',
           'keterangan'                  =>  'required',
       ];
       $text = [
           'nama_kategori_pengaduan.required'  => 'Nama kategori pengaduan harus diisi',
           'keterangan.required'               => 'Keterangan harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $simpan = KategoriPengaduan::create([
           'nama_kategori_pengaduan'           =>  $request->nama_kategori_pengaduan,
           'keterangan'                        =>  $request->keterangan,
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, kategori pengaduan baru berhasil ditambahkan',
               'url'   =>  url('/manajemen_kategori_pengaduan/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, kategori pengaduan gagal disimpan']);
       }
   }
   public function edit(KategoriPengaduan $kategoripengaduan){

       return $kategoripengaduan;
   }

   public function update(Request $request){
       $rules = [
           'nama_kategori_pengaduan'     =>  'required',
           'keterangan'                  =>  'required',
       ];
       $text = [
           'nama_kategori_pengaduan.required'   => 'Nama kategori pengaduan harus diisi',
           'keterangan.required'                => 'Keterangan harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $update = KategoriPengaduan::where('id',$request->kategori_pengaduan_id_edit)->update([
           'nama_kategori_pengaduan'       =>  $request->nama_kategori_pengaduan,
           'keterangan'                    =>  $request->keterangan,
       ]);

       if ($update) {
           return response()->json([
               'text'  =>  'Yeay, kategori pengaduan diubah',
               'url'   =>  url('/manajemen_kategori_pengaduan/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, kategori pengaduan gagal diubah']);
       }
   }
   public function delete(KategoriPengaduan $kategoripengaduan){
       $delete = $kategoripengaduan->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, kategori pengaduan berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('kategori_pengaduan')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, kategori pengaduan gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
}
