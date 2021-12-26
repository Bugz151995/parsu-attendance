<!-- Modal -->
<div class="modal fade" id="deleteProgramModal" tabindex="-1" aria-labelledby="deleteProgramModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProgramModalLabel"><i class="bx bx-trash"></i> Delete Program?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearData()"></button>
      </div>
      <?= form_open('a/programs/delete') ?>
      <input type="hidden" name="program_id" id="pid_del">
      <div class="modal-body">
        Are you sure that you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearData()">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> Confirm</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    var deleteProgramModal = document.getElementById('deleteProgramModal')
    let inputTag = document.getElementById('pid_del');

    deleteProgramModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
    })

    deleteProgramModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('program'));
      inputTag.setAttribute('value', id.program_id);
    })
  });
</script>