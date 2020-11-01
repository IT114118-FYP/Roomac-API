<?php

namespace App\Imports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class ProgramsImport implements ToModel
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

        if (Program::where('id', $row[0])->exists()) {
            $this->errors[$this->rows] = 'id "'.$row[0].'" already exists, row skipped...';
            return null;
        }

        return new Program([
            'id' => $row[0],
            'title_en' => $row[1],
            'title_hk' => $row[2],
            'title_cn' => $row[3],
        ]);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
