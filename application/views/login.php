<!DOCTYPE html>
<html>

<head>
	<title>LOGIN PLN </title>

	<meta charset="UTF-8">
	<meta name="description" content="Clean and responsive administration panel">
	<meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
	<meta name="author" content="Erik Campobadal">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= base_url('public/') ?>images/logo.png">
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/uikit.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/style.css" />
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/theme.css">
	<script src="<?= base_url('public/') ?>js/jquery-3.6.1.min.js"></script>
	<script src="<?php echo base_url('public/js/sweetalert.min.js') ?>"></script>

	<script src="<?= base_url('public/') ?>js/uikit.min.js"></script>
	<script src="<?= base_url('public/') ?>js/uikit-icons.min.js"></script>
	<script>
		var base_url = "<?= base_url() ?>";
	</script>
</head>

<body>
	<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
				<!-- Card -->
				<div class="card smooth-shadow-md">
					<!-- Card body -->
					<div class="card-body p-6">
						<img src="<?= base_url('public/') ?>img/logo.svg" alt="">
						<div class="mb-4">
							<!-- <a href="#" class="d-flex justify-content-center">
								<img src="{{ asset('images/logos/main-logo.png') }}" class="img-fluid mb-6" alt="Konter Sejahtera" style="width: 75%">
							</a> -->
							<p class="mb-5 text-center fw-bold">Silakan lakukan Login!!</p>
						</div>
						<!-- Form -->
						<form method="POST">
							<fieldset class="uk-fieldset">
								<div class="uk-margin">
									<div class="uk-position-relative">
										<input name="username" class="form-control" required placeholder="Username" id="username" type="text">
									</div>
								</div>
								<div class="uk-margin">
									<div class="uk-position-relative">
										<input name="password" class="form-control" type="password" required id="password" placeholder="Password">
									</div>
								</div>
								<div class="uk-margin text-center">
									<button type="button" id="login" class="btn btn-primary w-100" >
										<span class="ion-forward"></span>&nbsp; Login
									</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="<?= base_url('public/') ?>js/login.js"></script>
</body>

</html>
