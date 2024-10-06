<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_gallery" tabindex="-1" aria-labelledby="create_gallery" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addGallery">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_gallery">Create Gallery</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Class Name</label>
                <input type="text" class="form-control" id="class">
              </div>
              <div class="mb-3">
                <label class="form-label">Preview</label>
                <input type="file" class="form-control" id="preview">
              </div>
              <div class="mb-3">
                <label class="form-label">Gallery</label>
                <input type="file" class="form-control" id="gallery" >
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_gallery">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>