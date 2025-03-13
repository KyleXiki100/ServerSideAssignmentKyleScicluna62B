@extends('layouts.app')

@section('title', 'Edit Student')



@section('content')

    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
    @method('PUT')
    @include('students.partials.form', [
    'student' => $student,
    'colleges' => $colleges
])
</form>
