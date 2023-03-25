@extends('layouts.mainlayout')

@section('title', 'Student-Detail')

@section('content')

    <br>
    <h1>Student Detail</h1>
    <br>
    <table class="table table-borderless ">
        <tr>
            <th>Name</th>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $student->nis }}</td>
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
@endsection

<style>
    th {
        width: 20%
    }
</style>
