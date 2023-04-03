<div class="row mx-2 my-2 d-flex justify-content-center">
    <div class="col mt-2">
        @if ($student->image != '')
            <img src="{{ asset('storage/students/avatar/' . $student->image) }}" alt="" width="100px"
                height="100px">
        @else
            <img src="{{ asset('storage/image/avatar.jpg') }}" alt="" width="100px" height="100px">
        @endif

    </div>
    <div class="col-8">
        <table class="table table-borderless table-sm">
            <tr>
                <th>Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <th>Nis</th>
                <td>{{ $student->nis }}</td>
            </tr>
            <tr>
                <th>Class</th>
                <td>{{ $student->class->name }}</td>
            </tr>
            <tr>
                <th>Homeroom Teacher</th>
                <td>{{ $student->class->teacher->name }}</td>
            </tr>
            <tr>
                <th>Extracurriculars</th>
                <td>
                    @foreach ($student->extracurriculars as $extracurricular)
                        {{ $extracurricular->name }} <br>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>
