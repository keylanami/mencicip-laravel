<?php

namespace App\Imports;

use App\Models\Kereta;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportKereta implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kereta([
            "nama_kereta" => $row[0],
            "no_kereta" => $row[1]
        ]);
    }
}
