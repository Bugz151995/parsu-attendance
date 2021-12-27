<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">List of Class</span>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="schedule-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Class</th>
               <th>Course</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($class) : ?>
               <?php foreach ($class as $sc) : ?>
                  <tr>
                     <td><?= $sc['class_id']; ?></td>
                     <td>
                        <?= $sc['program'] . ' ' . $sc['level'] . '-' . $sc['section'] ?>
                     </td>
                     <td>
                        <?= $sc['course'] ?>
                     </td>
                     <td>
                       <a href="<?= base_url() ?>/f/class/students/<?= $sc['class_id']?>" class="btn btn-primary btn-sm"><i class="bx bxs-user-detail"></i> View Students</a>
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
      $('#schedule-list').DataTable();
   });
</script>