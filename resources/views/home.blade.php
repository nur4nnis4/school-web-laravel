@extends('layouts.mainlayout')
@section('title', 'Home')



@section('content')
    <div class="d-flex align-items-center justify-content-center mt-5">
        <h1>Welcome {{ Auth::user()->role->name }} {{ Auth::user()->name }} </h1>
    </div>
@endsection
