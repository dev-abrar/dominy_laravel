<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_team" tabindex="-1" aria-labelledby="create_team" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addTeam">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_team">Create Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="mb-3">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" id="role">
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" id="img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                <img id="blah" src="{{asset('admin/images/35.jpg')}}" width="100" height="100" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_team">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>