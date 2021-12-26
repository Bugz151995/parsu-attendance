<!-- Modal -->
<div class="modal fade" id="editProgramModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editProgramModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProgramModalLabel"><i class="bx bx-edit"></i> Edit Program</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/programs/update') ?>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>