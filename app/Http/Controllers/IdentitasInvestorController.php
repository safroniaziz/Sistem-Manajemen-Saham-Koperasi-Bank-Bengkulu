<?php

namespace App\Http\Controllers;

use App\Models\IdentitasInvestor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IdentitasInvestorController extends Controller
{
    public function index(){
        $identitasInvestors = IdentitasInvestor::all();
        return view('identitasInvestor.index',[
            'identitasInvestor' =>  $identitasInvestors,
        ]);
    }

    public function create(){
        return view('identitasInvestor.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_identitas_investor'                     => 'required',
            'email'                                       => 'required|email|unique:identitas_investors,email',
        ], [
            'nama_identitas_investor.required'                =>  'Nama identitas investor harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $simpan = IdentitasInvestor::create([
            'nama_identitas_investor'                 =>  $request->nama_identitas_investor,
            'email'                                   =>  $request->email,
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, data identitas investor berhasil disimpan',
                'url'   =>  url('/identitas_investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data identitas investor gagal disimpan']);
        }
    }

    public function edit(IdentitasInvestor $identitasInvestor){
        return $identitasInvestor;
    }

    public function update(Request $request){
        $identitasInvestor = IdentitasInvestor::where('id',$request->identitas_investor_id)->first();
        $validator = Validator::make($request->all(), [
            'nama_identitas_investor'                  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('identitas_investor', 'email')->ignore($identitasInvestor->id),
            ],
        ], [
            'nama_iidentitas_investor.required'               => 'Nama identitas investor harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = $identitasInvestor->update([
            'nama_identitas_investor'                 =>  $request->nama_identitas_investor,
            'email'                                   =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, data identitas investor berhasil diupdate',
                'url'   =>  url('/identitas_investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data identitas investor gagal diupdate']);
        }
    }

    public function delete(IdentitasInvestor $identitasInvestor){
        $delete = $identitasInvestor->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data identitas investor berhasil dihapus',
                'url'   =>  url('/identitas_investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data identitas investor gagal dihapus']);
        }
    }
}
