<!-- Modal -->
<div class="modal fade" id="deleteFacultyModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteFacultyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteFacultyModalLabel"><i class="bx bx-trash"></i> Delete Student?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/faculty/delete') ?>
      <input type="hidden" name="faculty_id" id="fid_del">
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
    var deleteFacultyModal = document.getElementById('deleteFacultyModal')
    let inputTag = document.getElementById('fid_del');

    deleteFacultyModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
    })

    deleteFacultyModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('faculty'));
      inputTag.setAttribute('value', id.faculty_id);
    })
  });
</script>