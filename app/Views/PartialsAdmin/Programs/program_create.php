<div class="card shadow rounded rounded-3 my-5">
  <div class="card-header">
    <span class="h5">Program Form</span>
  </div>
  <?= form_open('a/programs/create') ?>
    <div class="card-body">
      <div class="mb-3">
        <div class="form-floating">
          <input type="text" id="program" name="program" class="form-control" placeholder="Program" required>
          <label for="program">Program <span class="text-danger">*</span></label>
        </div>
      </div>
      <div class="mb-3">
        <div class="form-floating">
          <textarea id="description" style="height: 100px" name="description" class="form-control" placeholder="Program" required></textarea>
          <label for="description">Description <span class="text-danger">*</span></label>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-center">
      <button type="submit" value="Save" class="btn btn-sm btn-primary"><i class="bx bx-save"></i> Save</button>
    </div>
  <?= form_close() ?>
</div>