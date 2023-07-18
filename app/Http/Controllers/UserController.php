<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index',[
            'users' =>  $users,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
        ], [
            'name.required'                 =>  'Nama User harus diisi',
            'email.required'                => 'Kolom Email harus diisi.',
            'email.email'                   => 'Format Email tidak valid.',
            'email.unique'                  => 'Email sudah digunakan.',
            'password.required'             => 'Kolom Password harus diisi.',
            'password.confirmed'            => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $simpan = User::create([
            'name'                  =>  $request->name,
            'email'                 =>  $request->email,
            'password'              =>  bcrypt($request->password),
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, data user berhasil disimpan',
                'url'   =>  url('/user/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data user gagal disimpan']);
        }
    }

    public function edit(User $user){
        return $user;
    }

    public function update(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ], [
            'name.required'                 =>  'Nama User harus diisi',
            'email.required'                => 'Kolom Email harus diisi.',
            'email.email'                   => 'Format Email tidak valid.',
            'email.unique'                  => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = $user->update([
            'name'                  =>  $request->name,
            'email'                 =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, data user berhasil diupdate',
                'url'   =>  url('/user/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data user gagal diupdate']);
        }
    }

    public function delete(User $user){
        $delete = $user->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data user berhasil dihapus',
                'url'   =>  url('/user/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data user gagal dihapus']);
        }
    }
}
