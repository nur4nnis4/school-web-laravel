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
                </tr>
            </thead>
            <tbody>
                @foreach ($teacherList as $teacher)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $teacher->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
