<!-- Modal -->
<div class="modal fade" id="createFacultyModal" tabindex="-1" aria-labelledby="createFacultyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFacultyModalLabel"><i class="bx bx-plus"></i> New Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/faculty/create') ?>
      <div class="modal-body">
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