@extends('layouts.mainlayout')
@section('title', 'Edit Student')
@section('content')
    <div class="mx-auto" style="width: 50%">
        <h1>Edit Student</h1>
        <form action="/student-update/{{ $student->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="gender" name="gender">
                    <option selected value="{{ $student->gender }}">{{ $student->gender }}</option>
                    @if ($student->gender == 'Female')
                        <option value="Male">Male</option>
                    @else
                        <option value="Female">Female</option>
                    @endif
                </select>
                <label for="gender">Gender</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}">
                <label for="nis">Nis</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="class_id" name="class_id">
                    <option selected value="{{ $student->class_id }}">{{ $student->class->name }}</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                <label for="class">Class</label>
            </div>

            <div class="mb-3">
                <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*">
            </div>

            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
