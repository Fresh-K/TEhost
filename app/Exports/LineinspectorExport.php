<?php

namespace App\Exports;

use App\Models\Lineinspector;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LineinspectorExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect(Lineinspector::getStates());

    }

    public function headings(): array
    {
        return ['Name', 'Matricule','status', 'POS', 'Validation','Avg time/s'];
    }
}
