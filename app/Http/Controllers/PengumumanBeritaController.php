<?php

namespace App\Http\Controllers;

use App\Models\PengumumanBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PengumumanBeritaController extends Controller
{
    public function index(Request $request ){
        $pengumumanBeritas = PengumumanBerita::orderBy('created_at','desc')->get();

        return view('backend/berita_pengumumans.index',[
           'pengumumanBeritas'     =>  $pengumumanBeritas,
       ]);
   }

   public function store(Request $request){
       $rules = [
           'judul_berita_pengumuman'      =>  'required',
           'isi_berita_pengumuman'        =>  'required',
           'jenis_berita_pengumuman'      =>  'required',
           'gambar_berita_pengumuman'     => 'required|image|mimes:jpeg,png,jpg',
       ];
       $text = [
           'judul_berita_pengumuman.required'   => 'Judul Artikel harus diisi',
           'isi_berita_pengumuman.required'     => 'Isi Artikel harus diisi',
           'jenis_berita_pengumuman.required'   => 'jenis Artikel harus diisi',
           'gambar_berita_pengumuman.required'  => 'Gambar Artikel harus diisi',
            'gambar_berita_pengumuman.image'     => 'Gambar Artikel harus berupa file gambar',
            'gambar_berita_pengumuman.mimes'     => 'Format gambar yang diizinkan adalah JPEG, PNG, JPG',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }
       $file = $request->file('gambar_berita_pengumuman');

       $uniqueName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
       $path = $file->storeAs('public/gambar_artikel', $uniqueName);

       $simpan = PengumumanBerita::create([
           'judul_berita_pengumuman'          =>  $request->judul_berita_pengumuman,
           'isi_berita_pengumuman'            =>  $request->isi_berita_pengumuman,
           'jenis_berita_pengumuman'          =>  $request->jenis_berita_pengumuman,
           'gambar_berita_pengumuman'         =>  $uniqueName,
           'sumber'                           =>  $request->sumber,
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, berita_pengumuman baru berhasil ditambahkan',
               'url'   =>  url('/manajemen_berita_pengumuman/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, berita_pengumuman gagal disimpan']);
       }
   }
   public function edit(PengumumanBerita $pengumumanBerita){

       return $pengumumanBerita;
   }

   public function update(Request $request){
        $rules = [
            'judul_berita_pengumuman'      =>  'required',
            'isi_berita_pengumuman'        =>  'required',
            'jenis_berita_pengumuman'      =>  'required',
            'gambar_berita_pengumuman'     => 'image|mimes:jpeg,png,jpg',
        ];
        $text = [
            'judul_berita_pengumuman.required'   => 'Judul Artikel harus diisi',
            'isi_berita_pengumuman.required'     => 'Isi Artikel harus diisi',
            'jenis_berita_pengumuman.required'   => 'jenis Artikel harus diisi',
            'gambar_berita_pengumuman.image'     => 'Gambar Artikel harus berupa file gambar',
            'gambar_berita_pengumuman.mimes'     => 'Format gambar yang diizinkan adalah JPEG, PNG, JPG',
        ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $file = $request->file('gambar_berita_pengumuman');
       $uniqueName = null;
        if ($file) {
            $uniqueName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/gambar_artikel', $uniqueName);

            // Menghapus file gambar lama jika ada
            $model = PengumumanBerita::findOrFail($request->berita_pengumuman_id_edit);
            $oldImage = $model->gambar_berita_pengumuman;
            if ($oldImage) {
                Storage::delete('public/gambar_artikel/' . $oldImage);
            }
        }

       $update = PengumumanBerita::where('id',$request->berita_pengumuman_id_edit)->update([
            'judul_berita_pengumuman'          =>  $request->judul_berita_pengumuman,
           'isi_berita_pengumuman'            =>  $request->isi_berita_pengumuman,
           'jenis_berita_pengumuman'          =>  $request->jenis_berita_pengumuman,
           'gambar_berita_pengumuman'         =>  $uniqueName,
           'sumber'                           =>  $request->sumber,
       ]);

       if ($update) {
           return response()->json([
               'text'  =>  'Yeay, berita pengumuman diubah',
               'url'   =>  url('/manajemen_berita_pengumuman/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, berita pengumuman gagal diubah']);
       }
   }
   public function delete(PengumumanBerita $pengumumanBerita){
        $oldImage = $pengumumanBerita->gambar_berita_pengumuman;
        if ($oldImage) {
            Storage::delete('public/gambar_artikel/' . $oldImage);
        }
       $delete = $pengumumanBerita->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, berita pengumuman berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('berita_pengumuman')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, berita_pengumuman gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
   public function setActive(PengumumanBerita $pengumumanBerita){
    $pengumumanBerita->update([
        'is_active'   =>  1,
    ]);

    $notification = array(
        'message' => 'Berhasil, status active berhasil diubah',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}

public function setnonActive(PengumumanBerita $pengumumanBerita){
    $pengumumanBerita->update([
        'is_active'   =>  0,
    ]);

    $notification = array(
        'message' => 'Berhasil, status active berhasil diubah',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}
}
