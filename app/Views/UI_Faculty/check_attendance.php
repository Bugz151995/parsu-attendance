<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>

<?= $this->include('PartialsFaculty/sidebar') ?>

<!-- Main Wrapper -->
<main class="content-wrapper main-content">

  <?= $this->include('PartialsFaculty/topbar') ?>

  <div class="container p-4">

    <?= $this->include('PartialsFaculty/breadcrumb') ?> 

  </div>
</main>

<?= $this->endSection() ?>