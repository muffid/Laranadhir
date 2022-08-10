<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nama' => $row['nama'],
            'noInduk' => $row['no_induk'],
            'nisn' => $row['nisn'],
            'kelas' => $row['kelas'],
            'jenkel' => $row['jenis_kelamin'],
            'tapel'=> $row['tahun_ajaran'],
            'foto'=> $row['foto'],
            'status'=> $row['status'],
        ]);
    }
}
