<div class="modal-header bg-primary py-2">
  <h5 class="modal-title">Actualizar estado observación N°<?= $observacion_id; ?></h5>
  <button type="button" id="cerrarModal" class="close text-white" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body">
  <form id="form_editEstObservacion" name="EstadoObservacion" method="post" onsubmit="updateEstadoObs(event)">
    <input type="hidden" name="idObservacion" value="<?= $observacion_id; ?>">

    <div class="form-group">
      <p class="font-weight-bold m-0">Estado Actual</p>
      <p class="m-0 text-justify"><?= $estadoActual; ?></p>
    </div>

    <div class="form-group">
      <label for="estado" class="mb-0" title="Obligatorio">Estado <span class="text-danger" title="Obligatorio">*</span></label>
      <select class="form-control" id="estado" name="estado_id">
        <option value="0" disabled selected>Seleccione un estado</option>
        <?php foreach ($estados as $est) : ?>
          <option value="<?= $est->id_estado; ?>">
            <?= $est->estado; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </form>
</div>

<div class="modal-footer bg-gradient-light mt-0 py-1">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">
    <i class="fas fa-times fa-fw"></i>Cerrar
  </button>

  <button type="submit" id="btnFormEstadoObservacion" form="form_editEstObservacion" class="btn btn-primary" name="button">
    <div class="d-none">
      <span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
      Actualizando...
    </div>
    <span><i class="fas fa-pen mr-2"></i>Actualizar</span>
  </button>
</div>