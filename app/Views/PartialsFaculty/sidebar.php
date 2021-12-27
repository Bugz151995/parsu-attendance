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
    <a href="<?= base_url() ?>/f" class="nav-link link-light <?= setActive($page, 'home') ?>">
      <i class="bx bxs-dashboard"></i>
      <span class="mx-2">Dashboard</span>
    </a>
    <a href="<?= base_url() ?>/f/class" class="nav-link link-light <?= setActive($page, 'class') ?>">
      <i class="bx bx-list-ol"></i>
      <span class="mx-2">Classes</span>
    </a>
    <a href="<?= base_url() ?>/f/check_attendance" class="nav-link link-light <?= setActive($page, 'check_attendance') ?>">
      <i class="bx bx-book"></i>
      <span class="mx-2">Check Attendance</span>
    </a>
    <a href="<?= base_url() ?>/f/report" class="nav-link link-light <?= setActive($page, 'report') ?>">
      <i class="bx bxs-report"></i>
      <span class="mx-2">Report</span>
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