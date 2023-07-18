<?php

namespace App\Http\Controllers;

use App\Models\PejabatBerwenang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PejabatBerwenangController extends Controller
{
    public function index(){
        $pejabatBerwenangs = PejabatBerwenang::all();
        return view('pejabatBerwenang.index',[
            'pejabatBerwenangs' =>  $pejabatBerwenangs,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_pejabat_berwenang'                  => 'required',
            'email'                                   => 'required|email|unique:pejabat_berwenangs,email',
        ], [
            'nama_pejabat_berwenang.required'                 =>  'Nama Pejabat Berwenang harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $simpan = PejabatBerwenang::create([
            'nama_pejabat_berwenang'                  =>  $request->nama_pejabat_berwenang,
            'email'                                   =>  $request->email,
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, data pejabat berwenang berhasil disimpan',
                'url'   =>  url('/pejabat_berwenang/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data pejabat berwenang gagal disimpan']);
        }
    }

    public function edit(PejabatBerwenang $pejabatBerwenang){
        return $pejabatBerwenang;
    }

    public function update(Request $request){
        $pejabatBerwenang = PejabatBerwenang::where('id',$request->pejabat_berwenang_id)->first();
        $validator = Validator::make($request->all(), [
            'nama_pejabat_berwenang'                  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('pejabat_berwenangs', 'email')->ignore($pejabatBerwenang->id),
            ],
        ], [
            'nama_pejabat_berwenang.required'                 =>  'Nama Pejabat Berwenang harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = $pejabatBerwenang->update([
            'nama_pejabat_berwenang'                  =>  $request->nama_pejabat_berwenang,
            'email'                                   =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, data pejabat berwenang berhasil diupdate',
                'url'   =>  url('/pejabat_berwenang/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data pejabat berwenang gagal diupdate']);
        }
    }

    public function delete(PejabatBerwenang $pejabatBerwenang){
        $delete = $pejabatBerwenang->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data pejabat berwenang berhasil dihapus',
                'url'   =>  url('/pejabat_berwenang/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data pejabat berwenang gagal dihapus']);
        }
    }
}
