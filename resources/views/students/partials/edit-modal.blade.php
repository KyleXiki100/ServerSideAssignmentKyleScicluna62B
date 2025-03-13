
<div 
    class="modal fade" 
    id="editStudentModal-{{ $student->id }}" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="editStudentModalLabel-{{ $student->id }}" 
    aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editStudentModalLabel-{{ $student->id }}">
            Edit Student #{{ $student->id }}
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
         
          @include('students.partials.form-fields', [
              'student' => $student
          ])
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Student</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
