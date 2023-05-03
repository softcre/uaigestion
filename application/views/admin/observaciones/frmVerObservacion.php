<div class="card card-primary">
	<div class="card-header">
		<div class="card-title">Información de observación</div>
		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="card-body">
		<div class="row mb-3">
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Nro. Orden</p>
				<p class="m-0"><?= $observacion->id_observacion; ?></p>
			</div>
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Fecha de Observación</p>
				<p class="m-0"><?= formatearFecha($observacion->fecha_observacion); ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Unidad Académica</p>
				<p class="m-0"><?= $observacion->nombre_ua; ?></p>
			</div>
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Área Auditada</p>
				<p class="m-0"><?= $observacion->nombre_aa; ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Plan</p>
				<p class="m-0"><?= $observacion->plan; ?></p>
			</div>
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Proyecto</p>
				<p class="m-0"><?= $observacion->proyecto; ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<p class="font-weight-bold m-0">N° Informe UAI</p>
				<p class="m-0"><?= $observacion->nro_informe_uai; ?></p>
			</div>
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Impacto</p>
				<p class="m-0"><?= $observacion->impacto; ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<p class="font-weight-bold m-0">Detalle de la Observación</p>
				<p class="m-0 text-justify"><?= $observacion->detalle_observacion; ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Fecha de Seguimiento</p>
				<p class="m-0"><?= formatearFecha($observacion->fecha_seguimiento); ?></p>
			</div>
			<div class="col-md-6">
				<p class="font-weight-bold m-0">Estado</p>
				<p class="m-0 text-info"><?= $observacion->estado; ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<p class="font-weight-bold m-0">Detalle de la Recomendación</p>
				<p class="m-0 text-justify"><?= $observacion->detalle_recomendacion; ?></p>
			</div>
		</div>
	</div>
</div>