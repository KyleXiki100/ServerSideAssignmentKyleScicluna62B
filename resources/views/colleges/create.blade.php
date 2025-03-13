@extends('layouts.app')

@section('title', 'Add College')

@section('content')

    <h1>Add New College</h1>
    <form action="{{ route('colleges.store') }}" method="POST">
        @include('colleges.form')
    </form>
@endsection
