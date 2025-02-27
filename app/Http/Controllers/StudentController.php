<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentController extends Controller
{

    public function index(Request $request){
        $query = Student::query(); 
        //filtering 
        if($request->filled('college')){
            $query->where('college_id',$request->college);
        }

        //sorting
    
        $sorting = $request->get('sort',"asc");
        if(!in_array($sorting,['asc','desc'])){
            $sorting = 'asc';
        }
        $query -> orderBy('name',$sorting);
    
        $students = $query->paginate(10);
    
        $colleges = College::all();
        
        return view('students.index', compact('students', 'colleges'));
        
        
    }
     public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('Success','Student Deleted.');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit',compact('students'));
       
    }

    public function update(Request $request, $id){
        $student = Student::findOrFail($id);

        $student->name = $request->name;
    $student->email = $request->email;
    $student->save();

    return redirect()
        ->route('students.index')
        ->with('success', 'student updated successfully!');
}



public function create(){
    $colleges = College::all();
    return view('students.create',compact('colleges'));
}

public function store(Request $request){

    $request->validate([
        'name'  => 'required',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required',
        'dob'   => 'required|date_format:d/m/Y', 
        'college_id' => 'required|exists:colleges,id',
    ]);


    $student = new Student();
    $student ->name = $request->name;
    $student->email = $request->email;
    $student->phone = $request->phone;
    $student->dob = Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d');
    $student->college_id = $request->college_id;
   
    $student->save();
    
    return redirect()
    -> route('students.index')
    -> with('success','student created');
}
    
}