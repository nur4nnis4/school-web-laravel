@extends('layouts.mainlayout')

@section('title', 'Teacher Detail')

@section('content')
    <h1>Teacher Detail </h1>
    <div class="table-responsive">
        <table class="table table-borderles">
            <tr>
                <th>Name</th>
                <td>{{ $teacher->name }}</td>
            </tr>
            <tr>
                <th>Class</th>
                <td>
                    @if ($teacher->class)
                        {{ $teacher->class->name }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>Students</th>
                <td>
                    @if ($teacher->class)
                        @foreach ($teacher->class->students as $student)
                            {{ $student->name }} <br>
                        @endforeach
                    @endif
                </td>
            </tr>
        </table>
    </div>

@endsection
