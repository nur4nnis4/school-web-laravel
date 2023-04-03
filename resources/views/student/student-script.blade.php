<script>
    $(document).ready(function() {
        read();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    let columns = [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex',
        width: '10px',
        orderable: false,
        searchable: false,
    }, {
        data: 'name',
        name: 'name',
    }, {
        data: 'gender',
        name: 'gender',
        searchable: false
    }, {
        data: 'nis',
        name: 'nis',
    }, {
        data: 'class.name',
        name: 'class.name',
        searchable: false
    }, {
        data: 'updated_at',
        name: 'updated_at',
        visible: false,

    }, {
        data: 'actions',
        name: 'actions',
        width: '110px',
        orderable: false,
        searchable: false,
    }]


    // Read Database
    function read() {

        // If current user is student (role_id=2) remove actions column
        var user = {!! auth()->user()->toJson() !!};
        if (user.role_id == 2) {
            columns.pop();
        }

        dTable = $("#table").DataTable({
            pageLength: 8,
            bLengthChange: false, // Remove default dropdown records number
            ordering: true,
            order: [5, 'desc'],
            select: true,
            serverSide: true,
            processing: true,
            ajax: {
                'url': '{{ route('student.read') }}',
            },
            columns: columns,
            columnDefs: [{
                    className: "dt-center",
                    targets: 5
                } //columnDefs for align text to center
            ],
        });

        $('#myCustomSearchBox').keyup(function() {
            dTable.search($(this).val())
                .draw(); // this  is for customized searchbox with datatable search feature.
        });
    }

    function showModal(url, title) {
        $.get(url, {}, function(data, status) {
            $("#exampleModalLabel").html(title)
            $("#modal-body").html(data);
            $("#exampleModal").modal('show');
        });
    }

    // Show student detail modal
    function show(id) {
        showModal("{{ url('students') }}/" + id, 'Student Detail');
    }
    // Show create modal
    function create() {
        showModal("{{ url('student-create') }}", 'Add Student');
    }

    // Show edit modal
    function edit(id) {
        showModal("{{ url('student-edit') }}/" + id, 'Edit Student');
    }

    // Show delete confirmation modal
    function confirmDelete(id) {
        showModal("{{ url('student-delete') }}/" + id, 'Confirm Delete');
    }


    // Store data

    function store() {
        var formEl = document.forms.add_student_form;
        const formData = new FormData(formEl);
        $.ajax({
            url: '{{ route('student.store') }}',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Added!',
                        'Student Added Successfully!',
                        'success'
                    );
                    $('#table').DataTable().ajax.reload(); // Reload student table
                    $(".btn-close").click(); // Hide modal

                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors
                if (errors) {
                    $('.alert-danger').removeClass('d-none');
                    $.each(errors, function(key, value) {
                        $('#alert-error-ul').append('<li>' + value + '</li>');
                    });
                }
            }
        });
    }


    // Update data
    function update(id) {
        var dataString = $('#edit_student_form').serialize();
        $.ajax({
            url: '{{ url('student-update') }}' + "/" + id,
            type: 'PUT',
            data: dataString,
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Updated!',
                        'Student Updated Successfully!',
                        'success'
                    );
                    $(".btn-close").click(); // Hide modal
                    $('#table').DataTable().ajax.reload(); // Reload student table


                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors
                if (errors) {
                    $('.alert-danger').removeClass('d-none');
                    $.each(errors, function(key, value) {
                        $('#alert-error-ul').append('<li>' + value + '</li>');
                    });
                }
            }
        });
    }



    // Destroy data
    function destroy(id) {
        $.ajax({
            url: '{{ url('student-destroy') }}' + "/" + id,
            type: 'DELETE',
            cache: false,
            success: function(response) {
                Swal.fire(
                    'Deleted!',
                    'Student Deleted Successfully!',
                    'success'
                );
                $('#table').DataTable().ajax.reload(); // Reload student table
                $(".btn-close").click(); // Hide modal
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });
    }
</script>
