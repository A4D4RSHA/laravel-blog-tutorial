@extends('adminlte::page')

@section('title', 'Update Category')

@section('plugins.Select2', true)

@section('js')
<script>
    $(document).ready(function() {
        $('#category_id').select2();
    });
</script>
@endsection
@section('content')

<x-alert />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Update Category</h3>
        <div class="card-tools">
            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-input
                field="name"
                type="text"
                text="Category Name"
                :current="$category->name"
            />

            <div class="form-group">
                <label for="category_id">Parent Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Choose a category</option>
                    @foreach($categories as $cat)
                    <option
                        value="{{ $cat->id }}"
                        @if($cat->id == $category->category_id) selected @endif
                    >{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection