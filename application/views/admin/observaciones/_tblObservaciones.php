<?php if ($observaciones) : ?>
  <input type="hidden" id="nro_page" value="<?= $page; ?>">
  <div class="table-responsive">
    <table class="table table-sm table-hover">
      <thead>
        <tr class="text-center">
          <th data-field="id_observacion" class="th-link"> <i class="fas fa-sort"></i> N° Orden</th>
          <?php if (permisoSuperadminSupervisorOperador()) : ?>
            <th data-field="nombre_ua" class="th-link"> <i class="fas fa-sort"></i> Unidad académica</th>
          <?php endif; ?>
          <th data-field="proyecto" class="th-link"><i class="fas fa-sort"></i> Proyecto</th>
          <th data-field="fecha_observacion" class="th-link"><i class="fas fa-sort"></i> Fecha Observación</th>
          <th>Acciones</th>
          <!-- <?php if (permisoSuperadminSupervisor()) : ?>
            <th>Intervención</th>
          <?php endif; ?> -->
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($observaciones as $obs) : ?>
          <tr id="row-id-<?= $obs->id_observacion; ?>">
            <td><?= $obs->id_observacion; ?></td>
            <?php if (permisoSuperadminSupervisorOperador()) : ?>
              <td><?= $obs->nombre_ua; ?></td>
            <?php endif; ?>
            <td><?= $obs->proyecto; ?></td>
            <td class="text-center"><?= formatearFecha($obs->fecha_observacion); ?></td>
            <td class="text-center">
              <div class="btn-group btn-group-sm">
                <!-- <button type="button" class="btn btn-info" title="Ver" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmVer/' . $obs->id_observacion); ?>')">
                  <i class="fas fa-eye"></i>
                </button> -->
                <button type="button" class="btn btn-primary" title="Acciones encaradas" data-toggle="modal" data-target="#extra-large" onclick="cargarFormExtraLarge('<?= base_url(OBSERVACIONES_PATH . '/frmAccionesEncaradas/' . $obs->id_observacion); ?>')">
                  <i class="fas fa-eye"></i>
                </button>

                <?php if (permisoOperador()) : ?>
                  <button type="button" class="btn btn-warning" title="Editar observación" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmEditar/' . $obs->id_observacion); ?>')">
                    <i class="fas fa-pen text-white"></i>
                  </button>
                <?php endif; ?>

                <?php if (permisoSupervisor()) : ?>
                  <button type="button" class="btn btn-warning" title="Cambiar estado" data-toggle="modal" data-target="#small" onclick="cargarFormSmall('<?= base_url(OBSERVACIONES_PATH . '/frmCambiarEstado/' . $obs->id_observacion); ?>')">
                    <i class="fas fa-pen"></i> Cambiar estado
                  </button>
                <?php endif; ?>
              </div>
            </td>
            <td class="text-center ">
              <?php if ($obs->leido == 1 && permisoUA_general()) : // 1=>sin leer; 2=>leido; 
              ?>
                <i id="leido-obs-<?= $obs->id_observacion; ?>" class="fas fa-dot-circle fa-xs text-info">
                <?php endif; ?>

                <?php if ($obs->acciones_no_leidas > 0 && permisoOperadorUA_general()) : ?>
                  <i id="leido-acc-<?= $obs->id_observacion; ?>" class="fas fa-dot-circle fa-xs text-purple">
                  <?php endif; ?>
            </td>
            <!-- <?php if (permisoSuperadminSupervisor()) : ?>
              <td class="text-center">
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-danger text-white" title="Crear intervención" data-toggle="modal" data-target="#large" onclick="cargarFormLarge('<?= base_url(OBSERVACIONES_PATH . '/frmEditar/' . $obs->id_observacion); ?>')">
                    <i class="fas fa-plus"></i> Crear
                  </button>
                </div>
              </td>
            <?php endif; ?> -->
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php if (permisoOperadorUA_general()) : ?>
      <div class="mt-3 text-center small">
        <?php if (permisoUA_general()) : ?>
          <span class="mr-2">
            <i class="fas fa-dot-circle text-info"></i> Observaciones sin leer
          </span>
        <?php endif; ?>
        <span class="mr-2">
          <i class="fas fa-dot-circle text-purple"></i> Observaciones con acciones correctivas sin leer
        </span>
      </div>
    <?php endif; ?>
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