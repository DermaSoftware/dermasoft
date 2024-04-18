<?php

namespace App\Imports;

use App\Models\Diagnoses;
use Maatwebsite\Excel\Concerns\ToModel;

class DiagnosesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Diagnoses([
            'code' => $row[0],
            'name' => $row[1],
        ]);
    }
}
