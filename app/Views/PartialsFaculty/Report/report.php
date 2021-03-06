<div class="card shadow-sm mt-5">
  <div class="card-header">Select Attendance Data</div>
  <div class="card-body">
    <?= form_open('f/report/select') ?>
    <div class="mb-3">
      <label class="form-label" for="class">Class <span class="text-danger">*</span></label>
      <select class="form-select" style="width:100%" id="class-list" name="class" placeholder="Class" required>
        <option value="" selected disabled>Select A Class</option>
        <?php if ($class) : ?>
          <?php foreach ($class as $c) : ?>
            <option value="<?= $c['class_id'] ?>">
              <?= $c['program'] . " " . $c['level'] . "-" . $c['section'] ?>
              [<?= $c['course'] ?>]
            </option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
    </div>
    <?= form_close() ?>
  </div>
</div>
<div class="card shadow p-3 mt-5">
  <table class="table" id="student-list">
    <thead>
      <tr>
        <th colspan="6" class="text-center">
          <div class="h4 fw-bold">Partido State University</div>
          <div class="h4 fw-bold">Attendance Report</div>
        </th>
      </tr>
      <tr>
        <th>Program:</th>
        <th colspan="3"></th>
        <th>Class:</th>
        <th></th>
      </tr>

      <tr>
        <th>Course:</th>
        <th colspan="3"></th>
        <th>Academic Year:</th>
        <th></th>
      </tr>

      <tr>
        <th></th>
        <th colspan="3"></th>
        <th>Semester:</th>
        <th></th>
      </tr>

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
      <?php if (isset($students)) : ?>
        <?php foreach ($students as $key => $s) : ?>
          <tr>
            <td><?= $s['student_id']; ?></td>
            <td><?= $s['suser_no']; ?></td>
            <td>
              <?= $s['fname'] . ' ' . $s['lname']; ?>
            </td>
            <td>
              <?php foreach ($present as $key => $p) : ?>
                <?php if ($p['student_id'] == $s['student_id']) : ?>
                  <?= $p['count'] ?>
                <?php endif ?>
              <?php endforeach ?>
            </td>
            <td>
              <?php foreach ($absent as $key => $a) : ?>
                <?php if ($a['student_id'] == $s['student_id']) : ?>
                  <?= $a['count'] ?>
                <?php endif ?>
              <?php endforeach ?>
            </td>
            <td>
              <?php foreach ($late as $key => $l) : ?>
                <?php if ($l['student_id'] == $s['student_id']) : ?>
                  <?= $l['count'] ?>
                <?php endif ?>
              <?php endforeach ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>

  <button onclick="print('student-list')" class="btn btn-primary mt-4"><i class="bx bx-printer"></i> Print</button>
</div>

<script>
  $(document).ready(() => {
    $('#class-list').select2({
      theme: "classic"
    });
  })

  function print(elementId) {
    var element = document.getElementById(elementId);
    var opt = {
      margin: 1,
      filename: 'myfile.pdf',
      image: {
        type: 'jpeg',
        quality: 1
      },
      html2canvas: {
        scale: 2
      },
      jsPDF: {
        unit: 'in',
        format: 'letter',
        orientation: 'portrait'
      }
    };

    // New Promise-based usage:
    html2pdf().set(opt).from(element).save();
  }
</script>