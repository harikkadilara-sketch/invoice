@extends('layouts.app')
@section('title', 'Menu Management')

@section('content')
    <button class="btn btn-primary mb-3" id="btnAddMenu">Tambah Menu</button>

    <table class="table table-bordered">
        @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->route }}</td>
                <td>{{ $menu->roles->pluck('name')->join(', ') }}</td>
                <td>
                    <button class="btn btn-warning btnEditMenu" data-id="{{ $menu->id }}">Edit</button>
                    <button class="btn btn-danger btnDeleteMenu" data-id="{{ $menu->id }}">Hapus</button>
                </td>
            </tr>
        @endforeach
    </table>

    @include('menus.modal')
@endsection
@push('scripts')
    <script>
        $('#btnAddMenu').click(() => {
            $('#menuForm')[0].reset();
            $('#menu_id').val('');
            $('#menuModal').modal('show');
        });

        $('.btnEditMenu').click(function() {
            $.get('/menus/' + $(this).data('id'), res => {
                $('#menu_id').val(res.id);
                $('#name').val(res.name);
                $('#route').val(res.route);
                $('#icon').val(res.icon);
                $('#parent_id').val(res.parent_id);
                $('#is_active').val(res.is_active);
                $('input[name="roles[]"]').prop('checked', false);
                res.roles.forEach(r => $('input[value="' + r.id + '"]').prop('checked', true));
                $('#menuModal').modal('show');
            });
        });

        $('#btnSaveMenu').click(() => {
            let id = $('#menu_id').val();
            $.ajax({
                url: id ? '/menus/' + id : '/menus',
                type: id ? 'PUT' : 'POST',
                data: $('#menuForm').serialize(),
                success: r => {
                    toastr.success(r.message);
                    location.reload();
                }
            });
        });

        $('.btnDeleteMenu').click(function() {
            if (!confirm('Hapus menu?')) return;
            $.ajax({
                url: '/menus/' + $(this).data('id'),
                type: 'DELETE',
                success: r => {
                    toastr.success(r.message);
                    location.reload();
                }
            });
        });
    </script>
@endpush
