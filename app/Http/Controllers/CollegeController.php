<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::orderBy('name')->get();
        return view('colleges.index', compact('colleges'));
    }

    public function create()
    {
        return view('colleges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges,name|max:255',
            'address' => 'required|max:255',
        ]);

        College::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('colleges.index')->with('success', 'College added successfully!');
    }

    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('colleges.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $college = College::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:colleges,name,' . $id,
            'address' => 'required',
        ]);

        $college->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
    }

    public function destroy($id)
    {
        $college = College::findOrFail($id);
        $college->delete();
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully!');
    }
}
