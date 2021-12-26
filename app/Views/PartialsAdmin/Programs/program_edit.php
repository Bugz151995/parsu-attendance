<!-- Modal -->
<div class="modal fade" id="editProgramModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editProgramModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProgramModalLabel"><i class="bx bx-edit"></i> Edit Program</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick='clearData()' aria-label="Close"></button>
      </div>
      <?= form_open('a/programs/update') ?>
      <div class="modal-body">
        <input type="hidden" name="program_id" id="pid_edit">
        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="program_edit" name="program" value="" class="form-control" placeholder="Program" required>
            <label for="program_edit">Program <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <textarea id="description_edit" style="height: 100px" name="description" class="form-control" placeholder="Program" required></textarea>
            <label for="description_edit">Description <span class="text-danger">*</span></label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick='clearData()' data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    var editProgramModal = document.getElementById('editProgramModal')
    let pidTag = document.getElementById('pid_edit');
    let programTag = document.getElementById('program_edit');
    let descriptionTag = document.getElementById('description_edit');

    editProgramModal.addEventListener('hidden.bs.modal', function(event) {      
      pidTag.setAttribute('value', '');
      programTag.setAttribute('value', '');
      descriptionTag.setAttribute('value', '');
    });

    editProgramModal.addEventListener('shown.bs.modal', function(event) {
      let program = JSON.parse(sessionStorage.getItem('program'));
      pidTag.setAttribute('value', program.program_id);
      programTag.setAttribute('value', program.program);
      descriptionTag.innerHTML = program.description;
    });
  });
</script>