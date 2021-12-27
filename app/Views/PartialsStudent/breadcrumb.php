<div class="d-flex justify-content-between bg-light p-3 shadow-sm align-items-center rounded rounded-3">
  <div class="h3 mb-0 text-capitalize page-title"><?= $page ?></div>
  <nav aria-label="breadcrumb" class="me-1">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>/a/dashboard">Home</a></li>
      <li class="breadcrumb-item active text-capitalize" aria-current="page"><?= $page ?></li>
    </ol>
  </nav>
</div>