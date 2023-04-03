@extends('layouts.authlayout')

@section('title', 'Login')

@section('content')

    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <div class="inline inline-block">
                <h1 class="display-4 fw-bold lh-1 mb-3">SCHOOL WEB</h1>
            </div>
            <p class="col-lg-10 fs-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, quae mollitia non est doloribus alias!
                Inventore ipsa, autem nemo laudantium consectetur iste optio doloribus distinctio error delectus magni
                impedit adipisci quae numquam. Ab assumenda amet magni consectetur iste voluptatum debitis!
            </p>
        </div>
        @if (Session::has('status'))
            <div class="alert alert-danger d-grid gap-2" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif


        <div class="col-md-10 mx-auto col-lg-5">
            <form action="/login" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Email" required>
                    <label for="password">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
                </div>
                <hr class="my-4">
                <div class="mb-3">
                    Don't have and account?
                    <a href="" style="text-decoration: none">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
