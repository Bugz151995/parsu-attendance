<nav class="navbar top-navbar navbar-light bg-primary px-5 shadow">
  <a class="btn btn-primary border-0 shadow" id="menu-btn"><i class="bx bx-menu"></i></a>
  <div class="dropstart">
    <button class="btn btn-sm btn-primary shadow" type="button" id="facultyMenuModal" data-bs-toggle="dropdown" aria-expanded="false">
      Faculty
    </button>
    <ul class="dropdown-menu" aria-labelledby="facultyMenuModal">
      <li>
        <a class="dropdown-item small" role="button" data-bs-toggle="modal" data-bs-target="#facultyAccountUpdateModal">
          <i class="bx bx-cog"></i>
          Manage Account
        </a>
      </li>
      <li>
        <a class="dropdown-item small" href="<?= base_url() ?>/logout">
          <i class="bx bx-log-out"></i>
          Log-out
        </a>
      </li>
    </ul>
  </div>
</nav>