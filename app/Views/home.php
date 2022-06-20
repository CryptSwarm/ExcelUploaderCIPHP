<?php echo view('templates/header'); ?>
<?php if (session()->get('isLoggedIn')) { ?>
<!-- If user is login, display the upload tool -->
<div class="container mx-0 px-0">
  <div class="row w-100 h-75 position-absolute align-items-center justify-content-center">
    <div class="col col-lg-4 ms-4">
      <form action="<?php echo base_url(); ?>/upload" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Upload a file</h1>

        <div class="mb-3">
          <input class="form-control form-control" id="formFile" type="file" name="excelfile">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Upload</button>
      </form>
    </div>
  </div>
</div>
<?php } else { ?>
<!-- If not login, default display -->
<div class="container mt-5">
  <div class="p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">Excel Uploader</h1>
    <p class="fs-5 text-muted">A web application built from PHP using CodeIgniter framework. You can upload excel sheets
      using this tool and the records will be stored in the database.</p>
  </div>
</div>
<?php } ?>

<!-- Error messages for validation -->
<?php if(isset($validation)):?>
<div aria-live="polite" aria-atomic="true" class="position-relative" data-bs-autohide="false">
  <div class="toast-container top-0 end-0 p-3">
    <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
      <div class="toast-header">
        <strong class="me-auto">Error</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white">
        <?= $validation->listErrors() ?>
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<?php if(session()->getFlashdata('message') && session()->getFlashdata('bg-class')):?>
<div aria-live="polite" aria-atomic="true" class="position-relative" data-bs-autohide="false">
  <div class="toast-container top-0 end-0 p-3">
    <div class="toast <?= session()->getFlashdata('bg-class') ?>" role="alert" aria-live="assertive" aria-atomic="true"
      data-bs-autohide="false">
      <div class="toast-header">
        <strong class="me-auto">Note</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white">
        <?= session()->getFlashdata('message') ?>
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<?php echo view('templates/footer'); ?>