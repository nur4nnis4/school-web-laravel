@extends('layouts.mainlayout')

@section('title', 'Student Trash')

@section('content')
    <h1>Student Trash </h1>
    <div class="my-3">
        <a class="btn btn-secondary" href="/students">Back</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr class="table-dark">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="student/{{ $student->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
