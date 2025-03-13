@extends('layouts.app')

@section('title', 'View Students')

@section('content')
    <h1>Student Details</h1>
    <ul>
        <li><strong>ID:</strong> {{ $student->id }}</li>
        <li><strong>Name:</strong> {{ $student->name }}</li>
        <li><strong>email:</strong> {{ $student->email }}</li>
        <li><strong>phone:</strong> {{ $student->phone }}</li>
        <li><strong>DOB:</strong> {{ $student->dob }}</li>
        <li><strong>Collage Name:</strong> {{ $college->name }}</li>
        <li><strong>Created At:</strong> {{ $student->created_at }}</li>
        <li><strong>Updated At:</strong> {{ $student->updated_at }}</li>
    </ul>

    <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Back to students</a>
@endsection
