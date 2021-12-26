<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">User List</span>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="users-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Username</th>
               <th>Role</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($students) : ?>
               <?php foreach ($students as $s) : ?>
                  <tr>
                     <td><?= $s['user_id']; ?></td>
                     <td><?= $s['fname'] . ' ' . $s['lname']; ?></td>
                     <td><?= $s['username']; ?></td>
                     <td>
                        <div class="badge bg-primary">Student</div>
                     </td>
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

            <?php if ($faculty) : ?>
               <?php foreach ($faculty as $f) : ?>
                  <tr>
                     <td><?= $f['user_id']; ?></td>
                     <td><?= $f['fname'] . ' ' . $f['lname']; ?></td>
                     <td><?= $f['username']; ?></td>
                     <td>
                        <div class="badge bg-secondary">Faculty</div>
                     </td>
                     <td>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editFacultyModal">
                              <i class="bx bx-edit"></i>
                           </button>
                           <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteFacultyModal">
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


<?= $this->include('PartialsAdmin/Users/edit_faculty') ?>
<?= $this->include('PartialsAdmin/Users/delete_faculty') ?>
<?= $this->include('PartialsAdmin/Users/edit_student') ?>
<?= $this->include('PartialsAdmin/Users/delete_student') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#users-list').DataTable();
   });
</script>