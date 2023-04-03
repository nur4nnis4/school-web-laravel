<form method="POST" id="add_student_form" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="alert alert-danger d-none" role="alert">
            <ul id="alert-error-ul"></ul>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" id="name" name="name"
                value="{{ old('name') }}" placeholder="Name" required>
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" id="gender" name="gender" required>
                @if (!old('gender'))
                    <option selected value=""> Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                @else
                    @if (old('gender') == 'Male')
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
                    @else
                        <option value="Male">Male</option>
                        <option selected value="Female">Female</option>
                    @endif
                @endif

            </select>
            <label for="gender">Gender</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" id="nis" name="nis"
                value="{{ old('nis') }}" placeholder="Name" required>
            <label for="nis">Nis</label>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" id="class_id" name="class_id" required>
                @if (!old('class_id'))
                    <option selected value="{{ old('class_id') }}">Choose Class</option>
                @endif
                @foreach ($classes as $class)
                    @if ($class->id == old('class_id'))
                        <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                    @else
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endif
                @endforeach
            </select>
            <label for="class">Class</label>
        </div>

        <div class="mb-3">
            <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="add_student_btn" class="btn btn-primary" onclick="store()">Save</button>
    </div>
</form>
