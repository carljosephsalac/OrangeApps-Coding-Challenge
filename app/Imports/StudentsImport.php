<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Student([
        //     'name' => $row['name'],
        //     'grade' => $row['grade']
        // ]);

        return Student::updateOrCreate(
            ['name' => $row['name']],
            ['grade' => $row['grade']]
        );
    }
}