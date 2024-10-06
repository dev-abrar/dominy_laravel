<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_service" tabindex="-1" aria-labelledby="update_service" aria-hidden="true">
    <div class="modal-dialog">
      <form id="updateService">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="update_service">Create Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Service Iocn</label>
                <div id="up_icon-container">
                    <!-- Icons will be dynamically loaded here -->
                  </div>
                <input type="text" class="form-control" id="up_icon">
                <input type="hidden" class="form-control" id="service_id">
              </div>
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="up_title">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" id="up_desp">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_service">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>