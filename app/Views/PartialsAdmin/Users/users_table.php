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
      $('#users-list').DataTable();
   });
</script>