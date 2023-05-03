<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><?= $title; ?></h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<?php if ($act == "nue_obs") : ?>
						<li class="breadcrumb-item"><a href="<?= base_url(OBSERVACIONES_PATH); ?>">Observaciones</a></li>
						<li class="breadcrumb-item active">Nueva</li>
					<?php else : ?>
						<li class="breadcrumb-item active">Observaciones</li>
					<?php endif; ?>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->