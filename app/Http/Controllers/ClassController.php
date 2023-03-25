<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classList = ClassRoom::get();
        return view('classroom', ['classList' => $classList]);
    }

    public function show($id)
    {
        $class = ClassRoom::with(['students', 'teacher'])->findOrFail($id);
        return view('classroom-detail', ['class' => $class]);
    }
}
