@extends('adminlte::page')

@section('title', 'All Categories')

@section('content')

<x-alert />
<x-delete />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">All Categories</h3>
        <div class="card-tools">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                Add New
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->category_id)
                        <a href="{{ route('categories.show', $category->category_id) }}">
                            {{ $category->category->name }}
                        </a>
                        @endif
                    </td>
                    <td>
                        <a
                            href="{{ route('categories.show', $category->id) }}"
                            class="btn btn-secondary btn-xs"
                        >
                            <i class="fas fa-eye fa-fw mr-1"></i>
                            Details
                        </a>

                        <a
                            href="{{ route('categories.edit', $category->id) }}"
                            class="btn btn-primary btn-xs"
                        >
                            <i class="fas fa-edit fa-fw mr-1"></i>
                            Edit
                        </a>

                        <!-- Delete -->
                        <button onclick="confirmDelete({{ $category->id }})" type="button" class="btn btn-danger btn-xs">
                            <i class="fas fa-trash fa-fw mr-1"></i>
                            Delete
                        </button>

                        <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="post">
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
