@extends('adminlte::page')

@section('title', 'Add New User')

@section('content')

<x-alert />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Add New User</h3>
        <div class="card-tools">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <x-input
                field="name"
                type="text"
                text="Full Name"
            />

            <x-input
                field="email"
                type="email"
                text="Email"
            />

            <x-input
                field="password"
                type="password"
                text="Password"
            />

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>


            <button class="btn btn-primary">Save</button>
        </form>


    </div>
</div>
@endsection