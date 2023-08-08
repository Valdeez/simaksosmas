<?php

namespace App\Imports;

use App\Models\dummy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DummyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $tahun;
    private $bulan;

    public function __construct($tahun, $bulan)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    public function model(array $row)
    {
        return new dummy([
            'nama' => $row['nama'],
            'umur' => $row['umur'],
            'pekerjaan' => $row['pekerjaan'],
            'tahun' => $this->tahun,
            'bulan' => $this->bulan
        ]);
    }
}
