<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="fecha_observacion" class="mb-0" title="Obligatorio">Fecha de Observación <span class="text-danger" title="Obligatorio">*</span></label>
      <input type="date" class="form-control" id="fecha_observacion" name="fecha_observacion" placeholder="Fecha de Observación" value="<?= (isset($observacion)) ? $observacion->fecha_observacion : ''; ?>">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="unidad_academica" class="mb-0" title="Obligatorio">Unidad Académica / Instituto<span class="text-danger" title="Obligatorio">*</span></label>
      <select class="form-control" id="unidad_academica" name="unidad_academica_id" onchange="getAreasAuditadas()">
        <option value="0" disabled selected>Seleccione una unidad académica</option>
        <?php foreach ($unidadesAcademicas as $ua) : ?>
          <?php $s = (isset($observacion)) ? (($observacion->ua_id == $ua->id_ua) ? 'selected' : '') : ''; ?>
          <option value="<?= $ua->id_ua; ?>" <?= $s ?>>
            <?= $ua->nombre_ua; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="area_auditada" class="mb-0" title="Obligatorio">Área Auditada <span class="text-danger" title="Obligatorio">*</span></label>
      <select class="form-control" id="area_auditada" name="area_auditada_id">
        <option value="0" disabled selected>Seleccione un área auditada</option>
      </select>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="plan" class="mb-0" title="Obligatorio">Plan <span class="text-danger" title="Obligatorio">*</span></label>
      <select class="form-control" id="plan" name="plan_id">
        <option value="0" disabled selected>Seleccione un plan</option>
        <?php foreach ($planes as $plan) : ?>
          <?php $s = (isset($observacion)) ? (($observacion->plan_id == $plan->id_plan) ? 'selected' : '') : ''; ?>
          <option value="<?= $plan->id_plan; ?>" <?= $s ?>>
            <?= $plan->plan; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="proyecto" class="mb-0" title="Obligatorio">Proyecto / Actividad <span class="text-danger" title="Obligatorio">*</span></label>
      <input type="text" class="form-control" id="proyecto" name="proyecto" placeholder="Proyecto / Actividad" value="<?= (isset($observacion)) ? $observacion->proyecto : ''; ?>">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="nro_informe_uai" class="mb-0" title="Obligatorio">Informe de Auditoria N°<span class="text-danger" title="Obligatorio">*</span></label>
      <input type="text" class="form-control" id="nro_informe_uai" name="nro_informe_uai" placeholder="Informe de Auditoria N°" value="<?= (isset($observacion)) ? $observacion->nro_informe_uai : ''; ?>">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="impacto" class="mb-0" title="Obligatorio">Impacto <span class="text-danger" title="Obligatorio">*</span></label>
      <select class="form-control" id="impacto" name="impacto_id">
        <option value="0" disabled selected>Seleccione un impacto</option>
        <?php foreach ($impactos as $imp) : ?>
          <?php $s = (isset($observacion)) ? (($observacion->impacto_id == $imp->id_impacto) ? 'selected' : '') : ''; ?>
          <option value="<?= $imp->id_impacto; ?>" <?= $s ?>>
            <?= $imp->impacto; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="form-group">
      <label for="detalle_observacion" class="mb-0" title="Obligatorio">Recomendación UAI <span class="text-danger" title="Obligatorio">*</span></label>
      <textarea class="form-control" id="detalle_observacion" name="detalle_observacion" rows="4" placeholder="Ingrese la recomendación..."><?= (isset($observacion)) ? $observacion->detalle_observacion : ''; ?></textarea>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="fecha_seguimiento" class="mb-0" title="Obligatorio">Fecha de Seguimiento <span class="text-danger" title="Obligatorio">*</span></label>
      <input type="date" class="form-control" id="fecha_seguimiento" name="fecha_seguimiento" placeholder="Fecha de Seguimiento" value="<?= (isset($observacion)) ? $observacion->fecha_seguimiento : ''; ?>">
    </div>
  </div>

  <!-- <div class="col-md-6">
    <div class="form-group">
      <label for="estado" class="mb-0" title="Obligatorio">Estado <span class="text-danger" title="Obligatorio">*</span></label>
      <select class="form-control" id="estado" name="estado_id">
        <option value="0" disabled selected>Seleccione un estado</option>
        <?php foreach ($estados as $est) : ?>
          <?php $s = (isset($observacion)) ? (($observacion->estado_id == $est->id_estado) ? 'selected' : '') : ''; ?>
          <option value="<?= $est->id_estado; ?>" <?= $s ?>>
            <?= $est->estado; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div> -->
</div>

<div class="row">
  <div class="col-12">
    <div class="form-group">
      <label for="detalle_recomendacion" class="mb-0" title="Obligatorio">Detalle de la recomendación <span class="text-danger" title="Obligatorio">*</span></label>
      <textarea class="form-control" id="detalle_recomendacion" name="detalle_recomendacion" rows="4" placeholder="Ingrese detalle de la recomendación..."><?= (isset($observacion)) ? $observacion->detalle_recomendacion : ''; ?></textarea>
    </div>
  </div>
</div>

<div class="text-center">
  <small class="text-muted"><span class="text-danger" title="Obligatorio">*</span> Campos obligatorios</small>
</div>