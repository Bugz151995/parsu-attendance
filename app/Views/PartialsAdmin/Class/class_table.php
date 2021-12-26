<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">List of Courses</span>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="class-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Class</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($class) : ?>
               <?php foreach ($class as $c) : ?>
                  <tr>
                     <td><?= $c['class_id']; ?></td>
                     <td>
                        <?= $c['program'].' '.$c['level'].'-'.$c['section'] ?>
                     </td>
                     <td>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editClassModal">
                              <i class="bx bx-edit"></i>
                           </button>
                           <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClassModal">
                              <i class="bx bx-trash"></i>
                           </button>
                        </div>

                        <?= $this->include('PartialsAdmin/Class/class_edit') ?>
                        <?= $this->include('PartialsAdmin/Class/class_delete') ?>
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
      $('#class-list').DataTable();
   });
</script>