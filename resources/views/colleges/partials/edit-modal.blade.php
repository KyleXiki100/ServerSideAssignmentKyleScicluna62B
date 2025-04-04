<div class="modal fade" id="editCollegeModal-{{ $college->id }}" tabindex="-1" role="dialog" aria-labelledby="editCollegeModalLabel-{{ $college->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCollegeModalLabel-{{ $college->id }}">
            Edit College #{{ $college->id }}
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="form-group">
            <label for="name-{{ $college->id }}">College Name</label>
            <input 
              type="text" 
              name="name" 
              id="name-{{ $college->id }}" 
              class="form-control @error('name') is-invalid @enderror" 
              value="{{ old('name', $college->name) }}" 
              required
            >
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="address-{{ $college->id }}">Address</label>
            <textarea 
              name="address" 
              id="address-{{ $college->id }}" 
              class="form-control @error('address') is-invalid @enderror" 
              required
            >{{ old('address', $college->address) }}</textarea>
            @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update College</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
