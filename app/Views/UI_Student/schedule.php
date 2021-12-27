<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>

<?= $this->include('PartialsStudent/sidebar') ?>

<!-- Main Wrapper -->
<main class="content-wrapper main-content">

  <?= $this->include('PartialsStudent/topbar') ?>

  <div class="container p-4">

    <?= $this->include('PartialsStudent/breadcrumb') ?> 
    <?= $this->include('PartialsStudent/Schedule/schedules') ?>

  </div>
</main>

<?= $this->endSection() ?>