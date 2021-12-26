<!-- Modal -->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCourseModalLabel"><i class="bx bx-trash"></i> Delete Courses?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/courses/delete') ?>
      <input type="hidden" name="course_id" id="cid_del">
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
    var deleteCourseModal = document.getElementById('deleteCourseModal')
    let inputTag = document.getElementById('cid_del');

    deleteCourseModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
    })

    deleteCourseModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('course'));
      inputTag.setAttribute('value', id.course_id);
    })
  });
</script>