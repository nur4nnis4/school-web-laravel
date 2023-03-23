@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
    <h1>Class Table </h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Teacher</th>
                <th>Total Students</th>
                <th>Students</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $class)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->teacher->name }}</td>
                    <td>{{ count($class->students) }}</td>
                    <td>
                        @foreach ($class->students as $student)
                            {{ $student['name'] }} <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
