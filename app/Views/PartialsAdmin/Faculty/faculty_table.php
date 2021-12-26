<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">Faculty List</span>
      <div class="float-end">
         <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createFacultyModal">
            <i class="bx bx-plus"></i> New Faculty
         </button>

         <?= $this->include('PartialsAdmin/Faculty/faculty_create') ?>
      </div>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="users-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Faculty #</th>
               <th>Name</th>
               <th>Username</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($faculty) : ?>
               <?php foreach ($faculty as $f) : ?>
                  <tr>
                     <td><?= $f['faculty_id']; ?></td>
                     <td><?= $f['fuser_no']; ?></td>
                     <td><?= $f['fname'] . ' ' . $f['lname']; ?></td>
                     <td><?= $f['username']; ?></td>
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

<?= $this->include('PartialsAdmin/Faculty/faculty_edit') ?>
<?= $this->include('PartialsAdmin/Faculty/faculty_delete') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#users-list').DataTable();
   });
</script>