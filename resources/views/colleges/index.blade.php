@extends('layouts.app')

@section('title', 'Colleges')

@section('content')
    <h1>Colleges</h1>


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


    
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createCollegeModal">
        Add New College
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colleges as $college)
                <tr>
                    <td>{{ $college->id }}</td>
                    <td>{{ $college->name }}</td>
                    <td>{{ $college->address }}</td>
                    <td>
                       
                        <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-info btn-sm">View</a>
                        
                       
                        <button 
                            type="button" 
                            class="btn btn-warning btn-sm" 
                            data-toggle="modal" 
                            data-target="#editCollegeModal-{{ $college->id }}"
                        >
                            Edit
                        </button>

                       
                        <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this college?')"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

                
                @include('colleges.partials.edit-modal', ['college' => $college])
            @endforeach
        </tbody>
    </table>

 
    @include('colleges.partials.create-modal')
@endsection
