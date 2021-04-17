<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
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

        if (User::where('name', $row[0])->exists()) {
            $this->errors[$this->rows] = 'name "'.$row[0].'" already exists, row skipped...';
            return null;
        }

        if (User::where('email', $row[1])->exists()) {
            $this->errors[$this->rows] = 'email "'.$row[1].'" already exists, row skipped...';
            return null;
        }

        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[2]),
            'program_id' => $row[3],
            'branch_id' => $row[4],
            'first_name' => $row[5],
            'last_name' => $row[6],
            'chinese_name' => $row[7],
        ]);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
