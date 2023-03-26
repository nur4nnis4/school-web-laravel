@extends('layouts.mainlayout')

@section('title', 'Student-Delete')

@section('content')

    <div class="mx-auto" style="width: 50%">
        <h1>Student Delete</h1>
        <h4>Are you sure you want to delete : {{ $student->name }}</h4>
        <form style="display: inline-block;" action="/student-destroy/{{ $student->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>
@endsection
