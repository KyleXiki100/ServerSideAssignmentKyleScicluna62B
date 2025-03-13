@extends('layouts.app')

@section('title', 'View College')

@section('content')
    <h1>College Details</h1>
    <ul>
        <li><strong>ID:</strong> {{ $college->id }}</li>
        <li><strong>Name:</strong> {{ $college->name }}</li>
        <li><strong>Address:</strong> {{ $college->address }}</li>
        <li><strong>Created At:</strong> {{ $college->created_at }}</li>
        <li><strong>Updated At:</strong> {{ $college->updated_at }}</li>
    </ul>

    <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Back to Colleges</a>
@endsection
