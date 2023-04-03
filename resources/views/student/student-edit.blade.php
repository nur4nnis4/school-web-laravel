<form method="POST" id="edit_student_form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="alert alert-danger d-none" role="alert">
            <ul id="alert-error-ul"></ul>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="gender" name="gender">
                <option selected value="{{ $student->gender }}">{{ $student->gender }}</option>
                @if ($student->gender == 'Female')
                    <option value="Male">Male</option>
                @else
                    <option value="Female">Female</option>
                @endif
            </select>
            <label for="gender">Gender</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}">
            <label for="nis">Nis</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="class_id" name="class_id">
                <option selected value="{{ $student->class_id }}">{{ $student->class->name }}</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <label for="class">Class</label>
        </div>

        <div class="mb-3">
            <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="edit_student_btn" class="btn btn-primary"
                onclick="update({{ $student->id }})">Update</button>
        </div>
    </div>
</form>
