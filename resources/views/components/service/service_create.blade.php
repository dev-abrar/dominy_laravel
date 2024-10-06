<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_service" tabindex="-1" aria-labelledby="create_service" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addService">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_service">Create Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Service Iocn</label>
                <div id="icon-container">
                    <!-- Icons will be dynamically loaded here -->
                  </div>
                <input type="text" class="form-control" id="icon">
              </div>
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="title">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" id="desp">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_service">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>