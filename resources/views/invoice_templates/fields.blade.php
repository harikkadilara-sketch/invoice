@extends('layouts.app')
@section('title', 'Template Fields - ' . $template->name)

@section('content')

    <form id="addField">
        <input name="field_key" placeholder="field_key" class="form-control mb-1">
        <input name="label" placeholder="Label" class="form-control mb-1">

        <select name="type" class="form-control mb-1">
            <option value="text">Text</option>
            <option value="date">Date</option>
            <option value="textarea">Textarea</option>
        </select>

        <label>
            <input type="checkbox" name="is_required"> Required
        </label>

        <button class="btn btn-primary mt-2">Add Field</button>
    </form>

    <hr>

    <ul id="fieldList" class="list-group">
        @foreach ($fields as $f)
            <li class="list-group-item" data-id="{{ $f->id }}">
                ☰ {{ $f->label }} ({{ $f->type }})
                <button class="btn btn-sm btn-danger float-right delete" data-id="{{ $f->id }}">x</button>
            </li>
        @endforeach
    </ul>

    <button id="saveOrder" class="btn btn-success mt-3">Save Order</button>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        new Sortable(fieldList);

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

        $('#addField').submit(function(e) {
            e.preventDefault();
            $.post('', $(this).serialize(), res => {
                toastr.success(res.message);
                location.reload();
            });
        });

        $('.delete').click(function() {
            $.ajax({
                url: '/invoice-template-fields/' + $(this).data('id'),
                type: 'DELETE',
                success: r => {
                    toastr.success(r.message);
                    location.reload();
                }
            });
        });
    </script>
@endpush
