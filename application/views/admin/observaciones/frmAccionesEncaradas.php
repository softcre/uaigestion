<div class="card card-primary">
  <div class="card-header">
    <div class="card-title">Observación UAI N° <?= $observacion->id_observacion; ?></div>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="card-body">
    <?php $this->load->view('admin/observaciones/_viewVerObservacion'); ?>
    <hr>

    <!-- The time line -->
    <div id="acciones-main">

    </div>
  </div>
</div>

<script>
  $(function() {
    // bsCustomFileInput.init();
    marcarObsyAccionesLeidas(<?= $observacion->id_observacion; ?>);
    
    loadAcciones(<?= $observacion->id_observacion; ?>)
  });
</script>