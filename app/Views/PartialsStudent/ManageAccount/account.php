<div class="modal fade" id="studentAccountUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="studentAccountUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentAccountUpdateModalLabel"><i class="bx bx-cog"></i> Manage Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('account/update') ?>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>