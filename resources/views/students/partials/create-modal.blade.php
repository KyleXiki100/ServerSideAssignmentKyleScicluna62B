<div class="modal fade" id="createStudentModal" tabindex="-1" role="dialog" aria-labelledby="createStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('students.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createStudentModalLabel">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          @include('students.partials.form-fields', ['student' => new \App\Models\Student(), 'colleges' => $colleges])
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Student</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
