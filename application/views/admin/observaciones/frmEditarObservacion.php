<div class="modal-header bg-primary py-2">
  <h5 class="modal-title">Actualizar observación</h5>
  <button type="button" id="cerrarModal" class="close text-white" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body">
  <form id="form_editObservacion" name="Observacion" method="post" onsubmit="updateObservacion(event)">
    <input type="hidden" name="idObservacion" value="<?= $observacion->id_observacion; ?>">

    <?php $this->load->view('admin/observaciones/_formularioObservacion'); ?>
  </form>
</div>

<div class="modal-footer bg-gradient-light mt-0 py-1">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">
    <i class="fas fa-times fa-fw"></i>Cerrar
  </button>

  <button type="submit" id="btnFormObservacion" form="form_editObservacion" class="btn btn-primary" name="button">
    <div class="d-none">
      <span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
      Actualizando...
    </div>
    <span><i class="fas fa-pen mr-2"></i>Actualizar</span>
  </button>
</div>

<script>
  getAreasAuditadas(<?= $observacion->area_auditada_id; ?>);
</script>