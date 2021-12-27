<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>

<?= $this->include('PartialsFaculty/sidebar') ?>

<!-- Main Wrapper -->
<main class="content-wrapper main-content">

  <?= $this->include('PartialsFaculty/topbar') ?>

  <div class="container p-4">

    <?= $this->include('PartialsFaculty/breadcrumb') ?> 
    <?= $this->include('PartialsFaculty/Class/class') ?> 

  </div>
</main>

<?= $this->endSection() ?>