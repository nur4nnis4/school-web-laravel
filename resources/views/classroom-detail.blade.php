@extends('layouts.mainlayout')

@section('title', 'Class-Detail')

@section('content')

    <br>
    <h1>Class Detail</h1>
    <br>
    <table class="table table-borderless ">
        <tr>
            <th>Name</th>
            <td>{{ $class->name }}</td>
        </tr>
        <tr>
            <th>Teacher</th>
            <td>{{ $class->teacher->name }}</td>
        </tr>
        <tr>
            <th>Total Student</th>
            <td>{{ count($class->students) }}</td>
        </tr>
        <tr>
            <th>Students</th>
            <td>
                @foreach ($class->students as $student)
                    {{ $student->name }} <br>
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
