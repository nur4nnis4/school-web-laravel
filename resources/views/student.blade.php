@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')
    <h1>Student Table </h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Class</th>
                    <th>Extracurriculars</th>
                    <th>Homeroom Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->class['name'] }}</td>
                        <td>
                            @foreach ($student->extracurriculars as $extracurricular)
                                {{ $extracurricular->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $student->class->teacher->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
