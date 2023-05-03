<?php $this->load->view('admin/components/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php $this->load->view('admin/observaciones/_headerObservaciones'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-body">
          <div class="container text-center" style="max-width: 800px;">
            <form name="Observacion" method="post" onsubmit="addObservacion(event)">
              <?php $this->load->view('admin/observaciones/_formularioObservacion');
              ?>

              <div class="text-center">
                <button type="submit" id="btnFormObservacion" class="btn btn-primary" name="button">
                  <div class="d-none">
                    <span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
                    Registrando...
                  </div>
                  <span><i class="fas fa-save mr-2"></i>Registrar</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>
<script src="<?= base_url('assets/js/admin/observaciones.js'); ?>"></script>