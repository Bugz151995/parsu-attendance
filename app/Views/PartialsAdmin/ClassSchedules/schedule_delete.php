<!-- Modal -->
<div class="modal fade" id="deleteScheduleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteScheduleModalLabel"><i class="bx bx-trash"></i> Delete Class?</h5>
        <button type="button" onclick="clearData()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/schedules/delete') ?>
      <input type="hidden" name="class_schedule_id" id="csid_del">
      <div class="modal-body">
        Are you sure that you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" onclick="clearData()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> Confirm</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    var deleteScheduleModal = document.getElementById('deleteScheduleModal')
    let inputTag = document.getElementById('csid_del');

    deleteScheduleModal.addEventListener('hidden.bs.modal', function(event) {
      inputTag.setAttribute('value', "");
    })

    deleteScheduleModal.addEventListener('shown.bs.modal', function(event) {
      let id = JSON.parse(sessionStorage.getItem('schedule'));
      inputTag.setAttribute('value', id.class_schedule_id);
    })
  });
</script>