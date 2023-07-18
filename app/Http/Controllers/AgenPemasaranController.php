<?php

namespace App\Http\Controllers;

use App\Models\AgenPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AgenPemasaranController extends Controller
{
    public function index(){
        $agenPemasarans = AgenPemasaran::all();
        return view('agenPemasaran.index',[
            'agenPemasarans' =>  $agenPemasarans,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_agen_pemasaran'                     => 'required',
            'email'                                   => 'required|email|unique:agen_pemasarans,email',
        ], [
            'nama_agen_pemasaran.required'                    =>  'Nama Agen Pemasaran harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $simpan = AgenPemasaran::create([
            'nama_agen_pemasaran'                  =>  $request->nama_agen_pemasaran,
            'email'                                   =>  $request->email,
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, data agen_pemasaran berhasil disimpan',
                'url'   =>  url('/agen_pemasaran/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data agen pemasaran gagal disimpan']);
        }
    }

    public function edit(AgenPemasaran $agenPemasaran){
        return $agenPemasaran;
    }

    public function update(Request $request){
        $agenPemasaran = AgenPemasaran::where('id',$request->agen_pemasaran_id)->first();
        $validator = Validator::make($request->all(), [
            'nama_agen_pemasaran'                  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('agen_pemasaran', 'email')->ignore($agenPemasaran->id),
            ],
        ], [
            'nama_agen_pemasaran.required'                    => 'Nama Agen Pemasaran harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = $agenPemasaran->update([
            'nama_agen_pemasaran'                     =>  $request->nama_agen_pemasaran,
            'email'                                   =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, data agen pemasaran berhasil diupdate',
                'url'   =>  url('/agen_pemasaran/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data agen pemasaran gagal diupdate']);
        }
    }

    public function delete(AgenPemasaran $agenPemasaran){
        $delete = $agenPemasaran->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data agen pemasaran berhasil dihapus',
                'url'   =>  url('/agen_pemasaran/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data agen pemasaran gagal dihapus']);
        }
    }
}
