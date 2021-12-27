<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">Student List</span>
      <div class="float-end">
         <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createStudentModal">
            <i class="bx bx-plus"></i> New Student
         </button>

         <?= $this->include('PartialsAdmin/Student/student_create') ?>
      </div>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="users-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Student #</th>
               <th>Name</th>
               <th>Class</th>
               <th>Enrollment Code</th>
               <th>A/Y</th>
               <th>Sem</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($students) : ?>
               <?php foreach ($students as $s) : ?>
                  <tr>
                     <td><?= $s['student_id']; ?></td>
                     <td><?= $s['suser_no']; ?></td>
                     <td>
                        <?= $s['fname'] . ' ' . $s['lname']; ?><br>                 
                        <span class="text-muted small fst-italic"><?= $s['username']; ?></span>
                     </td>
                     <td><?= $s['program'].' '.$s['level'].'-'.$s['section']; ?></td>
                     <td><?= $s['enrollment_code']; ?></td>
                     <td><?= $s['academic_year']; ?></td>
                     <td><?= $s['semester']; ?></td>
                     <td>
                        <?php if($s['isVerified'] == '0'): ?>
                           <div class="badge bg-warning">Pending</div>
                        <?php else: ?>
                           <div class="badge bg-success">Enrolled</div>
                        <?php endif ?>
                     </td>
                     <td>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" onclick='forwardData("student", <?= json_encode($s) ?>)' class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#refreshStudentModal">
                              <i class="bx bx-refresh"></i>
                           </button>
                           <button type="button" onclick='forwardData("student", <?= json_encode($s) ?>)' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStudentModal">
                              <i class="bx bx-edit"></i>
                           </button>
                           <button type="button" onclick='forwardData("student", <?= json_encode($s) ?>)' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">
                              <i class="bx bx-trash"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            <?php endif; ?>
         </tbody>
      </table>
   </div>
</div>

<?= $this->include('PartialsAdmin/Student/student_refresh') ?>
<?= $this->include('PartialsAdmin/Student/student_edit') ?>
<?= $this->include('PartialsAdmin/Student/student_delete') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#users-list').DataTable();
   });
</script>