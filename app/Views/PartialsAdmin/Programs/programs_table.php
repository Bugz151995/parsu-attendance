<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">List of Programs</span>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="programs-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Program</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($programs) : ?>
               <?php foreach ($programs as $p) : ?>
                  <tr>
                     <td><?= $p['program_id']; ?></td>
                     <td>
                        <?= $p['program'] ?><br>
                        <span class="fst-italic small"><?= $p['description'] ?></span>
                     </td>
                     <?php
                        $str = implode(",", $p);
                     ?>
                     <td>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProgramModal">
                              <i class="bx bx-edit"></i>
                           </button>
                           <button type="button" class="btn btn-sm btn-danger" onclick='forwardData("program", <?= json_encode($p) ?>)' data-bs-toggle="modal" data-bs-target="#deleteProgramModal">
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

<?= $this->include('PartialsAdmin/Programs/program_edit') ?>
<?= $this->include('PartialsAdmin/Programs/program_delete') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#programs-list').DataTable();
   });
</script>