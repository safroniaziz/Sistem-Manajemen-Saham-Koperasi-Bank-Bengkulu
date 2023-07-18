<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class InvestorController extends Controller
{
    public function index(){
        $investors = Investor::all();
        return view('investor.index',[
            'investors' =>  $investors,
        ]);
    }

    public function create(){
        return view('investor.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_investor'                     => 'required',
            'email'                                   => 'required|email|unique:investors,email',
        ], [
            'nama_investor.required'                    =>  'Nama investor harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $simpan = Investor::create([
            'nama_investor'                  =>  $request->nama_investor,
            'email'                                   =>  $request->email,
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, data investor berhasil disimpan',
                'url'   =>  url('/investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data investor gagal disimpan']);
        }
    }

    public function edit(Investor $investor){
        return $investor;
    }

    public function update(Request $request){
        $investor = Investor::where('id',$request->investor_id)->first();
        $validator = Validator::make($request->all(), [
            'nama_investor'                  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('investor', 'email')->ignore($investor->id),
            ],
        ], [
            'nama_investor.required'                    => 'Nama investor harus diisi',
            'email.required'                                  => 'Kolom Email harus diisi.',
            'email.email'                                     => 'Format Email tidak valid.',
            'email.unique'                                    => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = $investor->update([
            'nama_investor'                     =>  $request->nama_investor,
            'email'                                   =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, data investor berhasil diupdate',
                'url'   =>  url('/investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data investor gagal diupdate']);
        }
    }

    public function delete(Investor $investor){
        $delete = $investor->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data investor berhasil dihapus',
                'url'   =>  url('/investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data investor gagal dihapus']);
        }
    }
}
