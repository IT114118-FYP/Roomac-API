<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class CategoriesImport implements ToModel
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

        return new Category([
            'title_en' => $row[0],
            'title_hk' => $row[1],
            'title_cn' => $row[2],
            'image_url' => $row[3],
        ]);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
