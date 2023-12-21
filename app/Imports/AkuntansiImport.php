<?php

namespace App\Imports;

use App\Models\Akuntansi_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AkuntansiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Akuntansi_model([
            
            'nidn'     => $row['nidn'],
            'nik_nip'  => $row['nik_nip'], 
            'nama'     => $row['nama'],
            'email'    => $row['email'], 
        ]);
    }
}
