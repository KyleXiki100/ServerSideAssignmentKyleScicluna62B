
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf
<div class="form-group">
    <label for="name">College Name</label>
    <input type="text" name="name" id="name" class="form-control" 
           value="{{ old('name', $college->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control" 
           value="{{ old('address', $college->address ?? '') }}" required>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
