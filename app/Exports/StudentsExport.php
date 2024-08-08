<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select('name', 'grade')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Grade',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Apply bold styling to the first row (headings)
            1 => ['font' => ['bold' => true]],
        ];
    }
}