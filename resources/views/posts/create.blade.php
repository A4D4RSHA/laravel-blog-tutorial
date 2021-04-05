@extends('adminlte::page')

@section('title', 'Add New Post')

@section('content')

<x-alert />
<x-editor field="#body" />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Add New Post</h3>
        <div class="card-tools">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <x-input
                field="title"
                type="text"
                text="Title"
            />

            <x-input
                field="body"
                type="textarea"
                text="Body"
            />

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection