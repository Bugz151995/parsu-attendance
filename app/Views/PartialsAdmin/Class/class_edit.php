<!-- Modal -->
<div class="modal fade" id="editClassModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editClassModalLabel"><i class="bx bx-edit"></i> Edit classs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/class/update') ?>
      <div class="modal-body">
        <input type="hidden" name="class_id" id="cid_edit">
        <div class="mb-3">
          <label class="form-label" for="program">Program <span class="text-danger">*</span></label>
          <select class="form-select" style="width:100%" id="programs-list-edit" name="program" placeholder="Program" required>
            <?php if ($programs) : ?>
              <?php foreach ($programs as $p) : ?>
                <option value="<?= $p['program_id'] ?>"><?= $p['program'] ?></option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <select class="form-select" id="level_edit" name="level">
              <option selected disabled>Select year level</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
            <label for="level_edit">Level <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="section_edit" name="section" class="form-control" placeholder="Section" required>
            <label for="section_edit">Section <span class="text-danger">*</span></label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('#programs-list-edit').select2({
      dropdownParent: $('#editClassModal'),
      theme: "classic"
    });
  });

  document.addEventListener("DOMContentLoaded", () => {
    var editClassModal = document.getElementById('editClassModal')
    let cidTag = document.getElementById('cid_edit');
    let programTag = document.getElementById('programs-list-edit');
    let levelTag = document.getElementById('level_edit');
    let sectionTag = document.getElementById('section_edit');

    editClassModal.addEventListener('hidden.bs.modal', function(event) {      
      cidTag.setAttribute('value', '');
      programTag.setAttribute('value', '');
      levelTag.setAttribute('value', '');
      sectionTag.setAttribute('value', '');
    });

    editClassModal.addEventListener('shown.bs.modal', function(event) {
      let class_data = JSON.parse(sessionStorage.getItem('class'));
      cidTag.setAttribute('value', class_data.class_id);
      $('#programs-list-edit').val('1');
      sectionTag.value = class_data.section;
      levelTag.setAttribute('value', class_data.level);
    });
  });
</script>