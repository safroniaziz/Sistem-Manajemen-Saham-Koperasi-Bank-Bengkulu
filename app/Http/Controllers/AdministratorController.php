<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AdministratorController extends Controller
{
    public function index(Request $request){
        $administrators = User::where('jenis_anggota','administrator')->orderBy('created_at','desc')->get();
        return view('backend/administrators.index',[
            'administrators'                =>  $administrators,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_lengkap'   => 'required',
            'email'          => 'required|string|email|max:255|unique:users',
            'password'       => 'required|string|min:8',
        ];
        $text = [
            'nama_lengkap.required'   => 'Nama Administrator harus diisi.',
            'email.required'          => 'Email harus diisi.',
            'email.string'            => 'Email harus bernilai string.',
            'email.email'             => 'Email harus berisi email valid.',
            'email.max'               => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique'            => 'Email sudah digunakan.',
            'password.required'       => 'Password harus diisi.',
            'password.min'            => 'Password minimal :min karakter.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
        return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = User::create([
            'username'          =>  $request->username,
            'slug'              =>  Str::slug($request->nama_lengkap),
            'nama_lengkap'      =>  $request->nama_lengkap,
            'email'             =>  $request->email,
            'password'          =>  bcrypt($request->password),
            'is_active'         =>  1,
            'jenis_anggota'     =>  'administrator',
        ]);
        $simpan->assignRole('administrator');
        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, User baru berhasil ditambahkan',
                'url'   =>  url('/manajemen_administrator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, User gagal disimpan']);
        }
    }
    public function edit(User $administrator){
        return $administrator;
    }

    public function update(Request $request){
        $rules = [
            'email' =>  [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->user_id)
            ],
            'nama_lengkap'   => 'required',
        ];

        $text = [
            'nama_lengkap.required'   => 'Nama Administrator harus diisi.',
            'email.required'          => 'Email harus diisi.',
            'email.string'            => 'Email harus bernilai string.',
            'email.email'             => 'Email harus berisi email valid.',
            'email.max'               => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique'            => 'Email sudah digunakan.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = User::where('id',$request->user_id)->update([
            'username'          =>  $request->username,
            'nama_lengkap'      =>  $request->nama_lengkap,
            'email'             =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Data Administrator berhasil diubah',
                'url'   =>  url('/manajemen_administrator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Data Administrator anda gagal diubah']);
        }
    }
    public function delete(User $administrator){
        // }
        $delete = $administrator->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Data Administrator berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('administrator')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Data Administrator gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function setActive(User $administrator){
        $administrator->update([
            'is_active'   =>  1,
        ]);

        $notification = array(
            'message' => 'Berhasil, Data Administrator Berhasil Diaktifkan',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function setnonActive(User $administrator){
        $administrator->update([
            'is_active'   =>  0,
        ]);

        $notification = array(
            'message' => 'Berhasil, Data Administrator Berhasil Dinonaktifkan',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ubahPassword(Request $request){
        User::where('id',$request->id)->update([
            'password'   =>  bcrypt($request->password),
        ]);

        return response()->json([
            'text'  =>  'Yeay, Password administrator berhasil diubah',
            'url'   =>  url('/manajemen_administrator/'),
        ]);
    }

    public function detail(User $administrator){
        return view('backend/administrators.detail',[
            'administrator' =>  $administrator,
        ]);
    }
}
