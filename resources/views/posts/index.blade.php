@extends('adminlte::page')

@section('title', 'All Posts')

@section('content')

<x-alert />
<x-delete />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">All Posts</h3>
        <div class="card-tools">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
                Add New
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Media</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>
                        @if($post->media_id)
                        <img src="/storage/{{ $post->media->path }}" height="30px" />
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                       {{ Str::limit(strip_tags($post->body), 30) }}
                    </td>
                    <td>
                        <a
                            href="{{ route('posts.show', $post->id) }}"
                            class="btn btn-secondary btn-xs"
                        >
                            <i class="fas fa-eye fa-fw mr-1"></i>
                            Details
                        </a>

                        <a
                            href="{{ route('posts.edit', $post->id) }}"
                            class="btn btn-primary btn-xs"
                        >
                            <i class="fas fa-edit fa-fw mr-1"></i>
                            Edit
                        </a>

                        <!-- Delete -->
                        <button onclick="confirmDelete({{ $post->id }})" type="button" class="btn btn-danger btn-xs">
                            <i class="fas fa-trash fa-fw mr-1"></i>
                            Delete
                        </button>

                        <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
