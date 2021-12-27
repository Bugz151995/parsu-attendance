<div class="card mt-5 col-12 col-md-6 shadow rounded rounded-3">
  <div class="card-header h5">
    Current Schedule
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <tbody>
          <?php
          $filteredSchedules = array_filter($schedules, function ($schedule) {
            date_default_timezone_set('Asia/Manila');
            $t = date('H:i:s');
            if ($t > $schedule['start_time'] && $t < $schedule['end_time']) {
              return true;
            }

            return false;
          })
          ?>

          <?php if($filteredSchedules): ?>
            <?php foreach ($filteredSchedules as $key => $f) : ?>
              <tr>
                <th>Subject</th>
                <td>
                  <?= $f['course'] ?><br>
                  <span class="fst-italic small text-muted"><?= $f['description']; ?></span>
                </td>
              </tr>
              <tr>
                <th>Time</th>
                <td><?= date('h:i a', strtotime($f['start_time'])) ?> - <?= date('h:i a', strtotime($f['end_time'])) ?></td>
              </tr>
              <tr>
                <th>Room</th>
                <td><?= $f['room'] ?></td>
              </tr>
              <tr>
                <th>Faculty</th>
                <td><?= substr($f['fname'], 0, 1) ?>. <?= $f['lname'] ?></td>
              </tr>
              <tr>
                <th>Status</th>
                <td>
                  <?php if($f['status'] === null): ?>
                    <div class="badge bg-secondary">No Attendance</div>
                  <?php elseif($f['status'] === 'P'): ?>
                    <div class="badge bg-success">Present</div>
                  <?php elseif($f['status'] === 'A'): ?>
                    <div class="badge bg-danger">Absent</div>
                  <?php else: ?>
                    <div class="badge bg-warning">Late</div>
                  <?php endif ?>
                </td>
              </tr>
              <tr>
                <th>Time In</th>
                <td>
                  <?php if($f['time_in']): ?>
                    <?= date('h:i:s a', strtotime($f['time_in'])) ?>
                  <?php else: ?>
                    --:--:--
                  <?php endif ?>
                </td>
              </tr>
              <tr>
                <th>Time Out</th>
                <td>
                  <?php if($f['time_out']): ?>
                    <?= date('h:i:s a', strtotime($f['time_out'])) ?>
                  <?php else: ?>
                    --:--:--
                  <?php endif ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <div class="d-flex p-2 gap-3 justify-content-center w-100">
                    <?= form_open('attendance/timein') ?>
                    <?= form_hidden('start_time', $f['start_time']) ?>
                    <?= form_hidden('class_schedule_id', $f['class_schedule_id']) ?>
                    <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i> Time In</button>
                    <?= form_close() ?>

                    <?= form_open('attendance/timeout') ?>
                    <?= form_hidden('end_time', $f['end_time']) ?>
                    <?php if($f['student_attendance_id']): ?>
                      <?= form_hidden('student_attendance_id', $f['student_attendance_id']) ?>
                    <?php endif ?>
                    <?= form_hidden('class_schedule_id', $f['class_schedule_id']) ?>
                    <button type="submit" class="btn btn-sm btn-dark"><i class="bx bx-exit"></i> Time Out</button>
                    <?= form_close() ?>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else: ?>
            <div class="alert alert-info">There are no scheduled subject as of this moment.</div>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>