<div class="card shadow rounded rounded-3 my-5">
   <div class="card-header">
      <span class="h5">List of Schedules</span>
      <div class="float-end">
         <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createScheduleModal">
            <i class="bx bx-plus"></i> New Schedule
         </button>

         <?= $this->include('PartialsAdmin/ClassSchedules/schedule_create') ?>
      </div>
   </div>
   <div class="p-4">
      <table class="table table-bordered" id="schedule-list">
         <thead>
            <tr>
               <th>#</th>
               <th>Class</th>
               <th>Course</th>
               <th>Time</th>
               <th>Day</th>
               <th>Room</th>
               <th>Faculty</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($schedules) : ?>
               <?php foreach ($schedules as $sc) : ?>
                  <tr>
                     <td><?= $sc['schedule_id']; ?></td>
                     <td>
                        <?= $sc['program'] . ' ' . $sc['level'] . '-' . $sc['section'] ?>
                     </td>
                     <td>
                        <?= $sc['course'] ?>
                     </td>
                     <td>
                        <?= date("h:i a", strtotime($sc['start_time']))." - ".date("h:i a", strtotime($sc['end_time'])) ?>
                     </td>
                     <td><?= $sc['day'] ?></td>
                     <td><?= $sc['room'] ?></td>
                     <td>
                        <?= substr($sc['fname'], 0, 1) . ". " . $sc['lname'] ?>
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
                     </td>
                  </tr>
               <?php endforeach; ?>
            <?php endif; ?>
         </tbody>
      </table>
   </div>
</div>

<?= $this->include('PartialsAdmin/ClassSchedules/schedule_edit') ?>
<?= $this->include('PartialsAdmin/ClassSchedules/schedule_delete') ?>

<!-- define the dataTable -->
<script>
   $(document).ready(function() {
      $('#schedule-list').DataTable();
   });
</script>