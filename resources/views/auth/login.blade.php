@extends('layouts.authlayout')

@section('title', 'Login')

@section('content')

    <div class="mx-5" style="width: 400px">
        <h1>Login</h1>
        @if (Session::has('status'))
            <div class="alert alert-danger d-grid gap-2" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif


        <div class="my-3">
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Email" required>
                    <label for="password">Password</label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
