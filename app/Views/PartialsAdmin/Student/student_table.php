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
               <th>Username</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($students) : ?>
               <?php foreach ($students as $s) : ?>
                  <tr>
                     <td><?= $s['student_id']; ?></td>
                     <td><?= $s['suser_no']; ?></td>
                     <td><?= $s['fname'] . ' ' . $s['lname']; ?></td>
                     <td><?= $s['username']; ?></td>
                     <td>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStudentModal">
                              <i class="bx bx-edit"></i>
                           </button>
                           <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">
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

<?= $this->include('PartialsAdmin/Student/student_edit') ?>
<?= $this->include('PartialsAdmin/Student/student_delete') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#users-list').DataTable();
   });
</script>