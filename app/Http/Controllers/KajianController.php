<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class KajianController extends BaseController
{    
    public function kajian($kategori) {
        $listKategori = [
            'penanggulangan-kemiskinan' => 'Pengelolaan Data dan Penanggulangan Kemiskinan',
            'jaminan-sosial' => 'Pengelolaan Data dan Jaminan Sosial',
            'pemberdayaan-sosial' => 'Pengelolaan Data dan Pemberdayaan Sosial',
            'rehabilitasi-sosial' => 'Pengelolaan Data dan Rehabilitasi Sosial',
            'perlindungan-sosial' => 'Pengelolaan Data dan Perlindungan Sosial',
        ];
        $title = $listKategori[$kategori];
        $kajianDB = Kajian::where('kategori', $kategori)->orderBy('updated_at', 'desc')->get();
        $data = [
            'page' => 'kajian',
            'kategori' => $kategori,
            'title' => $title,
            'database' => $kajianDB
        ];
        return view('kajian', compact('data'));
    }

    public function search(Request $request, $kategori){
        $listKategori = [
            'penanggulangan-kemiskinan' => 'Pengelolaan Data dan Penanggulangan Kemiskinan',
            'jaminan-sosial' => 'Pengelolaan Data dan Jaminan Sosial',
            'pemberdayaan-sosial' => 'Pengelolaan Data dan Pemberdayaan Sosial',
            'rehabilitasi-sosial' => 'Pengelolaan Data dan Rehabilitasi Sosial',
            'perlindungan-sosial' => 'Pengelolaan Data dan Perlindungan Sosial',
        ];
        $title = $listKategori[$kategori];
        $keyword = $request->keyword;
        $kajianDB = Kajian::where('kategori', $kategori)
        ->where(function($query) use($keyword){
            $query->where('judul', 'like', '%'.$keyword.'%')
                ->orWhere('deskripsi', 'like', '%'.$keyword.'%')
                ->orWhere('dokumen', 'like', '%'.$keyword.'%');
        })
        ->orderBy('updated_at', 'desc')
        ->get();
        $data = [
            'page' => 'kajian',
            'kategori' => $kategori,
            'title' => $title,
            'database' => $kajianDB
        ];

        $output = '';
        if($kajianDB->count() >= 1){
            $output .= view('partials.list', compact('data'));
        }else{
            $output = '<p class="not-found">Kajian tidak ditemukan atau tidak dalam kategori</p>';
        }
        return $output;
    }

    public function upload(Request $request) {
        // Store to Storage
        $file = $request->file('dokumen');
        $fileCategory = $request->string('kategori');
        $fileName = Str::random(5).'_'.$file->getClientOriginalName();
        $file->storeAs("public/kajian/{$fileCategory}", $fileName);

        // Store to DB
        $kajianDB = new Kajian();
        $kajianDB->judul = $request->string('judul');
        $kajianDB->deskripsi = $request->string('deskripsi');
        $kajianDB->kategori = $fileCategory;
        $kajianDB->tipe = $file->getClientOriginalExtension();
        $kajianDB->dokumen = $fileName;
        $kajianDB->save();

        // return response()->json($kajianDB);
        return redirect("/kajian/{$fileCategory}");
    }

    public function download($id)
    {
        $data = Kajian::all()->where('id', $id)->first();
        $fileName = substr($data->dokumen, 6);
        $path = storage_path("app/public/kajian/{$data->kategori}/{$data->dokumen}");
        return response()->download($path, $fileName);
    }
    
    public function delete($id)
    {
        $data = Kajian::all()->where('id', $id)->first();
        $path = storage_path("app/public/kajian/{$data->kategori}/{$data->dokumen}");
        unlink($path);
        $data->delete();
        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $kajianDB = Kajian::all()->where('id', $id)->first();

        // Checking
        if($request->hasFile('dokumen')){
            // Delete older file
            $path = storage_path("app/public/kajian/{$kajianDB->kategori}/{$kajianDB->dokumen}");
            unlink($path);

            $file = $request->file('dokumen');
            $fileName = Str::random(5).'_'.$file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();
            $fileCategory = $request->string('kategori');

            // Update to Storage
            $file->storeAs("public/kajian/{$fileCategory}", $fileName);
        } else{
            $fileName = $kajianDB->dokumen;
            $fileType = $kajianDB->tipe;
            $fileCategory = $request->string('kategori');

            // Move file
            Storage::move("public/kajian/{$kajianDB->kategori}/{$fileName}", "public/kajian/{$fileCategory}/{$fileName}");
        }

        // Update to DB
        $kajianDB->judul = $request->string('judul');
        $kajianDB->deskripsi = $request->string('deskripsi');
        $kajianDB->kategori = $fileCategory;
        $kajianDB->tipe = $fileType;
        $kajianDB->dokumen = $fileName;
        $kajianDB->save();

        return redirect("/kajian/{$fileCategory}");
    }
}