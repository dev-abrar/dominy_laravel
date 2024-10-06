<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_counter" tabindex="-1" aria-labelledby="create_counter" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addNumber">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_counter">Create Counter</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="title">
              </div>
              <div class="mb-3">
                <label class="form-label">Number</label>
                <input type="number" class="form-control" id="number">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_counter">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>