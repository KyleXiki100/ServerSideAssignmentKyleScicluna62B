<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    // Shows a list of all colleges
    public function index()
    {
        try {
            $colleges = College::all();
            return view('colleges.index', compact('colleges'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Failed to load colleges. ' . $e->getMessage());
        }
    }

    // Deletes a college by its ID
    public function destroy($id)
    {
        try {
            $college = College::findOrFail($id);
            $college->delete();

            return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to delete college. ' . $e->getMessage());
        }
    }

    // Shows the edit form for a specific college
    public function edit($id)
    {
        try {
            $college = College::findOrFail($id);
            return view('colleges.edit', compact('college'));
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to load college for editing. ' . $e->getMessage());
        }
    }

    // Updates an existing college
    public function update(Request $request, $id)
    {
        // Validate user input
        $request->validate([
            'name'    => 'required|unique:colleges,name,' . $id,
            'address' => 'required',
        ], [
            'name.unique' => 'College name must be unique!'
        ]);

        try {
            // Finds and updates the college
            $college = College::findOrFail($id);
            $college->name = $request->name;
            $college->address = $request->address;
            $college->save();

            return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to update college. ' . $e->getMessage());
        }
    }

    // Shows details of a specific college
    public function show($id)
    {
        try {
            $college = College::findOrFail($id);
            return view('colleges.show', compact('college'));
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to load college details. ' . $e->getMessage());
        }
    }

    // Shows the form to create a new college
    public function create()
    {
        try {
            return view('colleges.create');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to load create form. ' . $e->getMessage());
        }
    }

    // Stores a new college in the database
    public function store(Request $request)
    {
        // Validate user input
        $request->validate([
            'name'    => 'required|unique:colleges,name',
            'address' => 'required',
        ], [
            'name.unique' => 'College name must be unique!'
        ]);

        try {
            // Creates and saves a new college
            $college = new College();
            $college->name = $request->name;
            $college->address = $request->address;
            $college->save();

            return redirect()->route('colleges.index')->with('success', 'College created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to create college. ' . $e->getMessage());
        }
    }
}
