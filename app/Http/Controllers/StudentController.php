<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('lar.student.index', compact('students'));
    }

    public function create()
    {
        $students = [];
        return view('lar.student.index', compact('students'));
        // return view('lar.student.index', ['students' => $students]);
    }

    public function store(Request $request)
    {
        try {
            // Validate the form data.
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                // 'phone' => 'required|numeric',
                'phone' => 'required|string|max:255',
            ]);

        // Add debugging statement to check received data
        // dd($validatedData);

            Student::create($validatedData);
            return redirect()->route('lar.student.index')->with('success', 'Student created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('lar.student.create')->with('error', 'Failed to create student. ' . $e->getMessage());
        }
    }

    // public function show()
    // {
    //     $students = Student::all();
    //     return view('lar.student.show', compact('students'));
    // }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('lar.student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('lar.student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'phone' => 'required|string|max:255',
            ]);
            $student->update($validatedData);
            return redirect()->route('lar.student.index')->with('success', 'Student updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('lar.student.edit', $student)->with('error', 'Failed to update student. ' . $e->getMessage());
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('lar.student.index')->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('lar.student.index')->with('error', 'Failed to delete student. ' . $e->getMessage());
        }
    }
}
