<?php $this->load->view('admin/components/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php $this->load->view('admin/observaciones/_headerObservaciones'); ?>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<?php if (permisoOperador()) : ?>
				<a href="<?= base_url(OBSERVACION_NUEVA_PATH) ?>" class="btn bg-gradient-primary mb-3" title="Nueva observación">
					<i class="fas fa-plus fa-fw"></i> Nueva observación UAI
				</a>
			<?php endif; ?>

			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Listado de Seguimientos UAI</h3>
				</div>

				<div class="card-body">
					<form class="form" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" id="form-search" name="form-search">
						<div class="row mt-1 mb-3"><!-- justify-content-md-center">-->
							<!-- <div class="col-md-2 col-sm-2 col-3">
								<div class="select-show input-group-prepend">
									<button id="btn-list-show" type="button" class="btn btn-light dropdown-toggle btn-block" data-toggle="dropdown">
										<span class="fa fa-list-ol"></span> <span id="spn-list-show">10</span>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#5">5</a>
										<a class="dropdown-item" href="#10">10</a>
										<a class="dropdown-item" href="#20">20</a>
									</div>
								</div>
							</div> -->

							<div class="col-md-3">
								<div class="form-group">
									<label for="ua_busq" class="mb-0">Unidad Académica/Instituto</label>
									<?php if (isset($unidadAcademica)) : ?>
										<input type="hidden" class="form-control" id="ua_busq" name="ua_busq_id" value="<?= $unidadAcademica->id_ua; ?>">
										<input type="text" class="form-control-plaintext" value="<?= $unidadAcademica->nombre_ua; ?>" readonly>

									<?php else : ?>
										<select class="form-control" id="ua_busq" name="ua_busq_id" onchange="getAreasAuditadasList()">
											<option value="" selected>TODAS</option>
											<?php foreach ($unidadesAcademicas as $key => $ua) : ?>
												<option value="<?= $ua->id_ua; ?>">
													<?= $ua->nombre_ua; ?>
												</option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="aa_busq" class="mb-0">Área Auditada</label>
									<?php if (isset($areaAuditada)) : ?>
										<input type="hidden" class="form-control" id="aa_busq" name="aa_busq_id" value="<?= $areaAuditada->id_area_auditada; ?>">
										<input type="text" class="form-control-plaintext" value="<?= $areaAuditada->nombre_aa; ?>" readonly>

									<?php elseif (isset($areasAuditadas)) : ?>
										<select class="form-control" id="aa_busq" name="aa_busq_id" onchange="loadObs()">
											<option value="" selected>TODAS</option>
											<?php foreach ($areasAuditadas as $key => $aa) : ?>
												<option value="<?= $aa->id_area_auditada; ?>">
													<?= $aa->nombre_aa; ?>
												</option>
											<?php endforeach; ?>
										</select>

									<?php else : ?>
										<select class="form-control" id="aa_busq" name="aa_busq_id" onchange="loadObs()">
											<option value="" selected>TODAS</option>
										</select>
									<?php endif; ?>
								</div>
							</div>

							<div class="col-md-6 col-sm-12 align-self-center">
								<div class="input-group">
									<div class="search-panel input-group-prepend">
									</div>
									<input type="text" class="form-control txt-search-nv" name="txt-search" id="txt-search" placeholder="Buscar...">
									<div class="input-group-append">
										<button type="submit" class="btn btn-search-nav" name="btn-search" id="btn-search">
											<i class="text-primary fas fa-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>

					<div class="row">
						<div id="observaciones-main" class="col-md-12"></div>
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

<script type="text/javascript">
	$(document).ready(function() {
		getAreasAuditadasList();
	});
</script>