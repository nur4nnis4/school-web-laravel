@extends('layouts.mainlayout')

@section('title', 'Student-Detail')

@section('content')
    <div class="my-5">
        <h1>Student Detail</h1>
    </div>


    <div class="row">
        <div class="col">
            @if ($student->image != '')
                <img src="{{ asset('storage/students/avatar/' . $student->image) }}" alt="" width="200px"
                    height="200px">
            @else
                <img src="{{ asset('storage/image/avatar.jpg') }}" alt="" width="200px" height="200px">
            @endif

        </div>
        <div class="col-8">
            <table class="table table-borderless">
                <tr>
                    <th>Name</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $student->gender }}</td>
                </tr>
                <tr>
                    <th>Nis</th>
                    <td>{{ $student->nis }}</td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td>{{ $student->class->name }}</td>
                </tr>
                <tr>
                    <th>Homeroom Teacher</th>
                    <td>{{ $student->class->teacher->name }}</td>
                </tr>
                <tr>
                    <th>Extracurriculars</th>
                    <td>
                        @foreach ($student->extracurriculars as $extracurricular)
                            {{ $extracurricular->name }} <br>
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>



    </div>
@endsection
