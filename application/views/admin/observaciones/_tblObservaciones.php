<table id="tblObservaciones" class="table table-sm table-hover">
  <thead>
    <tr class="text-center">
      <th scope="col">Nro. Orden</th>
      <th scope="col">Proyecto</th>
      <th scope="col">Fecha Observación</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($observaciones as $obs) : ?>
      <tr class="text-center">
        <td><?= $obs->id_observacion; ?></td>
        <td><?= $obs->proyecto; ?></td>
        <td><?= formatearFecha($obs->fecha_observacion); ?></td>
        <td>
          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-info" title="Ver" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmVer/' . $obs->id_observacion); ?>')">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmEditar/' . $obs->id_observacion); ?>')">
              <i class="fas fa-pen text-white"></i>
            </button>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
