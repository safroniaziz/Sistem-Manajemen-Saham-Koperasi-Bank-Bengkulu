<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class PeriodeAspirasiController extends Controller
{
    public function index(){
        $periodeaspirasis = PeriodeAspirasi::all();
        return view('backend/periode_aspirasis.index',[
            'periodeaspirasis'    =>  $periodeaspirasis,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_periode_aspirasi'     =>  'required',
            'tanggal_pembukaan'         =>  'required',
            'tanggal_penutupan'         =>  'required',
        ];
        $text = [
            'nama_periode_aspirasi.required'    => 'Nama Periode Aspirasi harus diisi',
            'tanggal_pembukaan.required'        => 'Periodeaspirasi harus diisi',
            'tanggal_penutupan.required'        => 'Tanggal Penutupan harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = PeriodeAspirasi::create([
            'nama_periode_aspirasi' =>  $request->nama_periode_aspirasi,
            'slug'                  =>  Str::slug($request->nama_periode_aspirasi),
            'tanggal_pembukaan'     =>  $request->tanggal_pembukaan,
            'tanggal_penutupan'     =>  $request->tanggal_penutupan,
            'is_active'             =>  1,
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, periode Aspirasi berhasil ditambahkan',
                'url'   =>  url('/manajemen_periode_reses/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, periode Aspirasi gagal ditambahkan']);
        }
    }

    public function edit(PeriodeAspirasi $periodeaspirasi){
        return $periodeaspirasi;
    }

    public function update(Request $request){
        $rules = [
            'nama_periode_aspirasi'     =>  'required',
            'tanggal_pembukaan'         =>  'required',
            'tanggal_penutupan'         =>  'required',
        ];
        $text = [
            'nama_periode_aspirasi.required'         => 'Nama Periode Aspirasi harus diisi',
            'tanggal_pembukaan_edit.required'        => 'Tanggal Pembukaan harus diisi',
            'tanggal_penutupan.required'             => 'Tanggal Penutupan harus diisi',

        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = PeriodeAspirasi::where('id',$request->periode_aspirasi_id_edit)->update([
            'nama_periode_aspirasi' =>  $request->nama_periode_aspirasi,
            'slug'                  =>  Str::slug($request->nama_periode_aspirasi),
            'tanggal_pembukaan'     =>  $request->tanggal_pembukaan,
            'tanggal_penutupan'     =>  $request->tanggal_penutupan,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, periode aspirasi berhasil diubah',
                'url'   =>  url('/manajemen_periode_reses/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, periode Aspirasi gagal diubah']);
        }
    }

    public function setActive(PeriodeAspirasi $periodeaspirasi){
        $periodeaspirasi->update([
            'is_active'   =>  1,
        ]);

        $notification = array(
            'message' => 'Berhasil, status active berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function setnonActive(PeriodeAspirasi $periodeaspirasi){
        $periodeaspirasi->update([
            'is_active'   =>  0,
        ]);

        $notification = array(
            'message' => 'Berhasil, status active berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete(PeriodeAspirasi $periodeaspirasi){
        $delete = $periodeaspirasi->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Periode Reses Berhasil Dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('periode_aspirasi')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Periode Reses Bagal Dihapus',
                'alert-type' => 'error'
            );
            return redirect()->route('periode_aspirasi')->with($notification);
        }
    }
}
