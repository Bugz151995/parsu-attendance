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
               <th>Time</th>
               <th>Day</th>
               <th>Room</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if ($schedules) : ?>
               <?php foreach ($schedules as $sc) : ?>
                  <tr>
                     <td><?= $sc['class_schedule_id']; ?></td>
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