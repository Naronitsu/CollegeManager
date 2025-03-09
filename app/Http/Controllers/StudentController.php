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
    
        // Apply college filter if it's set
        if ($request->has('college_id') && $request->college_id) {
            $query->where('college_id', $request->college_id);
        }
    
        // Check if the sort parameter is set to 'name' and apply sorting
        if ($request->has('sort') && $request->sort === 'name') {
            // If sorting by name is clicked again, remove sorting (reset to default)
            $direction = $request->get('direction', 'asc');
            $query->orderBy('name', $direction);
        } else {
            // Default order (no sorting, or reset sorting)
            $query->orderBy('created_at', 'desc'); // Or any default field
        }
    
        // Get the students and colleges
        $students = $query->get();
        $colleges = College::all();
    
        return view('students.index', compact('students', 'colleges'));
    }    


    public function create()
    {
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

        public function show($id)
    {
        $student = Student::with('college')->findOrFail($id);
        return view('students.show', compact('student'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => ['required', 'regex:/^(79|77|21)\d{6}$|^2\d{7}$/'], 
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
            'phone' =>  ['required', 'regex:/^(79|77|21)\d{6}$|^2\d{7}$/'],
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