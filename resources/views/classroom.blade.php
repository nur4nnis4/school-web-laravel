@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
    <h1>Class Table </h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $class)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $class->name }}</td>
                    <td>
                        <a href="/classes/{{ $class->id }}"><span class="bi bi-search"></span></a>
                        <a href=""><span style="color:red" class="bi bi-trash"></span></a>
                        <a href=""><span style="color:green" class="bi bi-pencil-square"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
