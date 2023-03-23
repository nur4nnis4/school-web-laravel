@extends('layouts.mainlayout')

@section('title', 'Extracurricular')

@section('content')
    <h1>Extracurricular Table </h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Members</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($extracurricularList as $extracurricular)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $extracurricular->name }}</td>
                        <td>
                            @foreach ($extracurricular->students as $student)
                                {{ $student->name }} <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
