@extends('layouts.app')
@section('title', 'Sections - ' . $template->name)

@section('content')

    <h5>Template: {{ $template->name }}</h5>

    <form id="addSectionForm" class="mb-3">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input name="section_key" class="form-control" placeholder="section_key (invoice_items)">
            </div>
            <div class="col-md-4">
                <input name="label" class="form-control" placeholder="Label (Invoice Items)">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">
                    Add Section
                </button>
            </div>
        </div>
    </form>

    <ul id="sectionList" class="list-group">
        @foreach ($sections as $s)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $s->id }}">
                ☰ {{ $s->label }}

                <div>
                    <label class="mr-2">
                        <input type="checkbox" class="toggle" {{ $s->is_active ? 'checked' : '' }}>
                        Active
                    </label>
                </div>
            </li>
        @endforeach
    </ul>

    <button id="saveLayout" class="btn btn-success mt-3">
        Save Layout
    </button>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        new Sortable(sectionList);

        $('#addSectionForm').submit(function(e) {
            e.preventDefault();
            $.post('', $(this).serialize(), res => {
                toastr.success(res.message);
                location.reload();
            });
        });

        $('#saveLayout').click(function() {
            let data = [];
            $('#sectionList li').each(function(i) {
                data.push({
                    id: $(this).data('id'),
                    order: i + 1,
                    is_active: $(this).find('.toggle').is(':checked') ? 1 : 0
                });
            });

            $.post('/invoice-template-sections/reorder', {
                    sections: data
                },
                res => toastr.success(res.message)
            );
        });
    </script>
@endpush
