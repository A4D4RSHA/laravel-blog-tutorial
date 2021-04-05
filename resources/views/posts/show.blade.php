@extends('adminlte::page')

@section('title', 'Post Details')

@section('content')

<x-alert />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Post Details</h3>
        <div class="card-tools">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Id</td>
                <td>{{ $post->id }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <td>Body</td>
                <td>{!! $post->body !!}</td>
            </tr>
            <tr>
                <td>Last Update</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $post->created_at }}</td>
            </tr>
        </table>


    </div>
</div>
@endsection