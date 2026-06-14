@extends('layout.app')
@section('content')
    <form class="container" action="{{ route('categories.update', $category->id) }} " method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name"
                aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <input type="text" name="desc" value="{{ $category->desc }}" class="form-control" id="desc" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="active" name="is_active" value="1"
                {{ $category->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
