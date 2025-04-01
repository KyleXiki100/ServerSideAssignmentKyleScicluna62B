<div 
    class="modal fade" 
    id="editCollegeModal-{{ $college->id }}" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="editCollegeModalLabel-{{ $college->id }}" 
    aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
      
       
        <div class="modal-header">
          <h5 class="modal-title" id="editCollegeModalLabel-{{ $college->id }}">
            Edit College #{{ $college->id }}
          </h5>
          <button 
              type="button" 
              class="close" 
              data-dismiss="modal" 
              aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        
        <div class="modal-body">
          @include('colleges.partials.form-fields', ['college' => $college])
        </div>
        
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update College</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </form>
  </div>
</div>
