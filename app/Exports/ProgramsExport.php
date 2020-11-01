<?php

namespace App\Exports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ProgramsExport implements FromCollection
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Program::all();
    }
}
