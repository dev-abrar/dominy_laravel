<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_counter" tabindex="-1" aria-labelledby="update_counter" aria-hidden="true">
    <div class="modal-dialog">
      <form id="updateCounter">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="update_counter">Update Counter</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="hidden" class="form-control" id="counter_id">
                <input type="text" class="form-control" id="up_title">
              </div>
              <div class="mb-3">
                <label class="form-label">Number</label>
                <input type="text" class="form-control" id="up_number">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_counter">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>