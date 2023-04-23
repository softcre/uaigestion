<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?> | <?= APP_NAME; ?></title>

	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
	<link rel="stylesheet" href="<?= base_url('assets/fonts/fontSansPro.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="apple-touch-icon" sizes="192x192" href="<?= base_url('assets/img/favicon/apple-touch-icon.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon/favicon-16x16.png'); ?>">
	<?php if ($log) : ?>
		<link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css'); ?>">
	<?php endif; ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin/adminlte.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/admin/index.css'); ?>">
</head>
