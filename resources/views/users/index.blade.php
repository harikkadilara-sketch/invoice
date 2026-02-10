@extends('layouts.app')
@section('title', 'User Management')

@section('content')
    <button class="btn btn-primary mb-3" id="btnAddUser">Tambah User</button>

    <table class="table table-bordered">
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                <td>
                    <button class="btn btn-warning btnEditUser" data-id="{{ $user->id }}">Edit</button>
                    <button class="btn btn-danger btnDeleteUser" data-id="{{ $user->id }}">Hapus</button>
                </td>
            </tr>
        @endforeach
    </table>

    @include('users.modal')
@endsection
@push('scripts')
    <script>
        $('#btnAddUser').click(() => {
            $('#userForm')[0].reset();
            $('#user_id').val('');
            $('#userModal').modal('show');
        });

        $('.btnEditUser').click(function() {
            $.get('/users/' + $(this).data('id'), r => {
                $('#user_id').val(r.id);
                $('#name').val(r.name);
                $('#email').val(r.email);
                $('input[name="roles[]"]').prop('checked', false);
                r.roles.forEach(x => $('input[value="' + x.id + '"]').prop('checked', true));
                $('#userModal').modal('show');
            });
        });

        $('#btnSaveUser').click(() => {
            let id = $('#user_id').val();
            $.ajax({
                url: id ? '/users/' + id : '/users',
                type: id ? 'PUT' : 'POST',
                data: $('#userForm').serialize(),
                success: r => {
                    toastr.success(r.message);
                    location.reload();
                }
            });
        });

        $('.btnDeleteUser').click(function() {
            if (!confirm('Hapus user?')) return;
            $.ajax({
                url: '/users/' + $(this).data('id'),
                type: 'DELETE',
                success: r => {
                    toastr.success(r.message);
                    location.reload();
                }
            });
        });
    </script>
@endpush
