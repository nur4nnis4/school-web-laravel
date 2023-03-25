@extends('layouts.mainlayout')

@section('title', 'Teacher')

@section('content')
    <h1>Teacher Table </h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacherList as $teacher)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $teacher->name }}</td>
                        <td>
                            <a href="/teachers/{{ $teacher->id }}"><span class="bi bi-search"></span></a>
                            <a href=""><span style="color:red" class="bi bi-trash"></span></a>
                            <a href=""><span style="color:green" class="bi bi-pencil-square"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
