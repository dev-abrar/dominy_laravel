<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_skill" tabindex="-1" aria-labelledby="create_skill" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addSkill">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_skill">Add Skill</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <input type="hidden" value="{{$team_info->id}}" class="form-control" id="team_id">
              </div>
              <div class="mb-3">
                <label class="form-label">Skill</label>
                <input type="text" class="form-control" id="skill">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_skill">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>