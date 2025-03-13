<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

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

        return redirect()
        ->route('colleges.edit', $id)
        ->with('error', 'Failed to update college.');
       
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required',
        ],[
            'name.unique' => 'College name must be unique!'
        
        ]);

        $college = College::findOrFail($id);

        $college->name = $request->name;
        $college->address = $request->address;
        $college->save();

    return redirect()
        ->route('colleges.index')
        ->with('success', 'College updated successfully!');
}

public function show($id){
    $college = College::findOrFail($id);

    return view('colleges.show', compact('college'));
}



public function create(){
    return view('colleges.create');
}

public function store(Request $request){
    $request->validate([
        'name' => 'required|unique:colleges,name',
        'address' => 'required',
    ],[
        'name.unique' => 'College name must be unique!'
    
    ]);

    $college = new College();
    $college ->name = $request->name;
    $college->address = $request->address;
    $college->save();
    
    return redirect()
    -> route('colleges.index')
    -> with('success','College created');
}
   }



   

