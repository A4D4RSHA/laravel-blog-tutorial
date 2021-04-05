@extends('adminlte::page')

@section('title', 'Category Details')

@section('content')

<x-alert />

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold">Category Details</h3>
        <div class="card-tools">
            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">
                Go Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Id</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Parent Category</td>
                <td>
                    @if($category->category_id)
                    <a href="{{ route('categories.show', $category->category_id) }}">
                        {{ $category->category->name }}
                    </a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Last Update</td>
                <td>{{ $category->updated_at }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $category->created_at }}</td>
            </tr>
        </table>


    </div>
</div>
@endsection