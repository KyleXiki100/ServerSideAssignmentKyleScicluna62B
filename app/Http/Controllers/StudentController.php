<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Displays the list of students with optional filtering and sorting
    public function index(Request $request)
    {
        $query = Student::query();

        // Filters students by college if a filter is provided
        if ($request->filled('college')) {
            $query->where('college_id', $request->college);
        }

        // Ensures sorting is either 'asc' or 'desc'
        $sorting = $request->get('sort', "asc");
        if (!in_array($sorting, ['asc', 'desc'])) {
            $sorting = 'asc';
        }

        // Sorts students by name
        $query->orderBy('name', $sorting);

        // Paginates the results
        $students = $query->paginate(10);

        // Retrieves all colleges for filtering
        $colleges = College::all();

        return view('students.index', compact('students', 'colleges'));
    }

    // Deletes a student by ID
    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Failed to delete student. ' . $e->getMessage());
        }
    }

    // Shows the edit form for a student
    public function edit($id)
{
    try {
        $student = Student::findOrFail($id);

        // Check if dob is set before formatting
        if ($student->dob) {
            $student->dob = Carbon::parse($student->dob)->format('d/m/Y');
        }

        // Retrieves all colleges for selection
        $colleges = College::all();

        return view('students.edit', compact('student', 'colleges'));
    } catch (\Exception $e) {
        return redirect()->route('students.index')->with('error', 'Failed to load student. ' . $e->getMessage());
    }
}

    // Displays details of a specific student
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $college = $student->college;

        return view('students.show', compact('student', 'college'));
    }

    // Updates a student's details
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // Validates user input
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:students,email,' . $id,
            'phone'      => 'required|digits:8',
            'dob'        => 'required|date_format:d/m/Y',
            'college_id' => 'required|exists:colleges,id',
        ]);

        // Updates student details
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->dob = Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d');
        $student->college_id = $request->college_id;

        $student->save();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    // Shows the form to create a new student
    public function create()
    {
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

    // Stores a new student in the database
    public function store(Request $request)
    {
        // Validates user input
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:students,email',
            'phone'      => 'required|digits:8',
            'dob'        => 'required|date_format:d/m/Y',
            'college_id' => 'required|exists:colleges,id',
        ]);

        try {
            // Creates a new student and stores details
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->dob = Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d');
            $student->college_id = $request->college_id;
            
            $student->save();

            return redirect()->route('students.index')->with('success', 'Student added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Failed to add student. ' . $e->getMessage());
        }
    }
}
