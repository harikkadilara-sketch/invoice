@extends('layouts.app')
@section('title', 'Invoice Template Builder')

@section('content')
    <ul id="sectionList" class="list-group">
        @foreach ($sections as $section)
            <li class="list-group-item" data-id="{{ $section->id }}">
                ☰ {{ strtoupper($section->section_key) }}
                <input type="checkbox" class="float-right toggle" {{ $section->is_active ? 'checked' : '' }}>
            </li>
        @endforeach
    </ul>

    <button class="btn btn-primary mt-3" id="saveOrder">Save</button>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        let sortable = new Sortable(sectionList, {
            animation: 150
        });

        $('#saveOrder').click(function() {
            let data = [];
            $('#sectionList li').each(function(index) {
                data.push({
                    id: $(this).data('id'),
                    order: index + 1,
                    is_active: $(this).find('.toggle').is(':checked') ? 1 : 0
                });
            });

            $.post('/invoice-template/sections/save', {
                sections: data
            }, function() {
                toastr.success('Template updated');
            });
        });
    </script>
@endpush
