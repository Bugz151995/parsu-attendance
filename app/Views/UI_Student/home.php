<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>

<?= $this->include('PartialsStudent/sidebar') ?>

<!-- Main Wrapper -->
<main class="content-wrapper main-content">

  <?= $this->include('PartialsStudent/topbar') ?>

  <div class="container p-4">

    <?= $this->include('PartialsStudent/breadcrumb') ?> 
    <?php //$this->include('PartialsStudent/Dashboard/dashboard_buttons') ?>
    <?= $this->include('PartialsStudent/Dashboard/current_schedule') ?>
    <?= $this->include('PartialsStudent/Dashboard/today_schedule') ?>

  </div>
</main>

<?= $this->endSection() ?>