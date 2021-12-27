<!-- Modal -->
<div class="modal fade" id="editStudentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStudentModalLabel"><i class="bx bx-edit"></i> Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/students/update') ?>
      <div class="modal-body">
        <input type="hidden" name="student_id" id="sid_edit">
        <input type="hidden" name="user_id" id="uid_edit">
        <div class="mb-3">
          <label class="form-label" for="class-list-edit">Class <span class="text-danger">*</span></label>
          <select class="form-select" style="width:100%" id="class-list-edit" name="class" placeholder="Class" required>
            <?php if ($class) : ?>
              <?php foreach ($class as $c) : ?>
                <option value="<?= $c['class_id'] ?>">
                  <?= $c['program'] . " " . $c['level'] . "-" . $c['section'] ?>
                </option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
        </div>
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
  $(document).ready(function() {
    $('#class-list-edit').select2({
      dropdownParent: $('#editStudentModal'),
      theme: "classic"
    });
  });

  document.addEventListener("DOMContentLoaded", () => {
    var editStudentModal = document.getElementById('editStudentModal')
    let sidTag = document.getElementById('sid_edit');
    let uidTag = document.getElementById('uid_edit');

    editStudentModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
      $('#fname_edit').val('');
      $('#lname_edit').val('');
      $('#uname_edit').val('');      
      $('#class-list-edit').val('');
      $('#class-list-edit').select2({
        dropdownParent: $('#editStudentModal'),
        theme: "classic"
      }).trigger('change');
    })

    editStudentModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('student'));
      $('#fname_edit').val(id.fname);
      $('#lname_edit').val(id.lname);
      $('#uname_edit').val(id.username);
      $('#class-list-edit').val(id.class_id);
      $('#class-list-edit').select2({
        dropdownParent: $('#editStudentModal'),
        theme: "classic"
      }).trigger('change');
      sidTag.setAttribute('value', id.student_id);
      uidTag.setAttribute('value', id.user_id);
    })
  });
</script>