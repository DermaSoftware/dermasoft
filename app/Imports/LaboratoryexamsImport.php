<?php

namespace App\Imports;

use App\Models\Laboratoryexams;
use Maatwebsite\Excel\Concerns\ToModel;

class LaboratoryexamsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Laboratoryexams([
            'name' => $row[0],
            'description' => $row[1],
        ]);
    }
}
