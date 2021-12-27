<!-- Modal -->
<div class="modal fade" id="refreshStudentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="refreshStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="refreshStudentModalLabel"><i class="bx bx-trash"></i> Generate Enrollment Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/students/generate_enrolment_code') ?>
      <input type="hidden" name="student_id" id="sid_ref">
      <input type="hidden" name="enrollment_id" id="eid_ref">
      <div class="modal-body">
        Are you sure that you want to generate enrollment code? This will refresh the enrollment data.
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
    var refreshStudentModal = document.getElementById('refreshStudentModal')
    let studentInputTag = document.getElementById('sid_ref');
    let enrollmentInputTag = document.getElementById('eid_ref');

    refreshStudentModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
    })

    refreshStudentModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('student'));
      studentInputTag.setAttribute('value', id.student_id);
      enrollmentInputTag.setAttribute('value', id.enrollment_id);
    })
  });
</script>