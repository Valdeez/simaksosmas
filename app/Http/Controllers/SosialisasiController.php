<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Modul;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SosialisasiController extends BaseController
{   
    public function modul() {
        $modulDB = Modul::orderBy('updated_at', 'desc')->get();
        $data = [
            'page' => 'modul',
            'title' => 'modul',
            'database' => $modulDB
        ];
        return view('modul', compact('data'));
    }

    public function search(Request $request){
        $modulDB = Modul::where('judul', 'like', '%'.$request->keyword.'%')
        ->orWhere('deskripsi', 'like', '%'.$request->keyword.'%')
        ->orWhere('dokumen', 'like', '%'.$request->keyword.'%')
        ->orderBy('updated_at', 'desc')
        ->get();

        $data = [
            'page' => 'modul',
            'title' => 'modul',
            'database' => $modulDB
        ];

        $output = '';

        if($modulDB->count() >= 1){
            $output .= view('partials.list', compact('data'));
        }else{
            $output = '<p class="not-found">Modul tidak ditemukan</p>';
        }

        return $output;
    }
    
    public function faq() {
        $data = [
            'page' => 'modul',
            'kategori-1' => 'DATA, PERLINDUNGAN DAN JAMINAN SOSIAL',
            'kategori-2' => 'DATA DAN REHABILITASI SOSIAL',
            'kategori-3' => 'DATA DAN PEMBERDAYAAN SOSIAL',
            'kategori-4' => 'DATA DAN PROGRAM KESEJAHTERAAN SOSIAL',
        ];
        $faqDB = FAQ::all();
        return view('faq', compact('data', 'faqDB'));
    }

    public function tambahFaq(Request $request) {
        // Store to DB
        $faqDB = new FAQ();
        $faqDB->pertanyaan = $request->string('pertanyaan');
        $faqDB->jawaban = $request->string('jawaban');
        $faqDB->kategori = $request->string('kategori');
        $faqDB->save();

        return response()->json($faqDB);
    }

    public function upload(Request $request) {
        // Store to Storage
        $file = $request->file('dokumen');
        $fileName = Str::random(5).'_'.$file->getClientOriginalName();
        $file->storeAs('public/modul', $fileName);

        // Store to DB
        $modulDB = new Modul();
        $modulDB->judul = $request->string('judul');
        $modulDB->deskripsi = $request->string('deskripsi');
        $modulDB->tipe = $file->getClientOriginalExtension();
        $modulDB->dokumen = $fileName;
        $modulDB->save();

        return redirect()->back();
    }

    public function download($id)
    {
        $data = Modul::all()->where('id', $id)->first();
        $fileName = substr($data->dokumen, 6);
        $path = storage_path("app/public/modul/{$data->dokumen}");
        return response()->download($path, $fileName);
    }

    public function delete($id)
    {
        $data = Modul::all()->where('id', $id)->first();
        $path = storage_path("app/public/modul/{$data->dokumen}");
        unlink($path);
        $data->delete();
        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $modulDB = Modul::all()->where('id', $id)->first();

        // Checking
        if($request->hasFile('dokumen')){
            // Delete older file
            $path = storage_path("app/public/modul/{$modulDB->dokumen}");
            unlink($path);

            $file = $request->file('dokumen');
            $fileName = Str::random(5).'_'.$file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();

            // Update to Storage
            $file->storeAs("public/modul", $fileName);
        } else{
            $fileName = $modulDB->dokumen;
            $fileType = $modulDB->tipe;
        }

        // Update to DB
        $modulDB->judul = $request->string('judul');
        $modulDB->deskripsi = $request->string('deskripsi');
        $modulDB->tipe = $fileType;
        $modulDB->dokumen = $fileName;
        $modulDB->save();

        return redirect()->back();
    }
}