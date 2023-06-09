<?php $this->load->view('admin/components/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php $this->load->view('admin/perfil/_headerPerfil'); ?>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card card-primary">
				<div class="card-header">
					<div class="card-title">Editar Perfil</div>
				</div>
				<div class="card-body">
					<form id="form_editPerfil" enctype="multipart/form-data" name="Perfil" method="post"  action="<?=base_url(PERFIL_PATH . '/actualizarPerfil');?>" onsubmit="altaUpdate(event)">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-5">
								<div class="text-center">
									<img id="foto" name="foto-producto" class="box-img img-circle" src="<?= $this->imagen->getUrlImg('usuarios', $this->session->foto); ?>" alt="foto" style="cursor:pointer;">
									<input id="ing-foto" class="d-none invisible" type="file" accept="image/*" name="file" onchange="subirFoto(this)" value="">
									<div id="noFoto" class="alert alert-danger text-center mb-1 mt-0 py-1 d-none">
										<small></small>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="nombre" class="mb-0">Nombre</label>
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce un titulo" value="<?= $_SESSION['nombre']; ?>">
								</div>
								<div class="form-group">
									<label for="apellido" class="mb-0">Apellido</label>
									<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Introduce un apellido" value="<?= $_SESSION['apellido']; ?>">
								</div>
								<div class="form-group">
									<label for="telefono" class="mb-0">Teléfono</label>
									<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Introduce un teléfono" value="<?= $_SESSION['telefono']; ?>">
								</div>
								<div class="form-group">
									<label for="email" class="mb-0" title="Obligatorio">E-Mail <span class="text-danger" title="Obligatorio">*</span></label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Introduce un e-mail" value="<?= $_SESSION['email']; ?>">
								</div>
								<button type="submit" id="btnFormPerfil" class="btn btn-primary" name="button">
									<div class="d-none">
										<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
										Actualizando...
									</div>
									<span><i class="fas fa-pen mr-2"></i>Actualizar</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<?php $this->load->view('admin/components/footer'); ?>

<script>
	window.onload = function() {
		$('#foto').click(function() {
			$('#ing-foto').click();
		});
	}
</script>
