<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\dummy;
use Illuminate\Support\Str;
use App\Imports\DummyImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArsipdataController extends BaseController
{
    public function petadata() {
        $tahun = '';
        $bulan = '';
        $namaBulan = '';
        $dummyDB = dummy::orderBy('kecamatan', 'asc')->paginate(20);
        $data = [
            'page' => 'petadata',
            'database' => $dummyDB,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'namaBulan' => $namaBulan
        ];
        return view('petadata', compact('data'));
    }

    public function select($tahun, $bulan) {
        $dummyDB = dummy::where('tahun', $tahun)->where('bulan', $bulan)->paginate(20);
        $listBulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $namaBulan = $listBulan[$bulan];
        $data = [
            'page' => 'petadata',
            'database' => $dummyDB,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'namaBulan' => $namaBulan
        ];
        return view('petadata', compact('data'));
    }

    public function search(Request $request, $tahun, $bulan){
        $listBulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $namaBulan = $listBulan[$bulan];
        $keyword = $request->string('searchData');
        $dummyDB = dummy::where('tahun', $tahun)->where('bulan', $bulan)
        ->where(function($query) use($keyword){
            $query->where('kecamatan', 'like', '%'.$keyword.'%')
                ->orWhere('kelurahan', 'like', '%'.$keyword.'%')
                ->orWhere('jumlah', 'like', '%'.$keyword.'%');
        })
        ->orderBy('kecamatan', 'asc')
        ->paginate(20)->withQueryString();
        $data = [
            'page' => 'petadata',
            'database' => $dummyDB,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'namaBulan' => $namaBulan
        ];
        $output = view('petadata', compact('data'));
        return $output;
    }

    public function import(Request $request) {
        $tahun = $request->string('tahun');
        $bulan = $request->string('bulan');
        $excel = $request->file('dokumen');
        $excelName = Str::random(5).'_'.$excel->getClientOriginalName();

        // Store to DB
        $arsipDB = new Arsip();
        $arsipDB->tahun = $tahun;
        $arsipDB->bulan = $bulan;
        $arsipDB->dokumen = $excelName;
        $arsipDB->save();

        // Store to Storage
        $excel->storeAs("public/petadata/", $excelName);

        Excel::import(new DummyImport($tahun, $bulan), $request->file('dokumen'));

        return redirect("/petadata/{$tahun}/{$bulan}");
    }

    public function delete($tahun, $bulan) {
        $arsipDB = Arsip::all()->where('tahun', $tahun)->where('bulan', $bulan)->first();
        $path = storage_path("app/public/petadata/{$arsipDB->dokumen}");
        unlink($path);
        
        $dummyDB = dummy::all()->where('tahun', $tahun)->where('bulan', $bulan);
        
        $dummyDB->each->delete();
        $arsipDB->delete();

        return redirect()->back();
    }

    public function download($tahun, $bulan)
    {
        $data = Arsip::all()->where('tahun', $tahun)->where('bulan', $bulan)->first();
        $fileName = substr($data->dokumen, 6);
        $path = storage_path("app/public/petadata/{$data->dokumen}");
        return response()->download($path, $fileName);
    }

    public function uploadDummy(Request $request) {
        // Store to DB
        $dummyDB = new dummy();
        $dummyDB->nama = $request->string('nama');
        $dummyDB->umur = $request->string('umur');
        $dummyDB->pekerjaan = $request->string('pekerjaan');
        $dummyDB->tahun = $request->string('tahun');
        $dummyDB->bulan = $request->string('bulan');
        $dummyDB->save();

        return response()->json($dummyDB);
    }
}