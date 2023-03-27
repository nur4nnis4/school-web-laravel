@extends('layouts.mainlayout')
@section('title', 'Create Student')
@section('content')
    <div class="mx-auto" style="width: 50%">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Add Student</h1>

        <form action="/student-store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="gender" name="gender" required>
                    @if (!old('gender'))
                        <option selected value=""> Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    @else
                        @if (old('gender') == 'Male')
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                        @else
                            <option value="Male">Male</option>
                            <option selected value="Female">Female</option>
                        @endif
                    @endif

                </select>
                <label for="gender">Gender</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis') }}"
                    required>
                <label for="nis">Nis</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="class_id" name="class_id" required>
                    @if (!old('class_id'))
                        <option selected value="{{ old('class_id') }}">Choose Class</option>
                    @endif
                    @foreach ($classes as $class)
                        @if ($class->id == old('class_id'))
                            <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                        @else
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="class">Class</label>
            </div>

            <div class="mb-3">
                <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*">
            </div>


            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
