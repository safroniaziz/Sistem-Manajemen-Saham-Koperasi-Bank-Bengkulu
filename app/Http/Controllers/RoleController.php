<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request){
        $roles = Role::all();
        $allPermissions = Permission::all(); // Mendapatkan semua izin
        return view('backend/roles.index',[
            'roles'             =>  $roles,
            'allPermissions'    =>  $allPermissions,
        ]);
    }

    public function assign(Request $request, Role $role){
        $rules = [
            'permission_id'     =>  'required',
        ];
        $text = [
            'permission_id.required'  => 'Nama Permission harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $permission = Permission::findById($request->permission_id);
        $assign = $role->givePermissionTo($permission);

        if ($assign) {
            return response()->json([
                'text'  =>  'Yeay, Permission berhasil diassign ke role',
                'url'   =>  url('/manajemen_role/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Permission gagal disimpan']);
        }
    }
}
