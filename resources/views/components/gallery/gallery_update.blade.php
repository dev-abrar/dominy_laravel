<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_team" tabindex="-1" aria-labelledby="update_team" aria-hidden="true">
    <div class="modal-dialog">
      <form id="updateTeam">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="update_team">Update Team</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="hidden" class="form-control" id="team_id">
                <input type="text" class="form-control" id="up_name">
              </div>
              <div class="mb-3">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" id="up_role">
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" id="up_img" onchange="document.getElementById('imgblah').src = window.URL.createObjectURL(this.files[0])">
                <img class="mt-3" id="imgblah" src="" width="100" height="100" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_team">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>