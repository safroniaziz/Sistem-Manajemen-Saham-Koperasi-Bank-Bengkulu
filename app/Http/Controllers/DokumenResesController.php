<?php

namespace App\Http\Controllers;

use App\Models\DokumenReses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DokumenResesController extends Controller
{
    public function index(){
        $dokumenreses = DokumenReses::all();
        return view('backend/dokumen_reses.index',[
            'dokumenreses'     =>  $dokumenreses,
        ]);
    }
    public function store(Request $request){
        $rules = [
             'nama_dokumen_reses'        =>  'required',
             'nama_file'                 =>  'required|',
        ];
        $text = [
             'nama_dokumen_reses.required'        =>  'Nama Dokumen harus diisi',
             'nama_file.required'                 =>  'File Dokumen harus diisi',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }
        try {
            DB::beginTransaction();
            $file = $request->file('nama_file');

            if ($file) {
                $uniqueName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('public/dokumen_reses', $uniqueName);

                $dokumenReses = DokumenReses::create([
                    'nama_dokumen_reses'         =>  $request->nama_dokumen_reses,
                    'nama_file'                  =>  $uniqueName,
                    'keterangan'                 =>  $request->keterangan,
                    'is_active'                  =>  1,
                ]);
            }
            DB::commit();
            return response()->json([
                'text'  =>  'Yeay, Dokumen Reses Berhasil Disimpan',
                'url'   =>  url('/manajemen_dokumen_reses/'),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['text' => 'Oops, Dokumen Reses Gagal Disimpan']);
        }
    }

    public function downloadDokumenReses(Request $request, DokumenReses $dokumenreses){
        $filename = $dokumenreses->nama_file;
        $filePath = storage_path('app/public/dokumen_reses/' . $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath, $filename);
        }
        
        $notification = array(
            'message' => 'Ooopps, file tidak ditemukan',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(DokumenReses $dokumenreses){
        return $dokumenreses;
    }

    public function update(Request $request){
        $rules = [
         'nama_dokumen_reses'         =>  'required',
        ];
        $text = [
         'nama_dokumen_reses.required'         =>  'Nama Dokumen Reses harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }
        try {
            DB::beginTransaction();
            $file = $request->file('nama_file');
            if ($file) {
                $uniqueName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('public/dokumen_reses', $uniqueName);

                // Menghapus file gambar lama jika ada
                $model = DokumenReses::findOrFail($request->dokumen_reses_id_edit);
                $oldImage = $model->nama_file;
                if ($oldImage) {
                    Storage::delete('public/dokumen_reses/' . $oldImage);
                }

                // Memperbarui nilai 'image_path' dalam basis data
                $model->nama_dokumen_reses = $request->nama_dokumen_reses;
                $model->nama_file = $uniqueName;
                $model->keterangan = $request->keterangan;
                $model->save();
            }else{
                $model = DokumenReses::findOrFail($request->dokumen_reses_id_edit);
                $model->nama_dokumen_reses = $request->nama_dokumen_reses;
                $model->keterangan = $request->keterangan;
                $model->save();
            }
            DB::commit();
                return response()->json([
                    'text'  =>  'Yeay, Dokumen Reses Berhasil Disimpan',
                    'url'   =>  url('/manajemen_dokumen_reses/'),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['text' => 'Oops, Dokumen Reses Gagal Disimpan']);
        }
    }

        public function delete(DokumenReses $dokumenreses){
            $oldImage = $dokumenreses->nama_file;
            if ($oldImage) {
                Storage::delete('public/dokumen_reses/' . $oldImage);
            }
            
            $delete = $dokumenreses->delete();
            if ($delete) {
                $notification = array(
                    'message' => 'Yeay, dokumen_reses berhasil dihapus',
                    'alert-type' => 'success'
                );
                return redirect()->route('dokumen_reses')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Ooopps, dokumen_reses gagal dihapus',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        public function setActive(DokumenReses $dokumenreses){
            $dokumenreses->update([
                'is_active'   =>  1,
            ]);

            $notification = array(
                'message' => 'Berhasil, status active berhasil diubah',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        public function setNonActive(dokumenreses $dokumenreses){
            $dokumenreses->update([
                'is_active'   =>  0,
            ]);

            $notification = array(
                'message' => 'Berhasil, status active berhasil diubah',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
}
