<form action="{{ isset($student) && $student->id ? route('students.update', $student->id) : route('students.store') }}" method="POST">
  @csrf
  @if(isset($student) && $student->id)
    @method('PUT')
  @endif

  <div class="form-group">
    <label for="name">Student Name</label>
    <input 
      type="text" 
      name="name" 
      id="name" 
      class="form-control @error('name') is-invalid @enderror" 
      value="{{ old('name', $student->name ?? '') }}" 
      required pattern="[A-Za-z\s]+"
      title="Name should only contain letters and spaces."
    >
    @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input 
      type="email" 
      name="email" 
      id="email" 
      class="form-control @error('email') is-invalid @enderror" 
      value="{{ old('email', $student->email ?? '') }}" 
      required
    >
    @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="phone">Phone (8 digits)</label>
    <input 
      type="text" 
      name="phone" 
      id="phone" 
      class="form-control @error('phone') is-invalid @enderror" 
      value="{{ old('phone', $student->phone ?? '') }}" 
      required pattern="\d{8}"
      title="Phone number must be exactly 8 digits."
    >
    @error('phone')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="dob">Date of Birth (DD/MM/YYYY)</label>
    <input 
      type="text" 
      name="dob" 
      id="dob" 
      class="form-control @error('dob') is-invalid @enderror" 
      value="{{ old('dob', $student->dob ?? '') }}" 
      required pattern="\d{2}/\d{2}/\d{4}"
      title="Please enter date in DD/MM/YYYY format."
    >
    @error('dob')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="college_id">College</label>
    <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror" required>
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
    @error('college_id')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
</form>
