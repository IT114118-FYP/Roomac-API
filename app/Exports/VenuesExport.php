<?php

namespace App\Exports;

use App\Models\Venue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class VenuesExport implements FromCollection
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Venue::all();
    }
}
