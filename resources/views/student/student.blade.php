@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')
    <h1>Students</h1>
    <div class="mt-5 d-flex justify-content-between">
        <div class="d-flex">
            @if (Auth::user()->role_id == 1)
                <div class="mx-1"><a class="btn btn-secondary" href="student-trash"><i class="bi bi-trash"></i>Trash</a></div>
            @endif

            @if (Auth::user()->role_id == 2)
            @else
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="create()">
                    <i class="bi bi-plus-circle"></i> Add
                </button>
            @endif
        </div>
        <div class="">
            <div style="width: 300px">
                <div class="input-group ">
                    <input type="text" name="keyword" id="myCustomSearchBox" class="form-control" placeholder="Search"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
    </div>


    <div class="mb-5" id="student-table">
        <table class="table table-striped table-sm" id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Class</th>
                    <th>Updated At</th>
                    @if (!(Auth::user()->role_id == 2))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
        </table>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body"></div>
            </div>
        </div>
    </div>
    {{-- END OF MODAL --}}
    @include('student.student-script')

    <style>
        .dataTables_filter {
            display: none;
        }
    </style>
@endsection
