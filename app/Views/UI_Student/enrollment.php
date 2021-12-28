<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>
<?php
  $codeErrorClass = null;
  $codeErrorShow = null;

  /**
   * do this if the form is invalid
   * set the class and show the error
   */
  if (isset($validation)) {
    $codeErrorClass = ($validation->getError('code')) ? 'is-invalid' : 'is-valid';
    $codeErrorShow = ($validation->getError('code')) ? $validation->showError('code', 'custom_single') : '';
  }
?>

<main id="login-container">
  <div class="container-login" id="container">
    <div class="form-container login-container">
      <?= form_open('enrollment/verify', ['id' => 'login-form', 'class' => 'login-form']) ?>

        <h1 class="login-title" style="font-family:courier">ENROLLMENT</h1><br><br>

        <div class="mb-3">
          <div class="form-floating">
            <input required type="text" id="code" class="form-control login-input
              <?= $codeErrorClass ?>" value="<?= set_value('code') ?>" name="code" placeholder="Code">
            <label for="code">Enrollment Code</label>
            <?= $codeErrorShow ?>
          </div>
        </div>

        <div class="mb-3">
          <div class="form-floating" style="width: 197px">
            <select class="form-select" id="semester-list" name="semester" placeholder="Semester" required>
              <option value="">Select A Semester</option>
              <option value="1">1st Semester</option>
              <option value="2">2nd Semester</option>
            </select>
            <label class="form-label" for="semester-list">Semester <span class="text-danger">*</span></label>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-floating" style="width: 197px">
            <select class="form-select" id="ay-list" name="ay" placeholder="Academic Year" required>
              <option value="" selected disabled>Select Academic Year</option>
              <?php $startPointYear = $Time->getYear() - 1 ?>
              <?php for ($i = 0; $i < 2; $i++) : ?>
                <option value="<?= $startPointYear + $i ?>-<?= $startPointYear + ($i + 1) ?>">
                  <?= $startPointYear + $i ?>-<?= $startPointYear + ($i + 1) ?>
                </option>
              <?php endfor ?>
            </select>
            <label class="form-label" for="ay-list">Academic Year <span class="text-danger">*</span></label>
          </div>
        </div>

        <div class="mb-3">
          <button type="submit" class="login-btn shadow">Enroll</button>
        </div>

      <?= form_close() ?>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1 class="login-title" style="font-family:courier">Hola!</h1>
          <p class="login-p">Please Enter your enrollment code provided by the Admin.</p>
        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ?>