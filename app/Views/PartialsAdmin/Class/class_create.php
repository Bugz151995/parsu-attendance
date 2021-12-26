<div class="card shadow rounded rounded-3 my-5">
  <div class="card-header">
    <span class="h5">Class Form</span>
  </div>
  <?= form_open('a/class/create') ?>
  <div class="card-body">
    <div class="mb-3">
      <label class="form-label" for="program">Program <span class="text-danger">*</span></label>
      <select class="form-select" style="width:100%" id="programs-list" name="program" placeholder="Course" required>
        <?php if ($programs) : ?>
          <?php foreach ($programs as $p) : ?>
            <option value="<?= $p['program_id'] ?>"><?= $p['program'] ?></option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
    </div>
    <div class="mb-3">
      <div class="form-floating">
        <select class="form-select" id="level" name="level">
          <option selected disabled>Select year level</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <label for="level">Level <span class="text-danger">*</span></label>
      </div>
    </div>
    <div class="mb-3">
      <div class="form-floating">
        <input type="text" id="section" name="section" class="form-control" placeholder="Section" required>
        <label for="section">Section <span class="text-danger">*</span></label>
      </div>
    </div>
  </div>
  <div class="card-footer d-flex justify-content-center">
    <button type="submit" value="Save" class="btn btn-sm btn-primary"><i class="bx bx-save"></i> Save</button>
  </div>
  <?= form_close() ?>
</div>

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('#programs-list').select2({
      theme: "classic"
    });
  });
</script>