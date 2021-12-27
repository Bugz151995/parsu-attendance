<!-- Modal -->
<div class="modal fade" id="createStudentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStudentModalLabel"><i class="bx bx-plus"></i> New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/students/create') ?>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label" for="class">Class <span class="text-danger">*</span></label>
          <select class="form-select" style="width:100%" id="class-list" name="class" placeholder="Class" required>
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
            <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
            <label for="fname">First Name <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
            <label for="lname">Last Name <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="email" id="uname" name="uname" class="form-control" placeholder="Username" required>
            <label for="uname">Username <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Username" required>
            <label for="pass">Password <span class="text-danger">*</span></label>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('#class-list').select2({
      dropdownParent: $('#createStudentModal'),
      theme: "classic"
    });
  });
</script>