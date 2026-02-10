@extends('layouts.app')
@section('title', 'Template Fields')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Template</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($templates as $tpl)
                <tr>
                    <td>{{ $tpl->name }}</td>
                    <td>
                        <a href="{{ route('invoice-template-fields.index', $tpl) }}" class="btn btn-primary">
                            Manage Fields
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
