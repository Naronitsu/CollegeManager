<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('college_id') && $request->college_id) {
            $query->where('college_id', $request->college_id);
        }

        $students = $query->orderBy('name')->get();
        $colleges = College::all();

        return view('students.index', compact('students', 'colleges'));
    }

    public function create()
    {
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|regex:/^[0-9]{8}$/',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit($id)
{
    $student = Student::findOrFail($id);
    $colleges = College::all();
    
    return view('students.edit', compact('student', 'colleges'));
}

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
{
    $student = Student::findOrFail($id); 
    $student->delete(); 

    return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
}

}