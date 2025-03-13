{{-- This partial only contains the input fields, no <form> tags --}}
<div class="form-group">
    <label for="name">Student Name</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control" 
        value="{{ old('name', $student->name ?? '') }}" 
        required
    >
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input 
        type="text" 
        name="email" 
        id="email" 
        class="form-control" 
        value="{{ old('email', $student->email ?? '') }}" 
        required
    >
</div>

<div class="form-group">
    <label for="phone">Phone (8 digits)</label>
    <input 
        type="text" 
        name="phone" 
        id="phone" 
        class="form-control" 
        value="{{ old('phone', $student->phone ?? '') }}" 
        required
    >
</div>

<div class="form-group">
    <label for="dob">Date of Birth (DD/MM/YYYY)</label>
    <input 
        type="text" 
        name="dob" 
        id="dob" 
        class="form-control" 
        value="{{ old('dob', $student->dob ?? '') }}" 
        required
    >
</div>

<div class="form-group">
    <label for="college_id">College</label>
    <select name="college_id" id="college_id" class="form-control">
        <option value="">-- Select a College --</option>
        @foreach($colleges as $college)
            <option 
                value="{{ $college->id }}"
                {{ old('college_id', $student->college_id ?? '') == $college->id ? 'selected' : '' }}
            >
                {{ $college->name }}
            </option>
        @endforeach
    </select>
</div>
