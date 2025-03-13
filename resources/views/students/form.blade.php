@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf
<div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" name="name" id="name" class="form-control" 
           value="{{ old('name', $student->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="form-control" 
           value="{{ old('email', $student->email ?? '') }}" required>
</div>
<div class="form-group">
    <label for="phone">phone</label>
    <input type="text" name="phone" id="phone" class="form-control" 
           value="{{ old('phone', $student->phone ?? '') }}" required>
</div>
<div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="text" name="dob" id="dob" class="form-control" 
           value="{{ old('dob', $student->dob ?? '') }}" required>
</div>

<div class="form-group">
            <label for="college_id">College</label>
            <select name="college_id" id="college_id" class="form-control">
                <option value="">-- Select a College --</option>
                @foreach ($colleges as $college)
                    <option value="{{ $college->id }}">{{ $college->name }}</option>
                @endforeach
            </select>
        </div>


<button type="submit" class="btn btn-primary">Submit</button>
