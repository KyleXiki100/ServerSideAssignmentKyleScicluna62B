<div class="modal fade" id="createCollegeModal" tabindex="-1" role="dialog" aria-labelledby="createCollegeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('colleges.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCollegeModalLabel">Add New College</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="form-group">
            <label for="name">College Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" required>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add College</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
