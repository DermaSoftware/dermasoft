<?php

namespace App\Imports;

use App\Models\Medicines;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicinesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Medicines([
            'name' => $row[0],
            'description' => $row[1],
        ]);
    }
}
