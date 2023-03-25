<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::get();
        return view('student', ['studentList' => $students]);
    }

    public function show(string $id)
    {
        $student = Student::with(['class.teacher', 'extracurriculars'])->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $classes = ClassRoom::select('id', 'name')->get();
        return view('student-create', ['classes' => $classes]);
    }

    public function store(StoreStudentRequest $request)
    {
        // $validated = $request->validate([
        //     'nis' => 'unique:students|size:10|numeric',
        //     'name' => 'max:50',
        // ]);
        $student = Student::create($request->all());
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully added data to database');
        }
        return redirect('/students');
    }

    public function edit(string $id)
    {
        $student = Student::with(['class', 'extracurriculars'])->findOrFail($id);
        $classes = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'classes' => $classes]);
    }

    public function update(Request $request, String $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
