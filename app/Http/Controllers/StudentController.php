<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::simplePaginate(10);

        return view('students.index', compact('students'));
    }

    public function store( Request $request)
    {
       $validated = $request->validate([
        'name' => 'required',
       ]);

       Student::create($validated);

       return redirect()->route('students.index')->with('success', 'Added Successfully');
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'student_records' => 'required|mimes:xlsx'
        ]);

        Excel::import(new StudentsImport, $request->file('student_records'));

        return redirect()->route('students.index')->with('success', 'Imported Successfully');
    }
}