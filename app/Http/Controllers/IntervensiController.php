<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IntervensiController extends BaseController
{
    public function laporan() {
        $laporanDB = Laporan::orderBy('updated_at', 'desc')->get();
        $data = [
            'page' => 'laporan',
            'title' => 'laporan',
            'database' => $laporanDB
        ];
        return view('laporan', compact('data'));
    }

    public function search(Request $request){
        $laporanDB = Laporan::where('judul', 'like', '%'.$request->keyword.'%')
        ->orWhere('deskripsi', 'like', '%'.$request->keyword.'%')
        ->orWhere('dokumen', 'like', '%'.$request->keyword.'%')
        ->orderBy('updated_at', 'desc')
        ->get();

        $data = [
            'page' => 'laporan',
            'title' => 'laporan',
            'database' => $laporanDB
        ];

        $output = '';

        if($laporanDB->count() >= 1){
            $output .= view('partials.list', compact('data'));
        }else{
            $output = '<p class="not-found">Laporan tidak ditemukan</p>';
        }

        return $output;
    }

    public function upload(Request $request) {
        // Store to Storage
        $file = $request->file('dokumen');
        $fileName = Str::random(5).'_'.$file->getClientOriginalName();
        $file->storeAs('public/laporan', $fileName);

        // Store to DB
        $laporanDB = new Laporan();
        $laporanDB->judul = $request->string('judul');
        $laporanDB->deskripsi = $request->string('deskripsi');
        $laporanDB->tipe = $file->getClientOriginalExtension();
        $laporanDB->dokumen = $fileName;
        $laporanDB->save();

        return redirect()->back();
    }

    public function download($id)
    {
        $data = Laporan::all()->where('id', $id)->first();
        $fileName = substr($data->dokumen, 6);
        $path = storage_path("app/public/laporan/{$data->dokumen}");
        return response()->download($path, $fileName);
    }

    public function delete($id)
    {
        $data = Laporan::all()->where('id', $id)->first();
        $path = storage_path("app/public/laporan/{$data->dokumen}");
        unlink($path);
        $data->delete();
        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $laporanDB = Laporan::all()->where('id', $id)->first();

        // Checking
        if($request->hasFile('dokumen')){
            // Delete older file
            $path = storage_path("app/public/laporan/{$laporanDB->dokumen}");
            unlink($path);

            $file = $request->file('dokumen');
            $fileName = Str::random(5).'_'.$file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();

            // Update to Storage
            $file->storeAs("public/laporan", $fileName);
        } else{
            $fileName = $laporanDB->dokumen;
            $fileType = $laporanDB->tipe;
        }

        // Update to DB
        $laporanDB->judul = $request->string('judul');
        $laporanDB->deskripsi = $request->string('deskripsi');
        $laporanDB->tipe = $fileType;
        $laporanDB->dokumen = $fileName;
        $laporanDB->save();

        return redirect()->back();
    }
}
