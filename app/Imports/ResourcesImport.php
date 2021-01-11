<?php

namespace App\Imports;

use App\Models\Resource;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class ResourcesImport implements ToModel
{
    use Importable;

    private $rows = 0;
    private $errors = [];

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $this->rows++;

        if (Resource::where(['branch_id', $row[0], 'number', $row[1]])->exists()) {
            $this->errors[$this->rows] = 'number "'.$row[1].'" already exists in '.$row[0].', row skipped...';
            return null;
        }

        return new Resource([
            'branch_id' => $row[0],
            'number' => $row[1],
            'title_en' => $row[2],
            'title_hk' => $row[3],
            'title_cn' => $row[4],
            'min_user' => $row[5],
            'max_user' => $row[6],
            'opening_time' => $row[7],
            'closing_time' => $row[8],
        ]);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
