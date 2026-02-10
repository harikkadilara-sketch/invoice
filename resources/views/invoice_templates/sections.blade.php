@extends('layouts.app')
@section('title', 'Template Sections - ' . $template->name)
@section('content')
    <form id="addSection">
        <input name="section_key" placeholder="section_key (invoice_items)" class="form-control mb-1">
        <input name="label" placeholder="Label (Invoice Items)" class="form-control mb-1">
        <button class="btn btn-primary">Add Section</button>
    </form>

    <hr>

    <ul id="sectionList" class="list-group">
        @foreach ($sections as $s)
            <li class="list-group-item" data-id="{{ $s->id }}">
                ☰ {{ $s->label }}
                <input type="checkbox" class="float-right toggle" {{ $s->is_active ? 'checked' : '' }}>
            </li>
        @endforeach
    </ul>

    <button id="saveLayout" class="btn btn-success mt-3">Save Layout</button>
@endsection
