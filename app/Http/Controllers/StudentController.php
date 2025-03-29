<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a list of students with optional filtering and sorting
    public function index(Request $request)
    {
        $query = Student::query();
    
        // Apply college filter if provided in the request
        if ($request->has('college_id') && $request->college_id) {
            $query->where('college_id', $request->college_id);
        }
    
        // Check if the sort parameter is set to 'name' and apply sorting
        if ($request->has('sort') && $request->sort === 'name') {
            // Get the sort direction (default to ascending)
            $direction = $request->get('direction', 'asc');
            $query->orderBy('name', $direction);
        } else {
            // Default sorting by most recently created
            $query->orderBy('created_at', 'desc');
        }
    
        // Retrieve the filtered and/or sorted list of students
        $students = $query->get();

        // Retrieve all colleges to use in filter dropdown
        $colleges = College::all();
    
        return view('students.index', compact('students', 'colleges'));
    }

    // Show the form to create a new student
    public function create()
    {
        // Get all colleges for the college select dropdown
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

    // Display the details of a specific student
    public function show($id)
    {
        // Find the student by ID, including the related college
        $student = Student::with('college')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Store a new student in the database
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => ['required', 'regex:/^(79|77|21)\d{6}$|^2\d{7}$/'], // Custom regex for local phone format
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        // Create the student record
        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // Show the form to edit an existing student
    public function edit($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);
        // Get all colleges for the select input
        $colleges = College::all();

        return view('students.edit', compact('student', 'colleges'));
    }

    // Update an existing student in the database
    public function update(Request $request, $id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Validate the updated data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id, // Allow same email if unchanged
            'phone' => ['required', 'regex:/^(79|77|21)\d{6}$|^2\d{7}$/'],
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        // Update the student record
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete a student from the database
    public function destroy($id)
    {
        // Find and delete the student
        $student = Student::findOrFail($id); 
        $student->delete(); 

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
