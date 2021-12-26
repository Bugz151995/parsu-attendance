<div class="sidebar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
  <ul class="nav flex-column text-white w-100">
    <a href="#" class="nav-link text-white">
      <div class="d-flex">
        <div class="col-auto">
          <img src="<?= base_url() ?>/assets/images/cbm.png" class="navbar-brand-img me-3" alt="">
        </div>
          <span class="small align-middle">Real-Time Mobile-Based Attendance System</span>
      </div>
    </a>
    <a href="<?= base_url() ?>/a/dashboard" class="nav-link link-light <?= setActive($page, 'dashboard') ?>">
      <i class="bx bxs-dashboard"></i>
      <span class="mx-2">Dashboard</span>
    </a>
    <a href="<?= base_url() ?>/a/programs" class="nav-link link-light <?= setActive($page, 'programs') ?>">
      <i class="bx bx-list-ol"></i>
      <span class="mx-2">Programs</span>
    </a>
    <a href="<?= base_url() ?>/a/courses" class="nav-link link-light <?= setActive($page, 'courses') ?>">
      <i class="bx bx-book"></i>
      <span class="mx-2">Courses</span>
    </a>
    <a href="<?= base_url() ?>/a/class" class="nav-link link-light <?= setActive($page, 'class') ?>">
      <i class="bx bx-chalkboard"></i>
      <span class="mx-2">Class</span>
    </a>
    <a href="<?= base_url() ?>/a/faculty" class="nav-link link-light <?= setActive($page, 'faculty') ?>">
      <i class="bx bxs-user-pin"></i>
      <span class="mx-2">Faculty</span>
    </a>
    <a href="<?= base_url() ?>/a/students" class="nav-link link-light <?= setActive($page, 'students') ?>">
      <i class="bx bx-user-pin"></i>
      <span class="mx-2">Student</span>
    </a>
    <a href="<?= base_url() ?>/a/schedules" class="nav-link link-light <?= setActive($page, 'schedules') ?>">
      <i class="bx bxs-book-alt"></i>
      <span class="mx-2">Class Schedules</span>
    </a>
    <a href="<?= base_url() ?>/a/report" class="nav-link link-light <?= setActive($page, 'report') ?>">
      <i class="bx bxs-report"></i>
      <span class="mx-2">Report</span>
    </a>
    <a href="<?= base_url() ?>/a/users" class="nav-link link-light <?= setActive($page, 'users') ?>">
      <i class="bx bx-group"></i>
      <span class="mx-2">Users</span>
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