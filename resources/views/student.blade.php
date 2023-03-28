@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')
    <h1>Student Table </h1>
    <div class="my-3 d-flex justify-content-end">
        @if (Auth::user()->role_id == 1)
            <div class="mx-1"><a class="btn btn-secondary" href="student-trash">Show Trash</a></div>
        @endif

        @if (Auth::user()->role_id == 2)
        @else
            <div class="mx-1"><a class="btn btn-primary" href="student-create">Add Student</a></div>
        @endif
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <!-- Below div class is bootstrap responsive size-->
    <div class="col-12 col-sm-8 col-md-6 ">
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="keyword" value="{{ old('keyword') }}" id="name" class="form-control"
                    placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                <button class="input-group-text btn btn-primary">
                    <span class="bi bi-search mx-2">
                </button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr class="table-dark">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Class</th>
                    @if (Auth::user()->role_id == 2)
                    @else
                        <th>Action</th>
                    @endif
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
                        <td>{{ $student->class->name }}</td>
                        @if (Auth::user()->role_id == 2)
                        @else
                            <td>
                                <a href="/students/{{ $student->id }}"><span class="bi bi-search"></span></a>
                                <a href="/student-edit/{{ $student->id }}"><span style="color:green"
                                        class="bi bi-pencil-square"></span></a>

                                @if (Auth::user()->role_id == 1)
                                    <a href="/student-delete/{{ $student->id }}"><span style="color:red"
                                            class="bi bi-trash"></span></a>
                                @endif

                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- withQueryString is to keep searching query when
            changing page --}}
        <div class="my-5">
            {{ $studentList->withQueryString()->links() }}
        </div>
    </div>

@endsection
