@extends('adminlte::page')

@section('title', 'All Users')

@section('content')

<x-alert />
<x-delete />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">All Users</h3>
        <div class="card-tools">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a
                            href="{{ route('users.show', $user->id) }}"
                            class="btn btn-secondary btn-xs"
                        >
                            <i class="fas fa-eye fa-fw mr-1"></i>
                            Details
                        </a>

                        <a
                            href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-primary btn-xs"
                        >
                            <i class="fas fa-edit fa-fw mr-1"></i>
                            Edit
                        </a>

                        <!-- Delete -->
                        <button onclick="confirmDelete({{ $user->id }})" type="button" class="btn btn-danger btn-xs">
                            <i class="fas fa-trash fa-fw mr-1"></i>
                            Delete
                        </button>

                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post">
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
