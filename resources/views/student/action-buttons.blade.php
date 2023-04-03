@if (Auth::user()->role_id == 2)
    <div>Hello</div>
@else
    <td>
        <a class="btn btn-sm btn-primary" onclick="show({{ $student->id }})"><i class="bi bi-eye"></i></a>
        <a class="btn btn-sm btn-warning" onclick="edit({{ $student->id }})"><i class="bi bi-pencil-square"></i> </a>

        @if (Auth::user()->role_id == 1)
            <a class="btn btn-sm btn-danger" onclick="confirmDelete({{ $student->id }})"><i class="bi bi-trash"></i></a>
        @endif

    </td>
@endif
