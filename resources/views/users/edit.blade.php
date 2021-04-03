@extends('adminlte::page')

@section('title', 'Update User')

@section('content')
<x-alert />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Update User</h3>
        <div class="card-tools">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <x-input
                field="name"
                type="text"
                text="Full Name"
                :current="$user->name"
            />

            <x-input
                field="email"
                type="email"
                text="Email"
                :current="$user->email"
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
                    <option
                        value="{{ $role }}"
                        @if($role == $user->role) selected @endif
                    >{{ $role }}</option>
                    @endforeach
                </select>
            </div>


            <button class="btn btn-primary">Save</button>
        </form>


    </div>
</div>
@endsection