@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <h1>Add New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @include('students.form')
    </form>
@endsection
