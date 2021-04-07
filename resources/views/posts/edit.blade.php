@extends('adminlte::page')

@section('title', 'Update Post')
@section('plugins.Select2', true)

@push('js')
<script>
    $(document).ready(function() {
        $('#category_id').select2();
    });
</script>
@endpush

@section('content')

<x-alert />
<x-editor field="#body" />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Update Post</h3>
        <div class="card-tools">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-input
                field="title"
                type="text"
                text="Title"
                :current="$post->title"
            />

            <x-input
                field="body"
                type="textarea"
                text="Body"
                :current="$post->body"
            />

            <x-input
                type="file"
                field="image"
                text="Post Image"
            />

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="categories[]" multiple id="category_id">
                    <option value="">Choose One</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if(in_array($category->id, $post_cat)) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('categories')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection