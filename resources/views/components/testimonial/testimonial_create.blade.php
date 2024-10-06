<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_testimonial" tabindex="-1" aria-labelledby="create_testimonial" aria-hidden="true">
    <div class="modal-dialog">
      <form id="add_testimonial">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_testimonial">Create Testimonial</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
              <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="country">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="desp" id="desp" class="form-control"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image" >
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_testimonial">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>