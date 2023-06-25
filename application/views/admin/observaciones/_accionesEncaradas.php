<div class="timeline">
  <div class="time-label">
    <span class="bg-blue">Propuesta de Acción</span>
  </div>

  <?php foreach ($accionesEncaradas as $key => $accion) : ?>
    <div>
      <img class="fas" src="<?= $this->imagen->getUrlImg('usuarios', $accion->foto); ?>" alt="message user image">

      <div class="timeline-item">
        <span class="time"><i class="fas fa-clock"></i> <?= formatearFecha($accion->created_at, 'd/m/Y H:i'); ?></span>
        <h3 class="timeline-header"><a href="#"><?= $accion->nombre . ' ' . $accion->apellido; ?></a></h3>

        <div class="timeline-body"><?= $accion->accion_encarada; ?></div>

        <?php if ($accion->archivo_adjunto) : ?>
          <div class="timeline-footer">
            <?php $urlFile = getUrlFile($accion->observacion_id, $accion->archivo_adjunto);
            if ($urlFile) : ?>
              <a href="<?= $urlFile; ?>" download="Archivo adjunto (nro orden <?= $accion->observacion_id; ?>)" class="btn btn-primary btn-sm"><i class="fas fa-download mr-2"></i>Descargar adjunto</a>
            <?php else : ?>
              <button type="button" class="btn btn-primary btn-sm" onclick="errorDescarga()"><i class="fas fa-download mr-2"></i>Descargar adjunto</button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>

  <?php if (permisoOperador_UAOperador()) : ?>
    <?php if (!$accionesEncaradas && permisoOperador()) : ?>
      <div class="alert alert-info text-center" role="alert">
        Sin acciones encaradas por parte del area auditada...
      </div>
    <?php else : ?>
      <div>
        <img class="fas" src="<?= $this->imagen->getUrlImg('usuarios', $this->session->foto); ?>" alt="message user image">
        <div class="timeline-item">
          <h3 class="timeline-header">Propuesta de Acción</h3>

          <form id="form_accion" name="Accion" enctype="multipart/form-data" method="post" onsubmit="addAccionEncarada(event)">
            <input type="hidden" name="totalAcciones" value="<?= count($accionesEncaradas); ?>">
            <div class="timeline-body p-2">
              <?php if (!$accionesEncaradas) : ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="area_involucrada" class="mb-0" title="Obligatorio">Área/s Involucrada/s <span class="text-danger" title="Obligatorio">*</span></label>
                      <input type="text" class="form-control" id="area_involucrada" name="area_involucrada" placeholder="Área/s involucrada/s">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="responsable_implementacion" class="mb-0" title="Obligatorio">Responsable/s de Implementación <span class="text-danger" title="Obligatorio">*</span></label>
                      <input type="text" class="form-control" id="responsable_implementacion" name="responsable_implementacion" placeholder="Responsable/s de Implementación">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fecha_estimada_reg" class="mb-0" title="Obligatorio">Fecha de Estimada de Regularización <span class="text-danger" title="Obligatorio">*</span></label>
                      <input type="date" class="form-control" id="fecha_estimada_reg" name="fecha_estimada_reg" placeholder="Fecha de Estimada de Regularización">
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <input type="hidden" name="observacion_id" value="<?= $observacion_id; ?>">
              <textarea class="form-control mb-1" id="accion_encarada" name="accion_encarada" rows="3" placeholder="Ingrese la propuesta de acción..."></textarea>
              <input type="file" name="fileAccion" id="fileAccion">
            </div>
          </form>

          <div class="timeline-footer">
            <button type="submit" id="btnFormAccion" form="form_accion" class="btn btn-success btn-sm" name="button">
              <div class="d-none">
                <span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
                Enviando...
              </div>
              <span><i class="fas fa-paper-plane mr-2"></i>Enviar</span>
            </button>
          </div>
        </div>

      </div>
    <?php endif; ?>
  <?php endif; ?>

  <!-- <div>
        <i class="fas fa-clock bg-gray"></i>
      </div> -->
</div>