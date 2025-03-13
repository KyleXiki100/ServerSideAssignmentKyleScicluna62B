@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>Students</h1>

    @if(session('success'))
        <div class = "alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

@if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif





    <button 
        type="button" 
        class="btn btn-primary mb-3" 
        data-toggle="modal" 
        data-target="#createStudentModal"
    >
        Add New Student
    </button>

    
    <form method="GET" action="{{ route('students.index') }}" class="form-inline mb-3">
        <div class="form-group mr-2">
            <label for="college" class="mr-2">Filter by College:</label>
            <select name="college" id="college" class="form-control">
                <option value="">All Colleges</option>
                @foreach ($colleges as $college)
                    <option 
                        value="{{ $college->id }}" 
                        {{ request('college') == $college->id ? 'selected' : '' }}
                    >
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
                      
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">
                            View
                        </a>

                      
                        <form 
                            action="{{ route('students.destroy', $student->id) }}" 
                            method="POST" 
                            style="display:inline-block;"
                        >
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this student?')"
                            >
                                Delete
                            </button>
                        </form>

                        
                        <button 
                            type="button" 
                            class="btn btn-warning btn-sm" 
                            data-toggle="modal" 
                            data-target="#editStudentModal-{{ $student->id }}"
                        >
                            Edit
                        </button>
                    </td>
                </tr>

                
                @include('students.partials.edit-modal', [
                    'student' => $student,
                    'colleges' => $colleges
                ])
            @endforeach
        </tbody>
    </table>

   
    {{ $students->links() }}

    @include('students.partials.create-modal', ['colleges' => $colleges])
@endsection
