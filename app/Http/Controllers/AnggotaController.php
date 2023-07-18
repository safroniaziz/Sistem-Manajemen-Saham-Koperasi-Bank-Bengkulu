<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dapil;
use App\Models\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AnggotaController extends Controller
{
    public function index(Request $request){
        $anggotas = User::where('jenis_anggota','anggota')->orderBy('created_at','desc')->get();
        $dapils = Dapil::all();
        $komisis = Komisi::all();        
        $partaiNasionals = [
            'Partai Nasional Indonesia (PNI)',
'            Partai Demokrasi Indonesia Perjuangan (PDIP)',
            'Partai Gerakan Indonesia Raya (Gerindra)',
            'Partai Golongan Karya (Golkar)',
            'Partai Kebangkitan Bangsa (PKB)',
            'Partai Amanat Nasional (PAN)',
            'Partai Persatuan Pembangunan (PPP)',
            'Partai Demokrat',
            'Partai Solidaritas Indonesia (PSI)',
            'Partai Keadilan Sejahtera (PKS)',
            'Partai NasDem (Nasional Demokrat)',
            'Partai Hati Nurani Rakyat (Hanura)',
           ' Partai Bulan Bintang (PBB)',
            'Partai Garuda',
            'Partai Perindo (Partai Persatuan Indonesia)',
            'Partai Berkarya',
            'Partai Idaman',
            'Partai Hanura Indonesia',
            'Partai Karya Bangsa',
            'Partai Keadilan dan Persatuan Indonesia (PKPI)',
        ];
        
        return view('backend/anggotas.index',[
            'anggotas'                   =>  $anggotas,
            'dapils'                  =>  $dapils,
            'komisis'                 =>  $komisis,
            'partaiNasionals'                 =>  $partaiNasionals,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_lengkap'   => 'required',
            'email'          => 'required|string|email|max:255|unique:users',
            'password'       => 'required|string|min:8',
            'dapil_id'       => 'required',
            'fraksi'         => 'required',
            'jabatan'        => 'required',
            'keterangan'     => 'required',
            'komisi_id'      => 'required',
        ];
        $text = [
            'nama_lengkap.required'   => 'Nama Anggota harus diisi.',
            'email.required'          => 'Email harus diisi.',
            'email.string'            => 'Email harus bernilai string.',
            'email.email'             => 'Email harus berisi email valid.',
            'email.max'               => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique'            => 'Email sudah digunakan.',
            'password.required'       => 'Password harus diisi.',
            'password.min'            => 'Password minimal :min karakter.',
            'dapil_id.required'       => 'Daerah Pemilihan harus diisi.',
            'fraksi.required'         => 'Fraksi harus diisi.',
            'jabatan.required'        => 'Jabatan harus diisi.',
            'keterangan.required'     => 'Keterangan harus diisi.',
            'komisi_id.required'      => 'Komisi harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
        return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = User::create([
            'komisi_id'         =>  $request->komisi_id,
            'username'          =>  $request->username,
            'slug'              =>  Str::slug($request->nama_lengkap),
            'nama_lengkap'      =>  $request->nama_lengkap,
            'email'             =>  $request->email,
            'password'          =>  bcrypt($request->password),
            'is_active'         =>  1,
            'jenis_anggota'     =>  'anggota',
            'dapil_id'          =>  $request->dapil_id,
            'fraksi'            =>  $request->fraksi,
            'jabatan'           =>  $request->jabatan,
            'keterangan'        =>  $request->keterangan,
        ]);
        $simpan->assignRole('anggota');

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, User baru berhasil ditambahkan',
                'url'   =>  url('/manajemen_anggota/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, User gagal disimpan']);
        }
    }

    public function edit(User $anggota){
        return $anggota;
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
            'dapil_id'       => 'required',
            'fraksi'         => 'required',
            'jabatan'        => 'required',
            'keterangan'     => 'required',
            'komisi_id'      => 'required',
        ];
        
        $text = [
            'nama_lengkap.required'   => 'Nama Anggota harus diisi.',
            'email.required'          => 'Email harus diisi.',
            'email.string'            => 'Email harus bernilai string.',
            'email.email'             => 'Email harus berisi email valid.',
            'email.max'               => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique'            => 'Email sudah digunakan.',
            'dapil_id.required'       => 'Daerah Pemilihan harus diisi.',
            'fraksi.required'         => 'Fraksi harus diisi.',
            'jabatan.required'        => 'Jabatan harus diisi.',
            'keterangan.required'     => 'Keterangan harus diisi.',
            'komisi_id.required'      => 'Komisi harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = User::where('id',$request->user_id)->update([
            'komisi_id'         =>  $request->komisi_id,
            'username'          =>  $request->username,
            'nama_lengkap'      =>  $request->nama_lengkap,
            'is_active'         =>  1,
            'jenis_anggota'     =>  $request->jenis_anggota,
            'dapil_id'          =>  $request->dapil_id,
            'fraksi'            =>  $request->fraksi,
            'jabatan'           =>  $request->jabatan,
            'keterangan'        =>  $request->keterangan,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Data Anggota berhasil diubah',
                'url'   =>  url('/manajemen_anggota/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Data Anggota anda gagal diubah']);
        }
    }
    public function delete(User $anggota){
        // }
        $delete = $anggota->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Data Anggota berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('anggota')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Data Anggota gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function setActive(User $anggota){
        $anggota->update([
            'is_active'   =>  1,
        ]);

        $notification = array(
            'message' => 'Berhasil, Data Anggota Berhasil Diaktifkan',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function setnonActive(User $anggota){
        $anggota->update([
            'is_active'   =>  0,
        ]);

        $notification = array(
            'message' => 'Berhasil, Data Anggota Berhasil Dinonaktifkan',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ubahPassword(Request $request){
        User::where('id',$request->id)->update([
            'password'   =>  bcrypt($request->password),
        ]);

        return response()->json([
            'text'  =>  'Yeay, Password Anggota berhasil diubah',
            'url'   =>  url('/manajemen_anggota/'),
        ]);
    }

    public function detail(User $anggota){
        return view('backend/anggotas.detail',[
            'anggota' =>  $anggota,
        ]);
    }
}
