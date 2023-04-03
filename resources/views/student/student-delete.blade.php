<div class="modal-body">
    <div class="d-flex flex-column align-items-center">
        <h1>
            <i class="bi bi-exclamation-circle" style="color: red"></i>
        </h1>

        <h2>Are you sure ?</h2>
        <p> Do you really want to delete
            <span style="color: red">{{ $student->name }} </span> ?
        </p>
    </div>

</div>
<div class="modal-footer">
    <button type="button" id="edit_student_btn" class="btn btn-danger"
        onclick="destroy({{ $student->id }})">Delete</button>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
</div>
