<?= $this->extend('Layout/main') ?>

<?= $this->section('root') ?>
<?php
  $usernameErrorClass = null;
  $passwordErrorClass = null;
  $usernameErrorShow = null;
  $passwordErrorShow = null;

  /**
   * do this if the form is invalid
   * set the class and show the error
   */
  if (isset($validation)) {
    $usernameErrorClass = ($validation->getError('username')) ? 'is-invalid' : 'is-valid';
    $passwordErrorClass = ($validation->getError('password')) ? 'is-invalid' : 'is-valid';
    $usernameErrorShow = ($validation->getError('username')) ? $validation->showError('username', 'custom_single') : '';
    $passwordErrorShow = ($validation->getError('password')) ? $validation->showError('password', 'custom_single') : '';
  }
?>

<main id="login-container">
  <div class="container-login" id="container">
    <div class="form-container login-container">
      <?= form_open('login', ['id' => 'login-form', 'class' => 'login-form']) ?>

        <h1 class="login-title" style="font-family:courier">LOGIN</h1><br><br>

        <div class="mb-3">
          <div class="form-floating">
            <input type="text" id="uname" class="form-control login-input
              <?= $usernameErrorClass ?>" value="<?= set_value('username') ?>" name="username" placeholder="Username">
            <label for="uname">Username</label>
            <?= $usernameErrorShow ?>
          </div>
        </div>

        <div class="mb-5">
          <div class="form-floating">
            <input type="password" id="pass" class="form-control login-input
              <?= $passwordErrorClass ?>" name="password" placeholder="Password">
            <label for="pass">Password</label>
            <?= $passwordErrorShow ?>
          </div>
        </div>

        <div class="mb-3">
          <button type="submit" class="login-btn shadow">Login</button>
        </div>

      <?= form_close() ?>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1 class="login-title" style="font-family:courier">Hola!</h1>
          <p class="login-p">Enter your details and start your journey with us.</p>
        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ?>