<script>
  $(document).ready(function() {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    /**
     * success notif
     */
    <?php if (session()->getTempdata('success')) : ?>
      toastr.success("<?= session()->getTempdata('success') ?>", "Success");
    <?php endif ?>

    /**
     * info notif
     */
    <?php if (session()->getTempdata('info')) : ?>
      toastr.info("<?= session()->getTempdata('info') ?>", "Notice");
    <?php endif ?>

    /**
     * warning notif
     */
    <?php if (session()->getTempdata('warning')) : ?>
      toastr.warning("<?= session()->getTempdata('warning') ?>", "Warning");
    <?php endif ?>

    /**
     * error notif
     */
    <?php if (session()->getTempdata('error')) : ?>
      toastr.error("<?= session()->getTempdata('error') ?>", "Error");
    <?php endif ?>
  });
</script>