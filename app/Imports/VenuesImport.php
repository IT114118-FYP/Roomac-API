<?php

namespace App\Imports;

use App\Models\Venue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class VenuesImport implements ToModel
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

        if (Venue::where(['branch_id', $row[0], 'number', $row[1]])->exists()) {
            $this->errors[$this->rows] = 'number "'.$row[1].'" already exists in '.$row[0].', row skipped...';
            return null;
        }

        return new Venue([
            'branch_id' => $row[0],
            'number' => $row[1],
            'title_en' => $row[2],
            'title_hk' => $row[3],
            'title_cn' => $row[4],
            'opening_time' => $row[5],
            'closing_time' => $row[6],
        ]);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
