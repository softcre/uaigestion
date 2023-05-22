<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url(DASHBOARD_PATH); ?>" class="brand-link">
		<img src="<?= base_url('assets/img/logoUnne_small.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="background-color: white;">
		<span class="brand-text font-weight-light"><?= APP_NAME; ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url(''); ?>" class="nav-link <?= ($act == 'dash') ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Home</p>
					</a>
				</li>
				<li class="nav-header">GESTIÓN</li>
				<li class="nav-item <?= ($desplegado == 'obs') ? 'menu-is-opening menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= ($desplegado == 'obs') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-binoculars"></i>
						<p>
							Seguimientos UAI
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<?php if (permisoOperador()) : ?>
							<li class="nav-item">
								<a href="<?= base_url(OBSERVACION_NUEVA_PATH); ?>" class="nav-link <?= ($act == 'nue_obs') ? 'active' : '' ?>">
									<i class="nav-icon fas fa-plus"></i>
									<p>Nueva</p>
								</a>
							</li>
						<?php endif; ?>

						<li class="nav-item">
							<a href="<?= base_url(OBSERVACIONES_PATH); ?>" class="nav-link <?= ($act == 'list_obs') ? 'active' : '' ?>">
								<i class="nav-icon fas fa-list-ul"></i>
								<p>Listado</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>