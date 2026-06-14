@extends('layout.app')
@section('content')
<h1>Product Page</h1>
    {{-- <a href="{{ route('categories.create') }}">Create</a>
    <table class="table container">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Is Active</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
            <tr>
                <th>{{ $index + 1 }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->desc }}</td>
                <td>{{ $category->is_active }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    <a href="{{ route('categories.delete', $category->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}
@endsection
