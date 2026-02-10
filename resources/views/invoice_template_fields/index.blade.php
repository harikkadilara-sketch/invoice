@extends('layouts.app')
@section('title', 'Fields - ' . $template->name)

@section('content')

    <h5>Template: {{ $template->name }}</h5>

    <form id="addFieldForm" class="mb-3">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input name="field_key" class="form-control" placeholder="field_key">
            </div>
            <div class="col-md-3">
                <input name="label" class="form-control" placeholder="Label">
            </div>
            <div class="col-md-2">
                <select name="type" class="form-control">
                    <option value="text">Text</option>
                    <option value="date">Date</option>
                    <option value="textarea">Textarea</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>
                    <input type="checkbox" name="is_required"> Required
                </label>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>

    <ul id="fieldList" class="list-group">
        @foreach ($fields as $field)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $field->id }}">
                ☰ {{ $field->label }} ({{ $field->type }})
                <button class="btn btn-danger btn-sm delete" data-id="{{ $field->id }}">x</button>
            </li>
        @endforeach
    </ul>

    <button id="saveOrder" class="btn btn-success mt-3">
        Save Order
    </button>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        new Sortable(fieldList);

        $('#addFieldForm').submit(function(e) {
            e.preventDefault();
            $.post('', $(this).serialize(), res => {
                toastr.success(res.message);
                location.reload();
            });
        });

        $('#saveOrder').click(function() {
            let data = [];
            $('#fieldList li').each(function(i) {
                data.push({
                    id: $(this).data('id'),
                    order: i + 1
                });
            });

            $.post('/invoice-template-fields/reorder', {
                fields: data
            }, res => {
                toastr.success(res.message);
            });
        });

        $('.delete').click(function() {
            if (!confirm('Delete field?')) return;

            $.ajax({
                url: '/invoice-template-fields/' + $(this).data('id'),
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: res => {
                    toastr.success(res.message);
                    location.reload();
                }
            });
        });
    </script>
@endpush
