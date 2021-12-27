<div class="d-flex justify-content-between bg-light p-3 shadow-sm align-items-center rounded rounded-3">
  <div class="h3 mb-0 text-capitalize page-title">
    <?php if (isset($subsegment)) : ?>
      <?= $subsegment ?>
    <?php else : ?>
      <?php if ($page == "check_attendance") : ?>
        Check Attendance
      <?php else : ?>
        <?= $page ?>
      <?php endif ?>
    <?php endif ?>
  </div>
  <nav aria-label="breadcrumb" class="me-1">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>/a/dashboard">Home</a></li>
      <li class="breadcrumb-item active text-capitalize" aria-current="page">
        <?php if ($page == "check_attendance") : ?>
          Check Attendance
        <?php else : ?>
          <?= $page ?>
        <?php endif ?>
      </li>
      <li class="breadcrumb-item active text-capitalize" aria-current="page">
        <?php if (isset($subsegment)) : ?>
          <?= $subsegment ?>
        <?php endif ?>
      </li>
    </ol>
  </nav>
</div>