<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>

<?= $this->include('PartialsStudent/sidebar') ?>

<!-- Main Wrapper -->
<main class="content-wrapper main-content">

  <?= $this->include('PartialsStudent/topbar') ?>
  <?= $this->include('PartialsStudent/Enrollment/enrollment') ?>

</main>

<?= $this->endSection() ?>