<!DOCTYPE html>
<html>

<head>
	<title>Website Kedai Kopi Kafeteria</title>

	<meta charset="UTF-8">
	<meta name="description" content="Clean and responsive administration panel">
	<meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
	<meta name="author" content="Erik Campobadal">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= base_url('public/') ?>images/logo.png">
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/uikit.min.css" />
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/style.css" />
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/notyf.min.css" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/') ?>css/administrator.css">

	<script src="<?= base_url('public/') ?>js/jquery-3.6.1.min.js"></script>
	<script src="<?= base_url('public/') ?>js/uikit.min.js"></script>
	<script src="<?= base_url('public/') ?>js/uikit-icons.min.js"></script>
	<script src="<?php echo base_url('public/js/sweetalert.min.js') ?>"></script>
	<!-- leaflet koneksi -->
	<link rel="stylesheet" href="<?= base_url('public/') ?>leaflet/leaflet.css" />
	<script src="<?= base_url('public/') ?>leaflet/leaflet.js"></script>
	<!-- leaflet koneksi -->
	<!-- Pencarian GIS -->

	<link rel="stylesheet" href="<?= base_url('public/') ?>leaflet-cari/src/leaflet-search.css" />
	<script src="<?= base_url('public/') ?>leaflet-cari/src/leaflet-search.js"></script>
	<!-- Pencarian GIS -->
	<script>
		var base_url = "<?= base_url() ?>";
	</script>
	<style typle="text/css">
		#mapid {
			height: 75vh;
		}
	</style>
</head>

<body>
	<div id="sidebar" class="tm-sidebar-left uk-background-default">
		<center>
			<div class="user">
				<div id="name" class="uk-text-truncate"><?php echo strtoupper($this->session->userdata('nama')) ?></div>
				<span id="status" data-enabled="true" data-online-text="Online" data-away-text="Away" data-interval="10000" class="uk-margin-top uk-label uk-label-success"></span>
			</div>
			<br />
		</center>
		<ul class="uk-nav uk-nav-default ">

			<li class="uk-nav-header fw-bold">
				MENU
			</li>

			<li <?php if ($menu == "beranda") {
				?> class="uk-active" <?php
									} ?>><a href="<?= base_url('administrator') ?>" class="fw-bold"><span data-uk-icon="icon: home" class="uk-margin-small-right"></span>BERANDA</a></li>
			<li <?php if ($menu == "layanan") {
				?> class="uk-active" <?php
									} ?>><a href="<?= base_url('administrator/data') ?>" class="fw-bold"><span data-uk-icon="icon:  location" class="uk-margin-small-right"></span>DATA LOKASI</a></li>
			<!-- <li <?php if ($menu == "kategori") {
						?> class="uk-active" <?php
											} ?>><a href="<?= base_url('administrator/kategori') ?>" class="fw-bold"><span data-uk-icon="icon:  list" class="uk-margin-small-right"></span>DATA KATEGORI</a></li> -->
			<!-- <li <?php if ($menu == "biodata") {
						?> class="uk-active" <?php
											} ?>><a href="<?= base_url('administrator/biodata') ?>"> <span data-uk-icon="icon: file-text" class="uk-margin-small-right"></span>BIODATA</a></li> -->
			<?php
			if ($this->session->userdata('status') == "admin") {
			?>
				<li <?php if ($menu == "users") {
					?> class="uk-active" <?php
										} ?>><a href="<?= base_url('administrator/users') ?>" class="fw-bold"><span data-uk-icon="icon: users" class="uk-margin-small-right"></span>USERS</a></li>
			<?php
			}

			?>
			<li><a href="" class="fw-bold" id="logout"><span data-uk-icon="icon: sign-out" class="uk-margin-small-right"></span>LOGOUT</a></li>


		</ul>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="<?= base_url('public/') ?>js/header.js"></script>