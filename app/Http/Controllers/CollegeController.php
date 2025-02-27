<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    public function destroy($id){
        $college = College::findOrFail($id);
        $college->delete();

        return redirect()
            ->route('colleges.index')
            ->with('Success','College Deleted.');
    }

    public function edit($id){
        $college = College::findOrFail($id);
        return view('colleges.edit',compact('college'));
       
    }

    public function update(Request $request, $id){
        $college = College::findOrFail($id);

        $college->name = $request->name;
    $college->address = $request->address;
    $college->save();

    return redirect()
        ->route('colleges.index')
        ->with('success', 'College updated successfully!');
}



public function create(){
    return view('colleges.create');
}

public function store(Request $request){
    $college = new College();
    $college ->name = $request->name;
    $college->address = $request->address;
    $college->save();
    
    return redirect()
    -> route('colleges.index')
    -> with('success','College created');
}
   }

   

