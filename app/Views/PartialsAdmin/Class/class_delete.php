<!-- Modal -->
<div class="modal fade" id="deleteClassModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteClassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteClassModalLabel"><i class="bx bx-trash"></i> Delete Class?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/class/delete') ?>
      <input type="hidden" name="class_id" id="cid_del">
      <div class="modal-body">
        Are you sure that you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> Confirm</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    var deleteClassModal = document.getElementById('deleteClassModal')
    let inputTag = document.getElementById('cid_del');

    deleteClassModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
    })

    deleteClassModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('class'));
      inputTag.setAttribute('value', id.class_id);
    })
  });
</script>