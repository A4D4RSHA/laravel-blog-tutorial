@extends('adminlte::page')

@section('title', 'Update Post')

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
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
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

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection