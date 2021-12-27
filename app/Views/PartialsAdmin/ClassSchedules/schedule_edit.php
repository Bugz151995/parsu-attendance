<!-- Modal -->
<div class="modal fade" id="editScheduleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editScheduleModalLabel"><i class="bx bx-edit"></i> Edit Courses</h5>
        <button type="button" onclick="clearData()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('a/schedules/update') ?>
      <div class="modal-body">
        <input type="hidden" name="class_schedule_id" id="csid_edit">
        <div class="mb-3">
          <label class="form-label" for="class">Class <span class="text-danger">*</span></label>
          <select class="form-select" style="width:100%" id="class-list-edit" name="class" placeholder="Class" required>
            <option value="" selected disabled>Select A Class</option>
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
          <label class="form-label" for="course">Course <span class="text-danger">*</span></label>
          <select class="form-select" style="width:100%" id="course-list-edit" name="course" placeholder="Course" required>
            <option value="" selected disabled>Select A Course</option>
            <?php if ($course) : ?>
              <?php foreach ($course as $c) : ?>
                <option value="<?= $c['course_id'] ?>">
                  <?= $c['course'] ?>
                </option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="faculty">Faculty <span class="text-danger">*</span></label>
          <select class="form-select" style="width:100%" id="faculty-list-edit" name="faculty" placeholder="Faculty" required>
            <option value="" selected disabled>Select A Course</option>
            <?php if ($faculty) : ?>
              <?php foreach ($faculty as $f) : ?>
                <option value="<?= $f['faculty_id'] ?>">
                  <?= $f['fname'] . " " . $f['lname'] ?>
                </option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
        </div>

        <div class="row mb-3 g-3">
          <div class="col">
            <div class="form-floating">
              <select class="form-select" id="day-list-edit" name="day" placeholder="Day" required>
                <option value="" selected disabled>Select A Day</option>
                <option value="M">M</option>
                <option value="T">T</option>
                <option value="W">W</option>
                <option value="Th">Th</option>
                <option value="F">F</option>
                <option value="Sat">Sat</option>
              </select>
              <label class="form-label" for="day">Day <span class="text-danger">*</span></label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input type="text" id="room_edit" name="room" class="form-control" placeholder="Room" required>
              <label for="room">Room <span class="text-danger">*</span></label>
            </div>
          </div>
        </div>

        <div class="row mb-3 g-3">
          <div class="col">
            <div class="form-floating">
              <select class="form-select" id="semester-list-edit" name="semester" placeholder="Semester" required>
                <option value="">Select A Semester</option>
                <option value="1">1st Semester</option>
                <option value="2">2nd Semester</option>
              </select>
              <label class="form-label" for="semester-list">Semester <span class="text-danger">*</span></label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <select class="form-select" id="ay-list-edit" name="ay" placeholder="Academic Year" required>
                <option value="" selected disabled>Select Academic Year</option>
                <?php $startPointYear = $Time->getYear() - 1 ?>
                <?php for ($i = 0; $i < 2; $i++) : ?>
                  <option value="<?= $startPointYear + $i ?>-<?= $startPointYear + ($i + 1) ?>">
                    <?= $startPointYear + $i ?>-<?= $startPointYear + ($i + 1) ?>
                  </option>
                <?php endfor ?>
              </select>
              <label class="form-label" for="ay-list">Academic Year <span class="text-danger">*</span></label>
            </div>
          </div>
        </div>

        <div class="row mb-3 g-3">
          <div class="col">
            <div class="form-floating">
              <input type="time" id="start_time_edit" name="start_time" class="form-control" placeholder="Start Time" min="07:30:00" max="16:00:00" required>
              <label for="start_time">Start Time <span class="text-danger">*</span></label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input type="time" id="end_time_edit" name="end_time" class="form-control" placeholder="End Time" min="08:30:00" max="17:00:00" required>
              <label for="end_time">End Time <span class="text-danger">*</span></label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="clearData()" class="btn btn-secondary" onclick="clearData()" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#class-list-edit').select2({
      dropdownParent: $('#editScheduleModal'),
      theme: "classic"
    });
    $('#course-list-edit').select2({
      dropdownParent: $('#editScheduleModal'),
      theme: "classic"
    });
    $('#faculty-list-edit').select2({
      dropdownParent: $('#editScheduleModal'),
      theme: "classic"
    });
  });

  document.addEventListener("DOMContentLoaded", () => {
    var editScheduleModal = document.getElementById('editScheduleModal')
    let csidTag = document.getElementById('csid_edit');

    editScheduleModal.addEventListener('hidden.bs.modal', function(event) {
      $('#csid_edit').val('');
      $('#class-list-edit').val('');
      $('#course-list-edit').val('');
      $('#faculty-list-edit').val('');
      $('#day-list-edit').val('');
      $('#room_edit').val('');
      $('#semester-list-edit').val('');
      $('#ay-list-edit').val('');
      $('#start_time_edit').val('');
      $('#end_time_edit').val('');
      
      $('#class-list-edit').select2({
        dropdownParent: $('#editScheduleModal'),
        theme: "classic"
      }).trigger('change');
      $('#course-list-edit').select2({
        dropdownParent: $('#editScheduleModal'),
        theme: "classic"
      }).trigger('change');
      $('#faculty-list-edit').select2({
        dropdownParent: $('#editScheduleModal'),
        theme: "classic"
      }).trigger('change');
    });

    editScheduleModal.addEventListener('shown.bs.modal', function(event) {
      let schedule = JSON.parse(sessionStorage.getItem('schedule'));
      $('#csid_edit').val(schedule.class_schedule_id);

      $('#class-list-edit').val(schedule.class_id);
      $('#course-list-edit').val(schedule.course_id);
      $('#faculty-list-edit').val(schedule.faculty_id);

      $('#class-list-edit').select2({
        dropdownParent: $('#editScheduleModal'),
        theme: "classic"
      }).trigger('change');
      $('#course-list-edit').select2({
        dropdownParent: $('#editScheduleModal'),
        theme: "classic"
      }).trigger('change');
      $('#faculty-list-edit').select2({
        dropdownParent: $('#editScheduleModal'),
        theme: "classic"
      }).trigger('change');

      $('#day-list-edit').val(schedule.day);
      $('#room_edit').val(schedule.room);
      $('#semester-list-edit').val(schedule.semester);
      $('#ay-list-edit').val(schedule.academic_year);
      $('#start_time_edit').val(schedule.start_time);
      $('#end_time_edit').val(schedule.end_time);
    });
  });
</script>