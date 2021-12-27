<div class="card shadow rounded rounded-3 my-5">
  <div class="card-header">
    <span class="h5">Student List</span>
  </div>
  <div class="p-4">
    <table class="table table-bordered" id="student-list">
      <thead>
        <tr>
          <th>#</th>
          <th>Student #</th>
          <th>Name</th>
          <th>Present</th>
          <th>Absent</th>
          <th>Late</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($students) : ?>
          <?php foreach ($students as $key => $s) : ?>
            <tr>
              <td><?= $s['student_id']; ?></td>
              <td><?= $s['suser_no']; ?></td>
              <td>
                <?= $s['fname'] . ' ' . $s['lname']; ?>
              </td>
              <td>
                <?php foreach($present as $key => $p): ?>
                  <?php if($p['student_id'] == $s['student_id']): ?>
                      <?= $p['count'] ?>
                  <?php endif ?>
                <?php endforeach ?>
              </td>
              <td>
                <?php foreach($absent as $key => $a): ?>
                  <?php if($a['student_id'] == $s['student_id']): ?>
                      <?= $a['count'] ?>
                  <?php endif ?>
                <?php endforeach ?>
              </td>
              <td>
                <?php foreach($late as $key => $l): ?>
                  <?php if($l['student_id'] == $s['student_id']): ?>
                      <?= $l['count'] ?>
                  <?php endif ?>
                <?php endforeach ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- define the dataTable -->
<script>
  $(document).ready(function() {
    $('#student-list').DataTable();
  });
</script>