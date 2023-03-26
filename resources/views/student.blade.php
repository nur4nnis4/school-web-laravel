@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')
    <h1>Student Table </h1>
    <div class="my-3 d-flex justify-content-end">
        <div class="mx-1"><a class="btn btn-secondary" href="student-trash">Show Trash</a></div>
        <div class="mx-1"><a class="btn btn-primary" href="student-create">Add Student</a></div>

    </div>
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
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
                        <th scope="row">
                            {{ $studentList->firstItem() - 1 + $loop->iteration }}
                        </th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>
                            <a href="/students/{{ $student->id }}"><span class="bi bi-search"></span></a>
                            <a href="/student-edit/{{ $student->id }}"><span style="color:green"
                                    class="bi bi-pencil-square"></span></a>
                            <a href="/student-delete/{{ $student->id }}"><span style="color:red"
                                    class="bi bi-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="my-5">
            {{ $studentList->links() }}
        </div>
    </div>

@endsection
