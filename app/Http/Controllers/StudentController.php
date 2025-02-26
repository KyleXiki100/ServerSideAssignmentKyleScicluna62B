<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;


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
    
}