<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">List of Courses</span>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="courses-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Courses</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($courses) : ?>
               <?php foreach ($courses as $c) : ?>
                  <tr>
                     <td><?= $c['course_id']; ?></td>
                     <td>
                        <?= $c['course'] ?><br>
                        <span class="fst-italic small"><?= $c['description'] ?></span>
                     </td>
                     <td>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" onclick='forwardData("course", <?= json_encode($c) ?>)' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                              <i class="bx bx-edit"></i>
                           </button>
                           <button type="button" onclick='forwardData("course", <?= json_encode($c) ?>)' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCourseModal">
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

<?= $this->include('PartialsAdmin/Courses/course_edit') ?>
<?= $this->include('PartialsAdmin/Courses/course_delete') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#courses-list').DataTable();
   });
</script>