<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index(Request $request){
        $permissions = Permission::all();
        return view('backend/permissions.index',[
            'permissions' =>  $permissions,
        ]);
    }
    public function store(Request $request){
        $rules = [
            'name'     =>  'required',
        ];
        $text = [
            'name.required'  => 'Nama Permission harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = Permission::create([
            'name'           =>  $request->name,
            'guard_name'     => 'web',

        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, Permission baru berhasil ditambahkan',
                'url'   =>  url('/manajemen_permission/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Permission gagal disimpan']);
        }
    }
    public function edit(Permission $permission){

        return $permission;
    }

    public function update(Request $request){
        $rules = [
            'name'                 =>  'required',
        ];
        $text = [
            'name.required'        => 'Nama Permission harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Permission::where('id',$request->permission_id_edit)->update([
            'name'                    =>  $request->name,
            'guard_name'              => 'web',
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Permission diubah',
                'url'   =>  url('/manajemen_permission/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Permission gagal diubah']);
        }
    }
    public function delete(Permission $permission){
        $delete = $permission->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Permission berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('permission')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Permission gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
