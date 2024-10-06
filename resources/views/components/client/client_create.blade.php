<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_client" tabindex="-1" aria-labelledby="create_client" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addClient">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_client">Create Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" id="logo" >
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_client">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>