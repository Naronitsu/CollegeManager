<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    // Display a list of all colleges
    public function index()
    {
        // Retrieve all colleges ordered by name
        $colleges = College::orderBy('name')->get();
        return view('colleges.index', compact('colleges'));
    }

    // Display a specific college and its students
    public function show($id)
    {
        // Find the college by ID along with its related students
        $college = College::with('students')->findOrFail($id);
        return view('colleges.show', compact('college'));
    }

    // Show the form to create a new college
    public function create()
    {
        // Create a new empty College instance
        $college = new College();
        return view('colleges.create', compact('college'));
    }

    // Store a newly created college in the database
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|unique:colleges,name|max:255',
            'address' => 'required|max:255',
        ]);

        // Create a new college record
        College::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        // Redirect back with a success message
        return redirect()->route('colleges.index')->with('success', 'College added successfully!');
    }

    // Show the form to edit an existing college
    public function edit($id)
    {
        // Retrieve the college by ID
        $college = College::findOrFail($id);
        return view('colleges.edit', compact('college'));
    }

    // Update the specified college in the database
    public function update(Request $request, $id)
    {
        // Retrieve the college by ID
        $college = College::findOrFail($id);

        // Validate the form inputs, ignoring the current college's name for uniqueness
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $id,
            'address' => 'required',
        ]);

        // Update the college record
        $college->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        // Redirect back with a success message
        return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
    }

    // Delete the specified college from the database
    public function destroy($id)
    {
        // Retrieve the college by ID and delete it
        $college = College::findOrFail($id);
        $college->delete();

        // Redirect back with a success message
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully!');
    }
}
