<!-- Modal -->
<div class="modal fade" id="editFacultyModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editFacultyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFacultyModalLabel"><i class="bx bx-edit"></i> Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/faculty/update') ?>
      <div class="modal-body">
        <input type="hidden" name="faculty_id" id="fid_edit">
        <input type="hidden" name="user_id" id="uid_edit">
        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="fname_edit" name="fname" class="form-control" placeholder="First Name" required>
            <label for="fname_edit">First Name <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="lname_edit" name="lname" class="form-control" placeholder="Last Name" required>
            <label for="lname_edit">Last Name <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="email" id="uname_edit" name="uname" class="form-control" placeholder="Username" required>
            <label for="uname_edit">Username <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="password" id="pass_edit" name="pass" class="form-control" placeholder="Username">
            <label for="pass_edit">Password <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input me-2" type="checkbox" onclick="toggleVisibility('pass')" id="showPasswordToggle">
            <label class="form-check-label" for="showPasswordToggle">
              Show Password
            </label>
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
    var editFacultyModal = document.getElementById('editFacultyModal')
    let sidTag = document.getElementById('fid_edit');
    let uidTag = document.getElementById('uid_edit');

    editFacultyModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
      $('#fname_edit').val('');
      $('#lname_edit').val('');
      $('#uname_edit').val('');
    })

    editFacultyModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('faculty'));
      $('#fname_edit').val(id.fname);
      $('#lname_edit').val(id.lname);
      $('#uname_edit').val(id.username);
      sidTag.setAttribute('value', id.faculty_id);
      uidTag.setAttribute('value', id.user_id);
    })
  });
</script>