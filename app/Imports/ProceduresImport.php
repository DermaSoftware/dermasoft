<?php

namespace App\Imports;

use App\Models\Procedures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProceduresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Procedures([
            'name' => $row[0],
            'description' => $row[1],
        ]);
    }
}
