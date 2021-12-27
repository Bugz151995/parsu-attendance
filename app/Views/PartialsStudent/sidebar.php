<div class="sidebar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
  <ul class="nav flex-column text-white w-100">
    <a href="#" class="nav-link text-white bg-primary navbar-title">
      <div class="d-flex small">
        <div class="col-auto">
          <img src="<?= base_url() ?>/assets/images/cbm.png" class="shadow navbar-brand-img me-3 bg-light rounded p-1" alt="">
        </div>
          <span class="small align-middle">Real-Time Mobile-Based Attendance System</span>
      </div>
    </a>
    <a href="<?= base_url() ?>/dashboard" class="nav-link link-light <?= setActive($page, 'dashboard') ?>">
      <i class="bx bxs-dashboard"></i>
      <span class="mx-2">Dashboard</span>
    </a>
    <a href="<?= base_url() ?>/schedule" class="nav-link link-light <?= setActive($page, 'schedule') ?>">
      <i class="bx bx-list-ol"></i>
      <span class="mx-2">Schedule</span>
    </a>
    <a href="<?= base_url() ?>/overview" class="nav-link link-light <?= setActive($page, 'overview') ?>">
      <i class="bx bxs-report"></i>
      <span class="mx-2">Overview</span>
    </a>
  </ul>
</div>

<?php 
/**
 * set active nav
 * @return string $activeClass
 */
function setActive($page, $pageName)
{
  return ($page === $pageName) ? 'bg-secondary' : '' ;
}
?>