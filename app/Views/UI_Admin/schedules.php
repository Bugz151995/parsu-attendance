<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>

<?= $this->include('PartialsAdmin/sidebar') ?>

<!-- Main Wrapper -->
<main class="content-wrapper main-content">

  <?= $this->include('PartialsAdmin/topbar') ?>

  <div class="container p-4">

    <?= $this->include('PartialsAdmin/breadcrumb') ?>  
    <?= $this->include('PartialsAdmin/ClassSchedules/schedule_table') ?>
    
  </div>

</main>

<?= $this->endSection() ?>