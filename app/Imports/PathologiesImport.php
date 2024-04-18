<?php

namespace App\Imports;

use App\Models\Pathologies;
use Maatwebsite\Excel\Concerns\ToModel;

class PathologiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name = !empty($row[0])?$row[0]:$row[1];
		return new Pathologies(['name' => $name,'description' => $row[1],]);
    }
}
