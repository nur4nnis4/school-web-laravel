@extends('layouts.mainlayout')
@section('title', 'Home')



@section('content')
    <h1>Welcome {{ $name }}</h1>
    {{-- @if ($role == 'admin')
            <a href="">Ke halaman admin</a><br>
        @elseif ($role == 'staff')
            <a href="">Ke halaman gudang</a><br>
        @else
            <a href="">Ke halaman whatever</a><br>
        @endif --}}

    {{-- @switch($role)
            @case('admin')
                <a href="">Ke halaman admin</a><br>
            @break

            @case('staff')
                <a href="">Ke halaman gudang</a><br>
            @break

            @default
                <a href="">Ke halaman whatever</a><br>
        @endswitch --}}

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
        @foreach ($fruit as $fruit)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $fruit }}</td>
            </tr>
        @endforeach

    </table>


    <button class="btn btn-primary">Submit</button>
@endsection
