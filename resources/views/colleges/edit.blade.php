@extends('layouts.app')

@section('title', 'Edit College')

@section('content')
    <h1>Edit College</h1>
    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('colleges.form')
    </form>
@endsection
