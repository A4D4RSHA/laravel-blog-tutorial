@extends('adminlte::page')

@section('title', 'User Details')

@section('content')

<x-alert />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">User Details</h3>
        <div class="card-tools">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Id</td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Role</td>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <td>Last Update</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        </table>


    </div>
</div>
@endsection