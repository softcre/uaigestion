<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="<?= base_url(DASHBOARD_PATH); ?>" class="nav-link">Home</a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">

		<!-- Login user -->
		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<span class="d-none d-md-inline mr-1"><?= $this->session->apellido . ' ' . $this->session->nombre; ?></span>
				<?php $urlFoto = $this->imagen->getUrlImg('usuarios', $this->session->foto); ?>

				<?php if ($urlFoto) : ?>
					<img src="<?= $urlFoto; ?>" class="user-image img-circle elevation-2" alt="User Image">
				<?php else : ?>
					<img src="<?= $this->imagen->getUrlImg('usuarios', 'no-user.jpg'); ?>" class="user-image img-circle elevation-2" alt="User Image default">
				<?php endif; ?>
			</a>
			<ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
				<a href="<?= base_url(PERFIL_PATH . '/editarPerfil') ?>" class="dropdown-item">
					<i class="fas fa-user-alt fa-fw mr-2"></i> Mi Perfil
				</a>
				<button type="button" class="dropdown-item" data-toggle="modal" data-target="#small" onclick="cargarFormSmall('<?= base_url(PERFIL_PATH . '/frmEditarContrasena') ?>')">
					<i class="fas fa-key fa-fw mr-2"></i> Cambiar contraseña
				</button>
				<div class="dropdown-divider"></div>
				<button type="button" class="dropdown-item" data-toggle="modal" data-target="#small" onclick="cargarFormSmall('<?= base_url(ADMIN_PATH . '/salir') ?>')">
					<i class="fas fa-sign-out-alt fa-fw mr-2"></i> Salir
				</button>
			</ul>
		</li>
	</ul>
</nav>
<!-- /.navbar -->