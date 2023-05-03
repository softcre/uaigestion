<?php $this->load->view('admin/components/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php $this->load->view('admin/observaciones/_headerObservaciones'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <a href="<?= base_url(OBSERVACION_NUEVA_PATH) ?>" class="btn bg-gradient-primary mb-3" title="Nueva observación">
        <i class="fas fa-plus fa-fw"></i> Nueva observación
      </a>

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Listado de Observaciones</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form id="form_busqObservaciones" onsubmit="getObservaciones(event)">
                <div class="form-row align-items-center">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="ua_busq" class="mb-0">Unidad Académica</label>
                      <select class="form-control" id="ua_busq" name="ua_busq_id" onchange="getAreasAuditadasList()">
                        <option value="" selected>TODAS</option>
                        <?php foreach ($unidadesAcademicas as $ua) : ?>
                          <option value="<?= $ua->id_ua; ?>">
                            <?= $ua->nombre_ua; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="aa_busq" class="mb-0">Área Auditada</label>
                      <select class="form-control" id="aa_busq" name="aa_busq_id">
                        <option value="" selected>TODAS</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <button type="submit" id="btnFormPage" class="btn btn-primary" name="button">
                        <div class="d-none">
                          <span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
                          Buscando...
                        </div>
                        <span><i class="fas fa-search mr-2"></i>Buscar</span>
                      </button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <hr>
          <div id="observaciones-main">
            <!-- Tabla de observaciones -->
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