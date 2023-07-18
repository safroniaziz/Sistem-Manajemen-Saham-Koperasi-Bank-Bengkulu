<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\User;
use App\Models\Opd;
use App\Models\Komisi;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;



class KumpulanAduanController extends Controller
{
    public function index(Request $request ){
        $kumpulanaduans = Aspirasi::where('user_id',Auth::user()->id,)->get();
        $opds = Opd::all();
        $komisis = Komisi::all();

        return view('backend/kumpulan_aduans.index',[
           'kumpulanaduans'     =>  $kumpulanaduans,
           'opds'          =>  $opds,
           'komisis'       =>  $komisis,
       ]);
   }

   public function store(Request $request){
       $rules = [
        'nik'                       =>  'required',
        'dapil_id'                  =>  'required',
        'user_id'                   =>  'required',
        'laporan_aspirasi'          =>  'required',
        'volume'                    =>  'required',
        'satuan_volume_id'          =>  'required',
        'opd_id'                    =>  'required',
        'usulan'                    =>  'required',
        'alamat_usulan'             =>  'required',
       ];
       $text = [
        'nik.required'                       =>  'NIK harus diisi',
        'dapil_id.required'                  =>  'Dapil harus dipilih',
        'user_id.required'                   =>  'Anggota DPRD harus dipilih',
        'laporan_aspirasi.required'          =>  'Laporan Aspirasi harus diisi',
        'satuan_volume_id.required'          =>  'Volume Satuan harus dipilih',
        'opd_id.required'                    =>  'OPD harus dipilih',
        'usulan.required'                    =>  'Usulan harus diisi',
        'alamat_usulan.required'             =>  'Alamat Usulan harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $simpan = Aspirasi::create([
        'masyarakat_nik'            =>   Auth::penggunaMasyarakat()->id,
        'dapil_id'                  =>  $request->dapil_id,
        'user_id'                   =>  $request->user_id,
        'laporan_aspirasi'          =>  $request->laporan_aspirasi,
        'volume'                    =>  $request->volume,
        'satuan_volume_id'          =>  $request->satuan_volume_id,
        'opd_id'                    =>  $request->opd_id,
        'usulan'                    =>  $request->usulan,
        'usulan_ke'                 =>  $request->usulan_ke,
        'alamat_usulan'             =>  $request->alamat_usulan,
        'status'                    =>  'pengajuan usulan',
       ]);

       if ($simpan) {
           return response()->json([
               'text'  =>  'Yeay, Aspirasi baru berhasil ditambahkan',
               'url'   =>  url('/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, Aspirasi gagal disimpan']);
       }
   }
   public function edit(Aspirasi $aspirasi){
       return $aspirasi;
   }

   public function update(Request $request){
       $rules = [
        'masyarakat_nik'            =>  'required',
        'dapil_id'                  =>  'required',
        'user_id'                   =>  'required',
        'laporan_aspirasi'          =>  'required',
        'volume'                    =>  'required',
        'satuan_volume_id'          =>  'required',
        'opd_id'                    =>  'required',
        'usulan'                    =>  'required',
        'alamat_usulan'             =>  'required',
       ];
       $text = [
        'masyarakat_nik.required'            =>  'NIK harus diisi',
        'dapil_id.required'                  =>  'Dapil harus dipilih',
        'user_id.required'                   =>  'Anggota DPRD harus dipilih',
        'laporan_aspirasi.required'          =>  'Laporan Aspirasi harus diisi',
        'volume.required'                    =>  'Volume harus diisi',
        'satuan_volume_id.required'          =>  'Satuan Volume harus dipilih',
        'opd_id.required'                    =>  'OPD harus dipilih',
        'usulan.required'                    =>  'Usulan harus diisi',
        'alamat_usulan.required'             =>  'Alamat Usulan harus diisi',
       ];

       $validasi = Validator::make($request->all(), $rules, $text);
       if ($validasi->fails()) {
           return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
       }

       $update = Aspirasi::where('id',$request->aspirasi_id_edit)->update([
        'masyarakat_nik'            =>   Auth::penggunaMasyarakat()->id,
        'studentId'                 =>   Auth::user()->id,
        'dapil_id'                  =>  $request->dapil_id,
        'user_id'                   =>  $request->user_id,
        'komisi_id'                 =>  $request->komisi_id,
        'laporan_aspirasi'          =>  $request->laporan_aspirasi,
        'volume'                    =>  $request->volume,
        'satuan_volume_id'          =>  $request->satuan_volume_id,
        'opd_id'                    =>  $request->opd_id,
        'dokumen_reses_id'          =>  $request->dokumen_reses_id,
        'komisi_id'                 =>  $request->komisi_id,
        'usulan'                    =>  $request->usulan,
        'alamat_usulan'             =>  $request->alamat_usulan,
        'usulan_ke'                 =>  $request->usulan_ke,
        'opd_akhir_id'              =>  $request->opd_akhir_id,
        'status'                    =>  $request->status,
        'catatan'                   =>  $request->catatan,
        'rekomendasi_sekwan'        =>  $request->rekomendasi_sekwan,
        'rekomendasi_mitra'         =>  $request->rekomendasi_mitra,
        'rekomendasi_skpd'          =>  $request->rekomendasi_skpd,
        'rekomendasi_tapd'          =>  $request->rekomendasi_tapd,
       ]);

       if ($update) {
           return response()->json([
               'text'  =>  'Yeay, Aspirasi diubah',
               'url'   =>  url('/manajemen_aspirasi/'),
           ]);
       }else {
           return response()->json(['text' =>  'Oopps, Aspirasi gagal diubah']);
       }
   }
   public function delete(Aspirasi $aspirasi){
       $delete = $aspirasi->delete();
       if ($delete) {
           $notification = array(
               'message' => 'Yeay, Aspirasi berhasil dihapus',
               'alert-type' => 'success'
           );
           return redirect()->route('aspirasi')->with($notification);
       }else {
           $notification = array(
               'message' => 'Ooopps, Aspirasi gagal dihapus',
               'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
       }
   }
//    public function setActive(Aspirasi $aspirasi){
//     $aspirasi->update([
//         'is_active'   =>  1,
//     ]);

//     $notification = array(
//         'message' => 'Berhasil, status active berhasil diubah',
//         'alert-type' => 'success'
//     );
//     return redirect()->back()->with($notification);
// }

// public function setnonActive(Aspirasi $aspirasi){
//     $aspirasi->update([
//         'is_active'   =>  0,
//     ]);

//     $notification = array(
//         'message' => 'Berhasil, status active berhasil diubah',
//         'alert-type' => 'success'
//     );
//     return redirect()->back()->with($notification);
// }
}
