<?php if ($observaciones) : ?>
  <input type="hidden" id="nro_page" value="<?= $page; ?>">
  <div class="table-responsive">
    <table class="table table-sm table-hover">
      <thead>
        <tr class="text-center">
          <th data-field="id_observacion" class="th-link"> <i class="fas fa-sort"></i> N° Orden </th>
          <th data-field="proyecto" class="th-link"><i class="fas fa-sort"></i> Proyecto</th>
          <th data-field="fecha_observacion" class="th-link"><i class="fas fa-sort"></i> Fecha Observación</th>
          <th>Acciones</th>
          <?php if (permisoSuperadminSupervisor()) : ?>
            <th>Intervención</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($observaciones as $obs) : ?>
          <tr id="row-id-<?= $obs->id_observacion; ?>">
            <td><?= $obs->id_observacion; ?></td>
            <td><?= $obs->proyecto; ?></td>
            <td class="text-center"><?= formatearFecha($obs->fecha_observacion); ?></td>
            <td class="text-center">
              <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-info" title="Ver" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmVer/' . $obs->id_observacion); ?>')">
                  <i class="fas fa-eye"></i>
                </button>

                <?php if (permisoOperador()) : ?>
                  <button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmEditar/' . $obs->id_observacion); ?>')">
                    <i class="fas fa-pen text-white"></i>
                  </button>
                <?php endif; ?>

                <?php if (permisoSupervisor()) : ?>
                  <button type="button" class="btn btn-warning" title="Cambiar estado" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmEditar/' . $obs->id_observacion); ?>')">
                    <i class="fas fa-pen"></i> Cambiar estado
                  </button>
                <?php endif; ?>
              </div>
            </td>
            <?php if (permisoSuperadminSupervisor()) : ?>
              <td class="text-center">
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-danger text-white" title="Crear intervención" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmEditar/' . $obs->id_observacion); ?>')">
                    <i class="fas fa-plus"></i> Crear
                  </button>
                </div>
              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- <hr class="mb-1"> -->
  <div class="row">
    <div class="col-md-6 table-info-pag"><?= msjPaginado($page, $per_page, $total); ?></div>
    <div class="col-md-6"><?= paginate($page, $total_pages, $pages_adyacentes); ?></div>
  </div>

  <script>
    $(".table th.th-link").each(function() {
      $(this).css("cursor", "pointer").hover(
        function() {
          $(this).addClass("text-primary");
        },
        function() {
          $(this).removeClass("text-primary");
        }).click(function() {
        //document.location = $(this).attr("data-href");
        if (paramPage.order == "asc") {
          paramPage.order = "desc";
        } else {
          paramPage.order = "asc";
        }
        paramPage.order_by = $(this).attr("data-field");
        loadObs();
      });
    });
  </script>
<?php else : ?>
  <div class="alert alert-info text-center" role="alert">
    <i class="fas fa-search"></i> Búsqueda sin resultados...
  </div>
<?php endif; ?>