<?php

namespace App\Imports;

use App\Models\dummy;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DummyImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    * @param \Throwable $e
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

    public function headingRow(): int
    {
        return 5;
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }

    public function model(array $row)
    {
        return new dummy([
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['desakelurahan'],
            'jumlah' => $row['jumlah'],
            'tahun' => $this->tahun,
            'bulan' => $this->bulan
        ]);
    }
}
