<?php

namespace App\Exports;

use App\Models\Kereta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportKereta implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kereta::all();
    }

    public function headings(): array
    {
        return [
            'ID Kereta',
            'Nama Kereta',
            'Nomor Kereta'
        ];
    }


}
