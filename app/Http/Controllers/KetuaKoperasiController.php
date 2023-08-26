<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KetuaKoperasi;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class KetuaKoperasiController extends Controller
{
    public function index(){
        $ketuaKoperasis = KetuaKoperasi::all();
        return view('ketuaKoperasi.index',[
            'ketuaKoperasis' =>  $ketuaKoperasis,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_ketua_koperasi'                  => 'required',
            'email'                                   => 'required|email|unique:ketua_koperasis,email',
        ], [
            'nama_ketua_koperasi.required'                 =>  'Nama Pejabat Berwenang harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $simpan = KetuaKoperasi::create([
            'nama_ketua_koperasi'                  =>  $request->nama_ketua_koperasi,
            'email'                                   =>  $request->email,
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, data ketua koperasi berhasil disimpan',
                'url'   =>  url('/ketua_koperasi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data ketua koperasi gagal disimpan']);
        }
    }

    public function edit(KetuaKoperasi $ketuaKoperasi){
        return $ketuaKoperasi;
    }

    public function update(Request $request){
        $ketuaKoperasi = KetuaKoperasi::where('id',$request->ketua_koperasi_id)->first();
        $validator = Validator::make($request->all(), [
            'nama_ketua_koperasi'                  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('ketua_koperasis', 'email')->ignore($ketuaKoperasi->id),
            ],
        ], [
            'nama_ketua_koperasi.required'                 =>  'Nama Pejabat Berwenang harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = $ketuaKoperasi->update([
            'nama_ketua_koperasi'                  =>  $request->nama_ketua_koperasi,
            'email'                                   =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, data ketua koperasi berhasil diupdate',
                'url'   =>  url('/ketua_koperasi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data ketua koperasi gagal diupdate']);
        }
    }

    public function delete(KetuaKoperasi $ketuaKoperasi){
        $delete = $ketuaKoperasi->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data ketua koperasi berhasil dihapus',
                'url'   =>  url('/ketua_koperasi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data ketua koperasi gagal dihapus']);
        }
    }
}
