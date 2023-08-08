<?php

namespace App\Http\Controllers;

use App\Models\Warta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class KontenController extends BaseController
{
    public function warta() {
        $wartaDB = Warta::orderBy('id', 'desc')->get();
        $data = [
            'page' => 'warta',
            'database' => $wartaDB
        ];
        return view('warta', compact('data'));
    }

    public function search(Request $request){
        $wartaDB = Warta::where('judul', 'like', '%'.$request->keyword.'%')
        ->orWhere('isi', 'like', '%'.$request->keyword.'%')
        ->orderBy('updated_at', 'desc')
        ->get();

        $data = [
            'page' => 'warta',
            'database' => $wartaDB
        ];

        $output = '';

        if($wartaDB->count() >= 1){
            $output .= view('partials.news', compact('data'));
        }else{
            $output = '<p class="not-found">Warta tidak ditemukan</p>';
        }

        return $output;
    }
    
    public function detail($id) {
        $wartaDB = Warta::where('id', $id)->first();
        $wartaOther = Warta::whereNot('id', $id)->orderBy('created_at', 'desc')->limit(5)->get();
        $data = [
            'page' => 'warta',
            'database' => $wartaDB,
            'other' => $wartaOther
        ];
        return view('detail', compact('data'));
    }

    public function upload(Request $request) {
        if($request->hasFile('dokumen')){
            $file = $request->file('dokumen');
            $fileName = Str::random(5).'_'.$file->getClientOriginalName();
            $file->storeAs("public/warta/", $fileName);
        } else{
            $fileName = 'default.png';
        }

        $wartaDB = new Warta();
        $wartaDB->judul = $request->string('judul');
        $wartaDB->isi = $request->string('isi');
        $wartaDB->sumber = $request->string('sumber');
        $wartaDB->dokumen = $fileName;
        $wartaDB->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Warta::all()->where('id', $id)->first();
        if($data->dokumen != 'default.png'){
            $path = storage_path("app/public/warta/{$data->dokumen}");
            unlink($path);
        }
        $data->delete();
        return redirect('/warta');
    }

    public function edit($id, Request $request)
    {
        $wartaDB = Warta::all()->where('id', $id)->first();

        // Checking
        if($request->hasFile('dokumen')){
            // Delete older file
            $path = storage_path("app/public/warta/{$wartaDB->dokumen}");
            unlink($path);

            $file = $request->file('dokumen');
            $fileName = Str::random(5).'_'.$file->getClientOriginalName();

            // Update to Storage
            $file->storeAs("public/warta", $fileName);
        } else{
            $fileName = $wartaDB->dokumen;
        }

        // Update to DB
        $wartaDB->judul = $request->string('judul');
        $wartaDB->isi = $request->string('isi');
        $wartaDB->sumber = $request->string('sumber');
        $wartaDB->dokumen = $fileName;
        $wartaDB->save();

        return redirect()->back();
    }
}
