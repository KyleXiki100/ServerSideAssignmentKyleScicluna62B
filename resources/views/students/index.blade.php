@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

    <!-- Filter and Sorting Form -->
    <form method="GET" action="{{ route('students.index') }}" class="form-inline mb-3">
        <div class="form-group mr-2">
            <label for="college" class="mr-2">Filter by College:</label>
            <select name="college" id="college" class="form-control">
                <option value="">All Colleges</option>
                @foreach ($colleges as $college)
                    <option value="{{ $college->id }}" {{ request('college') == $college->id ? 'selected' : '' }}>
                        {{ $college->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mr-2">
            <label for="sort" class="mr-2">Sort by Name:</label>
            <select name="sort" id="sort" class="form-control">
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Apply</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->college->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $students->links() }}
@endsection
