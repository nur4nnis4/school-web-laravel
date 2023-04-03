<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{

    public function index(Request $request)
    {

        return view('student.student');
    }

    public function read(Request $request)
    {
        /**
         * 1. Select('students.*') prevents same column name
         * (student:name & class:name) confusion
         * when ordering table based on class name

         * 2. Should not order table on eloquent (ex:orderBy('id', 'desc')) if
         * datatables frontend ordering is activated(ordering:true)
         */

        $students = Student::with('class:id,name')->select('students.*');
        return datatables()::of($students)
            ->addIndexColumn()
            ->editColumn('class.name', function ($data) {
                return $data->class->name;
            })
            ->addColumn('actions', function ($data) {
                return view('student.action-buttons', ['student' => $data]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function show(string $id)
    {

        $student = Student::with(['class.teacher', 'extracurriculars'])->findOrFail($id);
        return view('student.student-detail', ['student' => $student]);
    }

    public function create()
    {
        $classes = ClassRoom::select('id', 'name')->get();
        return view('student.student-create', ['classes' => $classes]);
    }

    public function store(StoreStudentRequest $request)
    {
        if ($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName  = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('students/avatar', $fileName);
            $request['image'] = $fileName;
        }
        $student = Student::create($request->all());

        return response()->json(['status' => 200]);
    }

    public function edit(string $id)
    {
        $student = Student::with(['class', 'extracurriculars'])->findOrFail($id);
        $classes = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student.student-edit', ['student' => $student, 'classes' => $classes]);
    }

    public function update(Request $request, String $id)
    {
        if ($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName  = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('avatar')->storeAs('students/avatar', $fileName);
            $request['image'] = $fileName;
        }
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json(['status' => 200]);
    }

    public function delete(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.student-delete', ['student' => $student]);
    }

    public function destroy(string $id)
    {
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();
        return response()->json(['status' => 200]);
    }

    public function showTrash()
    {
        $studentTrash = Student::onlyTrashed()->get();
        return view('student.student-trash', ['studentList' => $studentTrash]);
    }

    public function restoreTrash(String $id)
    {
        $studentTrash = Student::withTrashed()->where('id', $id)->restore();
        return redirect('student-trash');
    }
}
