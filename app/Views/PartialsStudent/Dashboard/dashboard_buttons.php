<div class="row row-cols-1 row-cols-sm-3 g-4 my-5">
  <div class="col">
    <div class="card shadow">
      <div class="card-header">Total Present in <?= $subject ?></div>
      <div class="card-body rounded-botton text-center">
        <?= $present['numrows'] ?>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow">
      <div class="card-header">Total Absent in <?= $subject ?></div>
      <div class="card-body rounded-botton text-center">
        <?= $absent['numrows'] ?>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow">
      <div class="card-header">Total Late in <?= $subject ?></div>
      <div class="card-body rounded-botton text-center">
        <?= $late['numrows'] ?>
      </div>
    </div>
  </div>
</div>